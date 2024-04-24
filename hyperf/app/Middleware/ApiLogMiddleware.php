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

class ApiLogMiddleware implements MiddlewareInterface
{
    protected static $id;

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

//        //第一步 先存储信息
            $log = new RequestLog();
            $log->method = $request->method();
            $log->ip = $request->ip() == '127.0.0.1' ? $request->header('x-real-ip', '127.0.0.1') : $request->ip();
            $log->url = $request->path();
            $log->params = json_encode([$request->all(), $request->getContent()], JSON_UNESCAPED_UNICODE);
            $header_array = array_intersect_key($request->header(), array_flip(['referer', 'authorization', 'x-real-ip', 'x-forwarded-for']));

            $log->header = json_encode($header_array, JSON_UNESCAPED_UNICODE);
            $log->save();
            self::$id = $log->id;

        } catch (Throwable $e) {
            return $this->grant($e);
        }
        return $handler->handle($request);
    }
}
