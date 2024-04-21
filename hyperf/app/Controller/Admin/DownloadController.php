<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\DownloadService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class DownloadController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['download_cate_id'] = parameterCheck($this->request->input('download_cate_id'), 'float', 0);
            $where['introduction'] = parameterCheck($this->request->input('introduction'), 'string', '');
            $where['is_local'] = parameterCheck($this->request->input('is_local'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = DownloadService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['download_cate_id'] = parameterCheck($this->request->input('download_cate_id'), 'float', 0);
            $where['introduction'] = parameterCheck($this->request->input('introduction'), 'string', '');
            $where['is_local'] = parameterCheck($this->request->input('is_local'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');


            $data = DownloadService::getAll($where);

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

            $data = DownloadService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['download_cate_id'] = parameterCheck($this->request->input('download_cate_id'), 'float', 0);
            $where['introduction'] = parameterCheck($this->request->input('introduction'), 'string', '');
            $where['is_local'] = parameterCheck($this->request->input('is_local'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = DownloadService::add($where);

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
                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['download_cate_id'] = parameterCheck($this->request->input('download_cate_id'), 'float', 0);
            $where['introduction'] = parameterCheck($this->request->input('introduction'), 'string', '');
            $where['is_local'] = parameterCheck($this->request->input('is_local'), 'int', 0);
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['path'] = parameterCheck($this->request->input('path'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');

            $data = DownloadService::save($where);

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
            $data = DownloadService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
