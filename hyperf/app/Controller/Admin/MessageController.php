<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\MessageService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class MessageController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['is_sent'] = parameterCheck($this->request->input('is_sent'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['remark'] = parameterCheck($this->request->input('remark'), 'string', '');
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['type'] = parameterCheck($this->request->input('type'), 'int', 0);

            $data = MessageService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['is_sent'] = parameterCheck($this->request->input('is_sent'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['remark'] = parameterCheck($this->request->input('remark'), 'string', '');
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['type'] = parameterCheck($this->request->input('type'), 'int', 0);


            $data = MessageService::getAll($where);

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

            $data = MessageService::getOne($where['id']);

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
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['is_sent'] = parameterCheck($this->request->input('is_sent'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['remark'] = parameterCheck($this->request->input('remark'), 'string', '');
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['type'] = parameterCheck($this->request->input('type'), 'int', 0);

            $data = MessageService::add($where);

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
            $where['email'] = parameterCheck($this->request->input('email'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['is_sent'] = parameterCheck($this->request->input('is_sent'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['mobile'] = parameterCheck($this->request->input('mobile'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['real_name'] = parameterCheck($this->request->input('real_name'), 'string', '');
            $where['remark'] = parameterCheck($this->request->input('remark'), 'string', '');
            $where['status'] = parameterCheck($this->request->input('status'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['type'] = parameterCheck($this->request->input('type'), 'int', 0);

            $data = MessageService::save($where);

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
            $data = MessageService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
