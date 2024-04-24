<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\BannerService;
use Throwable;
use App\Util\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class BannerController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['banner_cate_id'] = parameterCheck($this->request->input('banner_cate_id'), 'float', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($this->request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($this->request->input('video_path'), 'string', '');

            $data = BannerService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'float', 0);
            $where['banner_cate_id'] = parameterCheck($this->request->input('banner_cate_id'), 'float', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($this->request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($this->request->input('video_path'), 'string', '');


            $data = BannerService::getAll($where);

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

            $data = BannerService::getOne($where['id']);

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
            $where['banner_cate_id'] = parameterCheck($this->request->input('banner_cate_id'), 'float', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($this->request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($this->request->input('video_path'), 'string', '');

            $data = BannerService::add($where);

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
            $where['banner_cate_id'] = parameterCheck($this->request->input('banner_cate_id'), 'float', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($this->request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($this->request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($this->request->input('video_path'), 'string', '');

            $data = BannerService::save($where);

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
            $data = BannerService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
