<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\JobOffersService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class JobOffersController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['number'] = parameterCheck($this->request->input('number'), 'string', '');
            $where['place'] = parameterCheck($this->request->input('place'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['salary_range'] = parameterCheck($this->request->input('salary_range'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = JobOffersService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['number'] = parameterCheck($this->request->input('number'), 'string', '');
            $where['place'] = parameterCheck($this->request->input('place'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['salary_range'] = parameterCheck($this->request->input('salary_range'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');


            $data = JobOffersService::getAll($where);

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

            $data = JobOffersService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['number'] = parameterCheck($this->request->input('number'), 'string', '');
            $where['place'] = parameterCheck($this->request->input('place'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['salary_range'] = parameterCheck($this->request->input('salary_range'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = JobOffersService::add($where);

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
                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['number'] = parameterCheck($this->request->input('number'), 'string', '');
            $where['place'] = parameterCheck($this->request->input('place'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['salary_range'] = parameterCheck($this->request->input('salary_range'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = JobOffersService::save($where);

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
            $data = JobOffersService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
