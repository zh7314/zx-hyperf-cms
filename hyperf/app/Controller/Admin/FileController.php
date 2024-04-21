<?php

namespace App\Controller\Admin;

use App\Service\Admin\FileService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class FileController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['file_name'] = parameterCheck($this->request->input('file_name'), 'string', '');
            $where['file_path'] = parameterCheck($this->request->input('file_path'), 'string', '');
            $where['file_size'] = parameterCheck($this->request->input('file_size'), 'int', 0);

            $data = FileService::getList($where, $page, $pageSize);

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
            $where['file_name'] = parameterCheck($this->request->input('file_name'), 'string', '');
            $where['file_path'] = parameterCheck($this->request->input('file_path'), 'string', '');
            $where['file_size'] = parameterCheck($this->request->input('file_size'), 'int', 0);


            $data = FileService::getAll($where);

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

            $data = FileService::getOne($where['id']);

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
            $where['file_name'] = parameterCheck($this->request->input('file_name'), 'string', '');
            $where['file_path'] = parameterCheck($this->request->input('file_path'), 'string', '');
            $where['file_size'] = parameterCheck($this->request->input('file_size'), 'int', 0);

            $data = FileService::add($where);

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
            $where['file_name'] = parameterCheck($this->request->input('file_name'), 'string', '');
            $where['file_path'] = parameterCheck($this->request->input('file_path'), 'string', '');
            $where['file_size'] = parameterCheck($this->request->input('file_size'), 'int', 0);

            $data = FileService::save($where);

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
            $data = FileService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
