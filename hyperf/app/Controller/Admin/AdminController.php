<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\AdminService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class AdminController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['admin_group_ids'] = parameterCheck($this->request->input('admin_group_ids'), 'string', '');
            $where['avatar'] = parameterCheck($this->request->input('avatar'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['is_admin'] = parameterCheck($this->request->input('is_admin'), 'int', 0);
            $where['login_ip'] = parameterCheck($this->request->input('login_ip'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['password'] = parameterCheck($this->request->input('password'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['salt'] = parameterCheck($this->request->input('salt'), 'string', '');
            $where['sex'] = parameterCheck($this->request->input('sex'), 'int', 0);
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['token'] = parameterCheck($this->request->input('token'), 'string', '');
            $where['token_time'] = parameterCheck($this->request->input('token_time'), 'string', '');

            $data = AdminService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['admin_group_ids'] = parameterCheck($this->request->input('admin_group_ids'), 'string', '');
            $where['avatar'] = parameterCheck($this->request->input('avatar'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['is_admin'] = parameterCheck($this->request->input('is_admin'), 'int', 0);
            $where['login_ip'] = parameterCheck($this->request->input('login_ip'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['password'] = parameterCheck($this->request->input('password'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['salt'] = parameterCheck($this->request->input('salt'), 'string', '');
            $where['sex'] = parameterCheck($this->request->input('sex'), 'int', 0);
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['token'] = parameterCheck($this->request->input('token'), 'string', '');
            $where['token_time'] = parameterCheck($this->request->input('token_time'), 'string', '');


            $data = AdminService::getAll($where);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getOne()
    {
        try {
            $where = [];

            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);

            $data = AdminService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['admin_group_ids'] = parameterCheck($this->request->input('admin_group_ids'), 'string', '');
            $where['avatar'] = parameterCheck($this->request->input('avatar'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['is_admin'] = parameterCheck($this->request->input('is_admin'), 'int', 0);
            $where['login_ip'] = parameterCheck($this->request->input('login_ip'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['password'] = parameterCheck($this->request->input('password'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['salt'] = parameterCheck($this->request->input('salt'), 'string', '');
            $where['sex'] = parameterCheck($this->request->input('sex'), 'int', 0);
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['token'] = parameterCheck($this->request->input('token'), 'string', '');
            $where['token_time'] = parameterCheck($this->request->input('token_time'), 'string', '');

            $data = AdminService::add($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function save()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
            $where['admin_group_ids'] = parameterCheck($this->request->input('admin_group_ids'), 'string', '');
            $where['avatar'] = parameterCheck($this->request->input('avatar'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['is_admin'] = parameterCheck($this->request->input('is_admin'), 'int', 0);
            $where['login_ip'] = parameterCheck($this->request->input('login_ip'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['password'] = parameterCheck($this->request->input('password'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['salt'] = parameterCheck($this->request->input('salt'), 'string', '');
            $where['sex'] = parameterCheck($this->request->input('sex'), 'int', 0);
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['token'] = parameterCheck($this->request->input('token'), 'string', '');
            $where['token_time'] = parameterCheck($this->request->input('token_time'), 'string', '');

            $data = AdminService::save($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function delete()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
            $data = AdminService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
