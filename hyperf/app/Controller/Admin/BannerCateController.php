<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\BannerCateService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class BannerCateController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = BannerCateService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);


            $data = BannerCateService::getAll($where);

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

            $data = BannerCateService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

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

            $data = BannerCateService::add($where);

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
                        $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($this->request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);

            $data = BannerCateService::save($where);

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
            $data = BannerCateService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
