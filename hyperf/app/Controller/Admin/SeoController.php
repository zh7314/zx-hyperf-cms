<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\SeoService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class SeoController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['description'] = parameterCheck($this->request->input('description'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['keyword'] = parameterCheck($this->request->input('keyword'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['position'] = parameterCheck($this->request->input('position'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = SeoService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['description'] = parameterCheck($this->request->input('description'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['keyword'] = parameterCheck($this->request->input('keyword'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['position'] = parameterCheck($this->request->input('position'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');


            $data = SeoService::getAll($where);

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

            $data = SeoService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['description'] = parameterCheck($this->request->input('description'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['keyword'] = parameterCheck($this->request->input('keyword'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['position'] = parameterCheck($this->request->input('position'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = SeoService::add($where);

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
                        $where['description'] = parameterCheck($this->request->input('description'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['keyword'] = parameterCheck($this->request->input('keyword'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['position'] = parameterCheck($this->request->input('position'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = SeoService::save($where);

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
            $data = SeoService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
