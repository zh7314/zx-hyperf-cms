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

use App\Middleware\CorsMiddleware;
use Hyperf\HttpServer\Router\Router;
use App\Middleware\AdminCheckMiddleware;

Router::get('/', [\App\Controller\Web\IndexController::class, 'index']);
Router::get('/test', [\App\Controller\Web\IndexController::class, 'test']);

Router::get('/favicon.ico', function () {
    return '';
});

Router::addGroup('/api/admin', function () {

    Router::post('/login', [\App\Controller\Admin\IndexController::class, 'login']);
    Router::post('/getCaptcha', [\App\Controller\Admin\IndexController::class, 'getCaptcha']);
    Router::post('/uploadPic', [\App\Controller\Admin\IndexController::class, 'uploadPic']);
    Router::post('/uploadFile', [\App\Controller\Admin\IndexController::class, 'uploadFile']);
});

Router::addGroup('/api/admin', function () {

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
        Router::get('/getList', [\App\Controller\Admin\AdminController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\AdminController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\AdminController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\AdminController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\AdminController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\AdminController::class, 'delete']);
    });
    Router::addGroup('/adminGroup', function () {
        Router::post('/getList', [\App\Controller\Admin\AdminGroupController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\AdminGroupController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\AdminGroupController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\AdminGroupController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\AdminGroupController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\AdminGroupController::class, 'delete']);
    });
    Router::addGroup('/adminLog', function () {
        Router::post('/getList', [\App\Controller\Admin\AdminLogController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\AdminLogController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\AdminLogController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\AdminLogController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\AdminLogController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\AdminLogController::class, 'delete']);
    });
    Router::addGroup('/adminPermission', function () {
        Router::post('/getList', [\App\Controller\Admin\AdminPermissionController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\AdminPermissionController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\AdminPermissionController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\AdminPermissionController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\AdminPermissionController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\AdminPermissionController::class, 'delete']);
    });
    Router::addGroup('/banner', function () {
        Router::post('/getList', [\App\Controller\Admin\BannerController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\BannerController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\BannerController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\BannerController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\BannerController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\BannerController::class, 'delete']);
    });
    Router::addGroup('/bannerCate', function () {
        Router::post('/getList', [\App\Controller\Admin\BannerCateController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\BannerCateController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\BannerCateController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\BannerCateController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\BannerCateController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\BannerCateController::class, 'delete']);
    });
    Router::addGroup('/config', function () {
        Router::post('/getList', [\App\Controller\Admin\ConfigController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\ConfigController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\ConfigController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\ConfigController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\ConfigController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\ConfigController::class, 'delete']);
    });
    Router::addGroup('/download', function () {
        Router::post('/getList', [\App\Controller\Admin\DownloadController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\DownloadController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\DownloadController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\DownloadController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\DownloadController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\DownloadController::class, 'delete']);
    });
    Router::addGroup('/downloadCate', function () {
        Router::post('/getList', [\App\Controller\Admin\DownloadCateController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\DownloadCateController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\DownloadCateController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\DownloadCateController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\DownloadCateController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\DownloadCateController::class, 'delete']);
    });
    Router::addGroup('/feedback', function () {
        Router::post('/getList', [\App\Controller\Admin\FeedbackController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\FeedbackController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\FeedbackController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\FeedbackController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\FeedbackController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\FeedbackController::class, 'delete']);
    });
    Router::addGroup('/file', function () {
        Router::post('/getList', [\App\Controller\Admin\FileController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\FileController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\FileController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\FileController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\FileController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\FileController::class, 'delete']);
    });
    Router::addGroup('/friendLink', function () {
        Router::post('/getList', [\App\Controller\Admin\FriendLinkController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\FriendLinkController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\FriendLinkController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\FriendLinkController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\FriendLinkController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\FriendLinkController::class, 'delete']);
    });
    Router::addGroup('/jobOffers', function () {
        Router::post('/getList', [\App\Controller\Admin\JobOffersController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\JobOffersController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\JobOffersController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\JobOffersController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\JobOffersController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\JobOffersController::class, 'delete']);
    });
    Router::addGroup('/lang', function () {
        Router::post('/getList', [\App\Controller\Admin\LangController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\LangController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\LangController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\LangController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\LangController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\LangController::class, 'delete']);
    });
    Router::addGroup('/message', function () {
        Router::post('/getList', [\App\Controller\Admin\MessageController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\MessageController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\MessageController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\MessageController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\MessageController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\MessageController::class, 'delete']);
    });
    Router::addGroup('/news', function () {
        Router::post('/getList', [\App\Controller\Admin\NewsController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\NewsController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\NewsController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\NewsController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\NewsController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\NewsController::class, 'delete']);
    });
    Router::addGroup('/newsCate', function () {
        Router::post('/getList', [\App\Controller\Admin\NewsCateController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\NewsCateController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\NewsCateController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\NewsCateController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\NewsCateController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\NewsCateController::class, 'delete']);
    });
    Router::addGroup('/platform', function () {
        Router::post('/getList', [\App\Controller\Admin\PlatformController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\PlatformController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\PlatformController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\PlatformController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\PlatformController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\PlatformController::class, 'delete']);
    });
    Router::addGroup('/product', function () {
        Router::post('/getList', [\App\Controller\Admin\ProductController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\ProductController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\ProductController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\ProductController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\ProductController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\ProductController::class, 'delete']);
    });
    Router::addGroup('/productCate', function () {
        Router::post('/getList', [\App\Controller\Admin\ProductCateController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\ProductCateController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\ProductCateController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\ProductCateController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\ProductCateController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\ProductCateController::class, 'delete']);
    });
    Router::addGroup('/requestLog', function () {
        Router::post('/getList', [\App\Controller\Admin\RequestLogController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\RequestLogController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\RequestLogController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\RequestLogController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\RequestLogController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\RequestLogController::class, 'delete']);
    });
    Router::addGroup('/seo', function () {
        Router::post('/getList', [\App\Controller\Admin\SeoController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\SeoController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\SeoController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\SeoController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\SeoController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\SeoController::class, 'delete']);
    });
    Router::addGroup('/video', function () {
        Router::post('/getList', [\App\Controller\Admin\VideoController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\VideoController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\VideoController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\VideoController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\VideoController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\VideoController::class, 'delete']);
    });
    Router::addGroup('/videoCate', function () {
        Router::post('/getList', [\App\Controller\Admin\VideoCateController::class, 'getList']);
        Router::post('/getAll', [\App\Controller\Admin\VideoCateController::class, 'getAll']);
        Router::post('/getOne', [\App\Controller\Admin\VideoCateController::class, 'getOne']);
        Router::post('/add', [\App\Controller\Admin\VideoCateController::class, 'add']);
        Router::post('/save', [\App\Controller\Admin\VideoCateController::class, 'save']);
        Router::post('/delete', [\App\Controller\Admin\VideoCateController::class, 'delete']);
    });
}, ['middleware' => [AdminCheckMiddleware::class]]);