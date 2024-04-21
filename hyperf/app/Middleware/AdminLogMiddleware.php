<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Model\Admin;
use App\Service\Admin\CommonService;
use App\Utils\GlobalCode;
use App\Utils\ResponseTrait;
use Exception;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Throwable;

class AdminLogMiddleware implements MiddlewareInterface
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
        try {
            //        p(AdminLog::class);
            $log = new Log();
            $log->method = $request->method();
            $log->url = $request->path();
            $log->route_name = $request->route()->getName();
//        $adminLog->route_path = $request->getRequestUri();
            $log->path = $request->url();
            $log->request_ip = $request->ip();
            $log->data = json_encode($request->input(), JSON_UNESCAPED_UNICODE);

            if (!empty($request->admin_id)) {
                $admin = Admin::where('id', $request->admin_id)->first();

                if ($admin == null) {
                    $log->remark = '非admin_id权限';
                } else {
                    $log->admin_id = $admin->id;
                    $log->admin_name = $admin->real_name;
                }
            }
            $adminPermission = AdminPermission::where('path', $request->getRequestUri())->first();
            if ($adminPermission !== null) {
                $log->route_desc = $adminPermission->name;
            }
            $log->save();

        } catch (Throwable $e) {
            return $this->grant($e);
        }

        return $handler->handle($request);
    }
}
