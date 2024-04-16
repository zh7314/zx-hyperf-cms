<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Admin;
use App\Service\Admin\CommonService;
use App\Service\Admin\LoginService;
use App\Utils\ResponseTrait;
use Exception;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

class IndexController extends AbstractController
{
    use ResponseTrait;

    public function getCaptcha(RequestInterface $request, ResponseInterface $response)
    {
        try {
            $data = app('captcha')->create('default', true);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function login(RequestInterface $request, ResponseInterface $response)
    {
        DB::beginTransaction();
        try {

            $name = parameterCheck($request->username, 'string', '');
            $password = parameterCheck($request->password, 'string', '');
            $code = parameterCheck($request->code, 'string', '');
            $captchaKey = parameterCheck($request->captchaKey, 'string', '');

            $data = LoginService::login($name, $password, $code, $captchaKey);
            DB::commit();
            return $this->success($data, '登录成功');
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function logout(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $adminId = parameterCheck($request->admin_id, 'string', '');

            $data = LoginService::logout($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getInfo(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $adminId = parameterCheck($request->admin_id, 'string', '');

            $data = LoginService::getInfo($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getMenu(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $adminId = parameterCheck($request->admin_id, 'string', '');

            $data = LoginService::getMenu($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }


    public function uploadPic(RequestInterface $request, ResponseInterface $response)
    {
        $file = $request->file('file');

        try {
            if ($file == null) {
                throw new Exception('未找到上传文件');
            }
            $data = CommonService::uploadFile($file, ['jpg', 'jpeg', 'png', 'mbp', 'gif']);
            $data['src'] = URL::to($data['src']);

            return $this->success($data, '上传成功');
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function uploadFile(RequestInterface $request, ResponseInterface $response)
    {
        $file = $request->file('file');

        try {
            if ($file == null) {
                throw new Exception('未找到上传文件');
            }
            $data = CommonService::uploadFile($file, ['xls', 'xlsx', 'pdf', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'zip', 'pptx', 'mp4', 'flv'], 'file');
            $data['src'] = URL::to($data['src']);

            return $this->success($data, '上传成功');
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getVersion(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = LoginService::getVersion();

//            return $this->grant(new Exception('sssss'));

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function changePwd(RequestInterface $request, ResponseInterface $response)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->input('admin_id'), 'int', 0);

            $where['userPassword'] = parameterCheck($request->input('userPassword'), 'string', '');
            $where['newPassword'] = parameterCheck($request->input('newPassword'), 'string', '');
            $where['confirmNewPassword'] = parameterCheck($request->input('confirmNewPassword'), 'string', '');

            $data = LoginService::changePwd($where);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function getGroupTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getGroupTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getMenuTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getMenuTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getdownloadCateTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getdownloadCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getNewsCateTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getNewsCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getProductCateTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getProductCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getVideoCateTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getVideoCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getBannerCateTree(RequestInterface $request, ResponseInterface $response)
    {
        try {

            $data = CommonService::getBannerCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }
}
