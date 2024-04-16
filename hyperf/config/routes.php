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

Router::get('/', 'App\Controller\Web\IndexController@index');

Router::get('/test', 'App\Controller\Web\IndexController@test');

//Router::addGroup();

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup('/admin', function () {

    Router::get('/login', [\App\Controller\Admin\IndexController::class, 'login']);
    Router::get('/getCaptcha', [\App\Controller\Admin\IndexController::class, 'getCaptcha']);
    Router::get('/uploadPic', [\App\Controller\Admin\IndexController::class, 'uploadPic']);
    Router::get('/uploadFile', [\App\Controller\Admin\IndexController::class, 'uploadFile']);
});

Router::addGroup('/admin', function () {

    Router::get('/getMenu', [\App\Controller\Admin\IndexController::class, 'getMenu']);
    Router::get('/getInfo', [\App\Controller\Admin\IndexController::class, 'getInfo']);
    Router::get('/logout', [\App\Controller\Admin\IndexController::class, 'logout']);
    Router::get('/getVersion', [\App\Controller\Admin\IndexController::class, 'getVersion']);
    Router::get('/changePwd', [\App\Controller\Admin\IndexController::class, 'changePwd']);

    Router::get('/getGroupTree', [\App\Controller\Admin\IndexController::class, 'getGroupTree']);
    Router::get('/getMenuTree', [\App\Controller\Admin\IndexController::class, 'getMenuTree']);
    Router::get('/getDownloadCateTree', [\App\Controller\Admin\IndexController::class, 'getDownloadCateTree']);
    Router::get('/getNewsCateTree', [\App\Controller\Admin\IndexController::class, 'getNewsCateTree']);
    Router::get('/getProductCateTree', [\App\Controller\Admin\IndexController::class, 'getProductCateTree']);
    Router::get('/getVideoCateTree', [\App\Controller\Admin\IndexController::class, 'getVideoCateTree']);
    Router::get('/getBannerCateTree', [\App\Controller\Admin\IndexController::class, 'getBannerCateTree']);

    Router::addGroup('/admin', function () {
        Router::get('/getList', [\App\Controller\Admin\AdminController::class, 'getList']);
        Router::get('/getAll', [\App\Controller\Admin\AdminController::class, 'getAll']);
        Router::get('/getOne', [\App\Controller\Admin\AdminController::class, 'getOne']);
        Router::get('/add', [\App\Controller\Admin\AdminController::class, 'add']);
        Router::get('/save', [\App\Controller\Admin\AdminController::class, 'save']);
        Router::get('/delete', [\App\Controller\Admin\AdminController::class, 'delete']);
    });

}, ['middleware' => [AdminCheckMiddleware::class]]);