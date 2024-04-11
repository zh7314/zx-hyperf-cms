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

use Hyperf\HttpServer\Router\Router;
use App\Middleware\AdminCheckMiddleware;

//Router::addRoute(['GET', 'POST', 'HEAD'], '/', 'App\Controller\IndexController@index');

Router::get('/', 'App\Controller\IndexController@index');

Router::get('/test', 'App\Controller\IndexController@test');

//Router::addGroup();

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup(
    '/admin', function () {
    Router::get('/index', [\App\Controller\IndexController::class, 'index']);
},
    ['middleware' => [AdminCheckMiddleware::class]]
);