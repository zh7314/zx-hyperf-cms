<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Model\Admin;
use App\Service\Admin\CommonService;
use App\Util\GlobalCode;
use App\Util\ResponseTrait;
use Exception;
use Hyperf\Context\Context;
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
            //方案一：直接属性复制，不推荐
//            $this->request->admin_id = $admin->id;
//            $this->request->token = $token;
            //方案二：使用上下文工具带过去，
            //官方的建议：https://hyperf.wiki/3.1/#/zh-cn/controller?id=%e9%81%bf%e5%85%8d%e5%8d%8f%e7%a8%8b%e9%97%b4%e6%95%b0%e6%8d%ae%e6%b7%b7%e6%b7%86
            Context::set('admin_id', $admin->id);
            Context::set('token', $token);

            $request_url = $this->request->getUri()->getPath();

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
