<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Model\Admin;
use App\Service\Admin\CommonService;
use App\Util\GlobalCode;
use App\Util\ResponseTrait;
use Exception;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;

class AdminCheckMiddleware implements MiddlewareInterface
{
    use ResponseTrait;

    protected ContainerInterface $container;

    protected RequestInterface $request;

    protected HttpResponse $response;

    public function __construct(ContainerInterface $container, HttpResponse $response, RequestInterface $request)
    {
        $this->container = $container;
        $this->response = $response;
        $this->request = $request;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
//        p(self::class);
        try {
            $token = $this->request->header(GlobalCode::API_TOKEN, '');

            if (empty($token)) {
                //兼容文件下载文件验证 token
                $token = $this->request->input(GlobalCode::API_TOKEN);
                if (empty($token)) {
                    throw new Exception('token为空，请重新登录');
                }
            }

            $admin = Admin::where('token', $token)->first();
            if ($admin == null) {
                throw new Exception('token不存在');
            }
            if ((int)time() > ((int)strtotime($admin->token_time) + (int)GlobalCode::TOKEN_TIME)) {
                throw new Exception('token过期，请重新登录');
            }

//            p($admin->toArray());
//            p($admin->id);
//            p($token);
            $this->request->withAttribute('admin_id', $admin->id);
            $this->request->withAttribute('token', $token);

//            \Hyperf\Utils\Context::set('my_global_param', 'global_value');
//            // 获取参数
//            $myParam = $request->getAttribute('my_param');

//            p($this->request->all());
//            p($this->request->input('admin_id'));
//            p($this->request->input('token'));
//
//            p($this->request->getAttribute('admin_id'));
//            p($this->request->getAttribute('token'));

            $request_url = $this->request->getUri()->getPath();
//            p($request_url);

            try {
                //权限验证
                CommonService::permissionCheck($admin->id, $request_url);
            } catch (Exception $e) {
                return $this->fail($e);
            }

        } catch (Throwable $e) {
            return $this->grant($e);
        }

        return $handler->handle($request);
    }
}
