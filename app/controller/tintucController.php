<?php

class tintucController extends DController
{

	public function __construct()
	{
		$data = array();

		parent::__construct();
	}

	public function index()
	{
		$this->danhmuc($id);
	}
	public function tatca()
	{
		session::init();

		// seo
		// $this->load->$title = "Tất cả bài viết - duongdong.com";
		// $this->load->$desc = "Tất cả bài viết - duongdong.com";

		$table2 = 'tbl_category_post';
		$table1 = 'tbl_post';
		$table = 'tbl_category_product';
		$categoryModel = $this->load->model('categoryModel');
		$postModel = $this->load->model('postModel');
		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['tintuc'] = $postModel->list_post_home($table1);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);

		$this->load->view('header', $data);
		$this->load->view('tin-tuc', $data);
		$this->load->view('footer');
	}
	public function danhmuc($id)
	{
		session::init();


		$table = 'tbl_category_post';
		$table1 = 'tbl_post';
		$categoryModel = $this->load->model('categoryModel');

		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['dmtintuc_id'] = $categoryModel->postbyId_home($table, $table1, $id);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table1);

		$this->load->view('header', $data);
		$this->load->view('categorypost', $data);
		$this->load->view('footer');
	}


	public function chitiettintuc($id)
	{
		session::init();

		$table = 'tbl_category_post';
		$table_post = 'tbl_post';
		$table_cate = 'tbl_category_product';
		$categoryModel = $this->load->model('categoryModel');
		$postModel = $this->load->model('postModel');

		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['chitiet_post'] = $postModel->details_post_home($table, $table_post, $id);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table);

		//san phẩm liên quan
		foreach ($data['chitiet_post'] as $key => $cate) {
			$id_cate = $cate['id_category_post'];
		}
		$cond = "$table.id_category_post=$table_post.id_category_post AND $table.id_category_post='$id_cate' AND $table_post.id_post NOT IN('$id')";
		$data['post_lienquan'] = $postModel->related_post_home($table, $table_post, $cond);
		$data['danhmucsanpham'] = $categoryModel->list_category_home($table_cate);


		$this->load->view('header', $data);
		// $this->load->view('slider');
		$this->load->view('details-post', $data);
		$this->load->view('footer');
	}
}
