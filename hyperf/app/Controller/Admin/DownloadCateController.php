<?php

namespace App\Controller\Admin;

use App\Service\Admin\DownloadCateService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class DownloadCateController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = DownloadCateService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);


            $data = DownloadCateService::getAll($where);

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

            $data = DownloadCateService::getOne($where['id']);

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
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = DownloadCateService::add($where);

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
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = DownloadCateService::save($where);

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
            $data = DownloadCateService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
