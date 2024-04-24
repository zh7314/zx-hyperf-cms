<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\AdminPermissionService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class AdminPermissionController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['component'] = parameterCheck($this->request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($this->request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($this->request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($this->request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminPermissionService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['component'] = parameterCheck($this->request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($this->request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($this->request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($this->request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);


            $data = AdminPermissionService::getAll($where);

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

            $data = AdminPermissionService::getOne($where['id']);

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
            $where['component'] = parameterCheck($this->request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($this->request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($this->request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($this->request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminPermissionService::add($where);

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
            $where['component'] = parameterCheck($this->request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($this->request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($this->request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($this->request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = AdminPermissionService::save($where);

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
            $data = AdminPermissionService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
