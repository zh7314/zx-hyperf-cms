<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\FriendLinkService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class FriendLinkController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['is_follow'] = parameterCheck($this->request->input('is_follow'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = FriendLinkService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['is_follow'] = parameterCheck($this->request->input('is_follow'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');


            $data = FriendLinkService::getAll($where);

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

            $data = FriendLinkService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['is_follow'] = parameterCheck($this->request->input('is_follow'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = FriendLinkService::add($where);

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
                        $where['is_follow'] = parameterCheck($this->request->input('is_follow'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = FriendLinkService::save($where);

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
            $data = FriendLinkService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
