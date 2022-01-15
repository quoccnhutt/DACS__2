<?php

class sanphamController extends DController
{

	public function __construct()
	{
		$data = array();
		parent::__construct();
	}

	public function index()
	{
		$this->danhmuc();
	}

	public function tatca()
	{
		session::init();

		$table = 'tbl_category_product';
		$table1 = 'tbl_product';
		$table2 = 'tbl_category_post';

		$categoryModel = $this->load->model('categoryModel');
		$productModel = $this->load->model('productModel');

		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['sanpham'] = $productModel->list_product_home($table1);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);

		$this->load->view('header', $data);
		$this->load->view('san-pham', $data);
		$this->load->view('footer');
	}

	public function danhmuc($id)
	{
		session::init();

		$table2 = 'tbl_category_post';
		$table = 'tbl_category_product';
		$table1 = 'tbl_product';

		$categoryModel = $this->load->model('categoryModel');
		$productModel = $this->load->model('productModel');


		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);
		$data['danhmuc_id'] = $categoryModel->categorybyId_home($table, $table1, $id);



		$this->load->view('header', $data);
		$this->load->view('categoryproduct', $data);
		$this->load->view('footer');
	}
	// public function danhmuc($id){

	// 	$table = 'tbl_category_product';
	// 	$table_product = 'tbl_product';
	// 	$categorymodel = $this->load->model('categorymodel');
	// 	$data['category'] = $categorymodel->category_home($table);
	// 	$table_post = 'tbl_category_post';
	// 	$data['category_post'] = $categorymodel->categorypost_home($table_post);
	// 	$data['category_by_id'] = $categorymodel->categorybyid_home($table,$table_product,$id);

	// 	$this->load->view('header',$data);
	// 	$this->load->view('categoryproduct',$data);
	// 	$this->load->view('footer');
	// }
	public function chitietsanpham($id)
	{
		session::init();

		$table = 'tbl_category_product';
		$table_product = 'tbl_product';
		$categoryModel = $this->load->model('categoryModel');
		$productModel = $this->load->model('productModel');

		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['chitiet'] = $productModel->details_product_home($table, $table_product, $id);



		//san phẩm liên quan
		foreach ($data['chitiet'] as $key => $cate) {
			// code...
			$id_cate = $cate['id_category_product'];
		}
		$cond = "$table.id_category_product=$table_product.id_category_product AND $table.id_category_product='$id_cate' AND $table_product.id_product NOT IN('$id')";
		$data['lienquan'] = $productModel->related_product_home($table, $table_product, $cond);


		$this->load->view('header', $data);
		$this->load->view('details-product', $data);
		$this->load->view('footer');
	}
}
