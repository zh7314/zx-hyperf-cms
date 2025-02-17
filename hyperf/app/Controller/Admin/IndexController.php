<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Admin;
use App\Service\Admin\CommonService;
use App\Service\Admin\LoginService;
use App\Util\ResponseTrait;
use Exception;
use Hyperf\Context\Context;
use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface;
use Throwable;

class IndexController extends AbstractController
{
    use ResponseTrait;

    public function getCaptcha()
    {
        try {
            $data = app('captcha')->create('default', true);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function login()
    {
        Db::beginTransaction();
        try {

            $name = parameterCheck($this->request->input('username'), 'string', '');
            $password = parameterCheck($this->request->input('password'), 'string', '');
            $code = parameterCheck($this->request->input('code'), 'string', '');
            $captchaKey = parameterCheck($this->request->input('captchaKey'), 'string', '');

            $data = LoginService::login($name, $password, $code, $captchaKey);
            Db::commit();
            return $this->success($data, '登录成功');
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function logout()
    {
        try {

            $adminId = parameterCheck(Context::get('admin_id'), 'int', 0);

            $data = LoginService::logout($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getInfo()
    {
        try {

            $adminId = parameterCheck(Context::get('admin_id'), 'int', 0);

            $data = LoginService::getInfo($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getMenu()
    {
        try {

            $adminId = parameterCheck(Context::get('admin_id'), 'int', 0);

            $data = LoginService::getMenu($adminId);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }


    public function uploadPic(RequestInterface $request)
    {
        $file = $request->file('file');

        try {
            if (!$file->isValid()) {
                throw new Exception('未找到上传文件');
            }
            $data = CommonService::uploadFile($file, ['jpg', 'jpeg', 'png', 'mbp', 'gif']);
            $data['src'] = to($data['src']);

            return $this->success($data, '上传成功');
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function uploadFile(RequestInterface $request)
    {
        $file = $request->file('file');

        try {
            if (!$file->isValid()) {
                throw new Exception('未找到上传文件');
            }
            $data = CommonService::uploadFile($file, ['xls', 'xlsx', 'pdf', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'zip', 'pptx', 'mp4', 'flv'], 'file');
            $data['src'] = to($data['src']);

            return $this->success($data, '上传成功');
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getVersion()
    {
        try {
            $data = LoginService::getVersion();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    //有bug
    public function changePwd()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck(Context::get('admin_id'), 'int', 0);

            $where['userPassword'] = parameterCheck($this->request->input('userPassword'), 'string', '');
            $where['newPassword'] = parameterCheck($this->request->input('newPassword'), 'string', '');
            $where['confirmNewPassword'] = parameterCheck($this->request->input('confirmNewPassword'), 'string', '');

            $data = LoginService::changePwd($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function getGroupTree()
    {
        try {

            $data = CommonService::getGroupTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getMenuTree()
    {
        try {

            $data = CommonService::getMenuTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getdownloadCateTree()
    {
        try {

            $data = CommonService::getdownloadCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getNewsCateTree()
    {
        try {

            $data = CommonService::getNewsCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getProductCateTree()
    {
        try {

            $data = CommonService::getProductCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getVideoCateTree()
    {
        try {

            $data = CommonService::getVideoCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getBannerCateTree()
    {
        try {

            $data = CommonService::getBannerCateTree();

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }
}
