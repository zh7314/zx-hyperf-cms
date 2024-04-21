<?php

namespace App\Controller\Admin;

use App\Service\Admin\AdminLogService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class AdminLogController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['admin_name'] = parameterCheck($this->request->input('admin_name'), 'string', '');
            $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['request_ip'] = parameterCheck($this->request->input('request_ip'), 'string', '');
            $where['route_desc'] = parameterCheck($this->request->input('route_desc'), 'string', '');
            $where['route_name'] = parameterCheck($this->request->input('route_name'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = AdminLogService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['admin_name'] = parameterCheck($this->request->input('admin_name'), 'string', '');
            $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['request_ip'] = parameterCheck($this->request->input('request_ip'), 'string', '');
            $where['route_desc'] = parameterCheck($this->request->input('route_desc'), 'string', '');
            $where['route_name'] = parameterCheck($this->request->input('route_name'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');


            $data = AdminLogService::getAll($where);

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

            $data = AdminLogService::getOne($where['id']);

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
            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['admin_name'] = parameterCheck($this->request->input('admin_name'), 'string', '');
            $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['request_ip'] = parameterCheck($this->request->input('request_ip'), 'string', '');
            $where['route_desc'] = parameterCheck($this->request->input('route_desc'), 'string', '');
            $where['route_name'] = parameterCheck($this->request->input('route_name'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = AdminLogService::add($where);

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
            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['admin_name'] = parameterCheck($this->request->input('admin_name'), 'string', '');
            $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['request_ip'] = parameterCheck($this->request->input('request_ip'), 'string', '');
            $where['route_desc'] = parameterCheck($this->request->input('route_desc'), 'string', '');
            $where['route_name'] = parameterCheck($this->request->input('route_name'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = AdminLogService::save($where);

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
            $data = AdminLogService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
