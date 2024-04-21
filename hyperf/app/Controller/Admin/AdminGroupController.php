<?php

namespace App\Controller\Admin;

use App\Service\Admin\AdminGroupService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class AdminGroupController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['permission_ids'] = parameterCheck($this->request->input('permission_ids'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminGroupService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['permission_ids'] = parameterCheck($this->request->input('permission_ids'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);


            $data = AdminGroupService::getAll($where);

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

            $data = AdminGroupService::getOne($where['id']);

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
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['permission_ids'] = parameterCheck($this->request->input('permission_ids'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminGroupService::add($where);

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
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['permission_ids'] = parameterCheck($this->request->input('permission_ids'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminGroupService::save($where);

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
            $data = AdminGroupService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
