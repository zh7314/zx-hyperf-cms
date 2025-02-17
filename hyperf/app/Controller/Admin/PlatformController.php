<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\PlatformService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class PlatformController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['value'] = parameterCheck($this->request->input('value'), 'string', '');

            $data = PlatformService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['value'] = parameterCheck($this->request->input('value'), 'string', '');


            $data = PlatformService::getAll($where);

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

            $data = PlatformService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['value'] = parameterCheck($this->request->input('value'), 'string', '');

            $data = PlatformService::add($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function save() {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
                        $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['value'] = parameterCheck($this->request->input('value'), 'string', '');

            $data = PlatformService::save($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function delete() {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
            $data = PlatformService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
