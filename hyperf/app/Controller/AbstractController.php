<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Psr\Container\ContainerInterface;
use function Hyperf\Config\config;

abstract class AbstractController
{
    #[Inject]
    protected ContainerInterface $container;

    #[Inject]
    protected RequestInterface $request;

    #[Inject]
    protected ResponseInterface $response;

    /**
     * 生成快捷URL
     * @param string $str
     * @return void
     */
//    public function to(string $str = '')
//    {
//        $scheme = $this->request->getUri()->getScheme() ?? 'http';
//        $host = $this->request->getUri()->getHost() ?? '127.0.0.1';
//        $port = $this->request->getUri()->getPort() ?? config('server.servers.port', 9500);
//
//        $url = "{$scheme}://{$host}:{$port}/{$str}";
//        return $url;
//    }
}
