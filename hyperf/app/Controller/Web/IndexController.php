<?php

declare(strict_types=1);

namespace App\Controller\Web;

use App\Controller\AbstractController;
use App\Util\ResponseTrait;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

class IndexController extends AbstractController
{
    use ResponseTrait;

    public function index()
    {
        try {
            $user = $this->request->input('user', 'Hyperf');
            $method = $this->request->getMethod();

            $data = [
                'method' => $method,
                'message' => "Hello {$user}",
                'random' => getRandom()
            ];


            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function test(RequestInterface $request)
    {
        try {

            $user = $request->input('user', 'Hyperf');
            $method = $request->getMethod();

            $data = [
                'method' => $method,
                'message' => "Hello {$user}",
                'random' => getRandom()
            ];

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }
}
