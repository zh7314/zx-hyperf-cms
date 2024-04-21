<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\RequestLogService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class RequestLogController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['header'] = parameterCheck($this->request->input('header'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['params'] = parameterCheck($this->request->input('params'), 'string', '');
            $where['return_at'] = parameterCheck($this->request->input('return_at'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = RequestLogService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['header'] = parameterCheck($this->request->input('header'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['params'] = parameterCheck($this->request->input('params'), 'string', '');
            $where['return_at'] = parameterCheck($this->request->input('return_at'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');


            $data = RequestLogService::getAll($where);

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

            $data = RequestLogService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['header'] = parameterCheck($this->request->input('header'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['params'] = parameterCheck($this->request->input('params'), 'string', '');
            $where['return_at'] = parameterCheck($this->request->input('return_at'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = RequestLogService::add($where);

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
                        $where['data'] = parameterCheck($this->request->input('data'), 'string', '');
            $where['header'] = parameterCheck($this->request->input('header'), 'string', '');
            $where['ip'] = parameterCheck($this->request->input('ip'), 'string', '');
            $where['method'] = parameterCheck($this->request->input('method'), 'string', '');
            $where['params'] = parameterCheck($this->request->input('params'), 'string', '');
            $where['return_at'] = parameterCheck($this->request->input('return_at'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = RequestLogService::save($where);

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
            $data = RequestLogService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
