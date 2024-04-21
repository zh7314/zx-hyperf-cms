<?php

namespace App\Controller\Admin;

use App\Service\Admin\ProductService;
use Throwable;
use App\Utils\ResponseTrait;
use Hyperf\DbConnection\Db;
use App\Controller\AbstractController;

class ProductController extends AbstractController
{

    use ResponseTrait;

    public function getList()
    {
        try {
            $where = [];
            $page = parameterCheck($this->request->input('page'), 'int', 0);
            $pageSize = parameterCheck($this->request->input('pageSize'), 'int', 0);

            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['product_cate_id'] = parameterCheck($this->request->input('product_cate_id'), 'int', 0);
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_url'] = parameterCheck($this->request->input('video_url'), 'string', '');
            $where['view_count'] = parameterCheck($this->request->input('view_count'), 'int', 0);

            $data = ProductService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll()
    {
        try {
            $where = [];

            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['product_cate_id'] = parameterCheck($this->request->input('product_cate_id'), 'int', 0);
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_url'] = parameterCheck($this->request->input('video_url'), 'string', '');
            $where['view_count'] = parameterCheck($this->request->input('view_count'), 'int', 0);


            $data = ProductService::getAll($where);

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

            $data = ProductService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['product_cate_id'] = parameterCheck($this->request->input('product_cate_id'), 'int', 0);
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_url'] = parameterCheck($this->request->input('video_url'), 'string', '');
            $where['view_count'] = parameterCheck($this->request->input('view_count'), 'int', 0);

            $data = ProductService::add($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function save()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
            $where['admin_id'] = parameterCheck($this->request->input('admin_id'), 'int', 0);
            $where['content'] = parameterCheck($this->request->input('content'), 'string', '');
            $where['end_time'] = parameterCheck($this->request->input('end_time'), 'string', '');
            $where['is_show'] = parameterCheck($this->request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($this->request->input('lang'), 'string', '');
            $where['pic'] = parameterCheck($this->request->input('pic'), 'string', '');
            $where['pics'] = parameterCheck($this->request->input('pics'), 'string', '');
            $where['platform'] = parameterCheck($this->request->input('platform'), 'string', '');
            $where['product_cate_id'] = parameterCheck($this->request->input('product_cate_id'), 'int', 0);
            $where['short_title'] = parameterCheck($this->request->input('short_title'), 'string', '');
            $where['sort'] = parameterCheck($this->request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($this->request->input('start_time'), 'string', '');
            $where['title'] = parameterCheck($this->request->input('title'), 'string', '');
            $where['url'] = parameterCheck($this->request->input('url'), 'string', '');
            $where['video_url'] = parameterCheck($this->request->input('video_url'), 'string', '');
            $where['view_count'] = parameterCheck($this->request->input('view_count'), 'int', 0);

            $data = ProductService::save($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function delete()
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($this->request->input('id'), 'int', 0);
            $data = ProductService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
