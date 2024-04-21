<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\FeedbackService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class FeedbackController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['contact'] = parameterCheck($this->request->input('contact'), 'string', '');
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['nick_name'] = parameterCheck($this->request->input('nick_name'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');

            $data = FeedbackService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['contact'] = parameterCheck($this->request->input('contact'), 'string', '');
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['nick_name'] = parameterCheck($this->request->input('nick_name'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');


            $data = FeedbackService::getAll($where);

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

            $data = FeedbackService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['contact'] = parameterCheck($this->request->input('contact'), 'string', '');
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['nick_name'] = parameterCheck($this->request->input('nick_name'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');

            $data = FeedbackService::add($where);

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
                        $where['contact'] = parameterCheck($this->request->input('contact'), 'string', '');
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['nick_name'] = parameterCheck($this->request->input('nick_name'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');

            $data = FeedbackService::save($where);

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
            $data = FeedbackService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
