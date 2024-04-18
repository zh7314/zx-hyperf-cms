<?php

namespace App\Utils;

use App\Utils\GlobalCode;
use App\Utils\GlobalMsg;
use Hyperf\Contract\ContainerInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;
use Hyperf\Context\ApplicationContext;

use function Hyperf\Support\env;

trait ResponseTrait
{
    public function success(mixed $data = '', string $msg = GlobalMsg::SUCCESS, int $status = 200)
    {
        return self::response([GlobalCode::CODE => GlobalCode::SUCCESS, GlobalCode::MSG => $msg, GlobalCode::DATA => $data], $status);
    }

    public function fail(Throwable $e, int $status = 200)
    {
        if (self::request()->input('debug') == env('DEBUG', GlobalCode::DEBUG) || env('DEBUG') == GlobalCode::DEBUG) {
            return self::response([GlobalCode::CODE => GlobalCode::FAIL, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getTraceAsString()], $status);
        } else {
            return self::response([GlobalCode::CODE => GlobalCode::FAIL, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getMessage()], $status);
        }
    }

    public function grant(Throwable $e, int $status = 200)
    {
        if (self::request()->input('debug') == env('DEBUG', GlobalCode::DEBUG) || env('DEBUG') == GlobalCode::DEBUG) {
            return self::response([GlobalCode::CODE => GlobalCode::GRANT, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getTraceAsString()], $status);
        } else {
            return self::response([GlobalCode::CODE => GlobalCode::GRANT, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getMessage()], $status);
        }
    }


    private static function response(mixed $data = null, int $status = 200, int $options = JSON_UNESCAPED_UNICODE)
    {
        $response = self::container()->get(ResponseInterface::class);

        return $response->withStatus($status)->withAddedHeader('content-type', 'application/json; charset=utf-8')->withBody(new SwooleStream(json_encode($data, $options)));
    }

    private static function request()
    {
        return self::container()->get(RequestInterface::class);
    }

    /**
     * 容器实例
     * @return \Psr\Container\ContainerInterface
     */
    private static function container()
    {
        return ApplicationContext::getContainer();
    }

}
