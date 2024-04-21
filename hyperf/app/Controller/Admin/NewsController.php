<?php 
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Service\Admin\NewsService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class NewsController extends AbstractController{

    use ResponseTrait;

    public function getList() {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'),'int',0);
            $pageSize = parameterCheck($this->request->input('pageSize'),'int',0);

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['count'] = parameterCheck($this->request->input('count'), 'int', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['news_cate_id'] = parameterCheck($this->request->input('news_cate_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['seo_description'] = parameterCheck($this->request->input('seo_description'), 'string', '');
            $where['seo_keyword'] = parameterCheck($this->request->input('seo_keyword'), 'string', '');
            $where['seo_title'] = parameterCheck($this->request->input('seo_title'), 'string', '');
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = NewsService::getList($where,$page,$pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll() {
        try {
            $where = [];

                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['count'] = parameterCheck($this->request->input('count'), 'int', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['news_cate_id'] = parameterCheck($this->request->input('news_cate_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['seo_description'] = parameterCheck($this->request->input('seo_description'), 'string', '');
            $where['seo_keyword'] = parameterCheck($this->request->input('seo_keyword'), 'string', '');
            $where['seo_title'] = parameterCheck($this->request->input('seo_title'), 'string', '');
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');


            $data = NewsService::getAll($where);

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

            $data = NewsService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add() {

        Db::beginTransaction();
        try {
            $where = [];
                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['count'] = parameterCheck($this->request->input('count'), 'int', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['news_cate_id'] = parameterCheck($this->request->input('news_cate_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['seo_description'] = parameterCheck($this->request->input('seo_description'), 'string', '');
            $where['seo_keyword'] = parameterCheck($this->request->input('seo_keyword'), 'string', '');
            $where['seo_title'] = parameterCheck($this->request->input('seo_title'), 'string', '');
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = NewsService::add($where);

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
                        $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['count'] = parameterCheck($this->request->input('count'), 'int', 0);
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['news_cate_id'] = parameterCheck($this->request->input('news_cate_id'), 'float', 0);
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['seo_description'] = parameterCheck($this->request->input('seo_description'), 'string', '');
            $where['seo_keyword'] = parameterCheck($this->request->input('seo_keyword'), 'string', '');
            $where['seo_title'] = parameterCheck($this->request->input('seo_title'), 'string', '');
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');

            $data = NewsService::save($where);

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
            $data = NewsService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
