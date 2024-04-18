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


Router::get('/', [\App\Controller\Web\IndexController::class, 'index']);
Router::get('/test', [\App\Controller\Web\IndexController::class, 'test']);

//Router::addGroup();

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup('/admin', function () {

    Router::post('/login', [\App\Controller\Admin\IndexController::class, 'login']);
    Router::post('/getCaptcha', [\App\Controller\Admin\IndexController::class, 'getCaptcha']);
    Router::post('/uploadPic', [\App\Controller\Admin\IndexController::class, 'uploadPic']);
    Router::post('/uploadFile', [\App\Controller\Admin\IndexController::class, 'uploadFile']);
});

Router::addGroup('/admin', function () {

    Router::post('/getMenu', [\App\Controller\Admin\IndexController::class, 'getMenu']);
    Router::post('/getInfo', [\App\Controller\Admin\IndexController::class, 'getInfo']);
    Router::post('/logout', [\App\Controller\Admin\IndexController::class, 'logout']);
    Router::post('/getVersion', [\App\Controller\Admin\IndexController::class, 'getVersion']);
    Router::post('/changePwd', [\App\Controller\Admin\IndexController::class, 'changePwd']);

    Router::post('/getGroupTree', [\App\Controller\Admin\IndexController::class, 'getGroupTree']);
    Router::post('/getMenuTree', [\App\Controller\Admin\IndexController::class, 'getMenuTree']);
    Router::post('/getDownloadCateTree', [\App\Controller\Admin\IndexController::class, 'getDownloadCateTree']);
    Router::post('/getNewsCateTree', [\App\Controller\Admin\IndexController::class, 'getNewsCateTree']);
    Router::post('/getProductCateTree', [\App\Controller\Admin\IndexController::class, 'getProductCateTree']);
    Router::post('/getVideoCateTree', [\App\Controller\Admin\IndexController::class, 'getVideoCateTree']);
    Router::post('/getBannerCateTree', [\App\Controller\Admin\IndexController::class, 'getBannerCateTree']);

    Router::addGroup('/admin', function () {
        Router::post('/getList', [\App\Controller\Admin\AdminController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\AdminController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\AdminController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\AdminController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\AdminController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\AdminController::class, 'delete']);
    });

}, ['middleware' => [AdminCheckMiddleware::class]]);