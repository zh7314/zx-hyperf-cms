<?php

namespace App\Utils;

use App\Utils\GlobalCode;
use App\Utils\GlobalMsg;
use Hyperf\Contract\ContainerInterface;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

use function Hyperf\Support\env;

trait ResponseTrait
{
    #[Inject]
    protected RequestInterface $rt;
    #[Inject]
    protected ResponseInterface $re;

    public function success(mixed $data = '', string $msg = GlobalMsg::SUCCESS)
    {
        return $this->re->json([GlobalCode::CODE => GlobalCode::SUCCESS, GlobalCode::MSG => $msg, GlobalCode::DATA => $data]);
    }

    public function fail(Throwable $e, $status = 200, array $headers = [])
    {
        if ($this->rt->input('debug') == env('DEBUG', GlobalCode::DEBUG) || env('DEBUG') == GlobalCode::DEBUG) {
            return $this->re->json([GlobalCode::CODE => GlobalCode::FAIL, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getTraceAsString()], $status, $headers);
        } else {
            return $this->re->json([GlobalCode::CODE => GlobalCode::FAIL, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getMessage()], $status, $headers);
        }
    }

    public function grant(Throwable $e)
    {
        if ($this->rt->input('debug') == env('DEBUG', GlobalCode::DEBUG) || env('DEBUG') == GlobalCode::DEBUG) {
            return $this->re->json([GlobalCode::CODE => GlobalCode::GRANT, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getTraceAsString()]);
        } else {
            return $this->re->json([GlobalCode::CODE => GlobalCode::GRANT, GlobalCode::MSG => $e->getMessage(), GlobalCode::DATA => $e->getMessage()]);
        }
    }

}
