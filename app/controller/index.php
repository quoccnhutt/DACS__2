<?php

class index extends DController
{

	public function __construct()
	{
		$data = array();
		parent::__construct();
	}

	public function index()
	{
		$this->homepage();
	}

	public function homepage()
	{
		session::init();

		$table_cate_pro = 'tbl_category_product';
		$table_cate_post = 'tbl_category_post';
		$table_product = 'tbl_product';
		$table_post = 'tbl_post';
		$table_banner = 'tbl_banner';
		$table_slide = 'tbl_slide';

		$categoryModel = $this->load->model('categoryModel');
		$productModel = $this->load->model('productModel');
		$postModel = $this->load->model('postModel');
		$slideModel = $this->load->model('slideModel');


		$data['danhmucsanpham'] = $categoryModel->list_category($table_cate_pro);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table_cate_post);
		$data['product'] = $productModel->list_product_home($table_product);
		$data['producthot'] = $productModel->list_product_hot($table_product);
		$data['post'] = $postModel->post_new($table_post);
		$data['banners'] = $slideModel->select_banner($table_banner);
		$data['slides'] = $slideModel->select_slide($table_slide);


		$this->load->view('header', $data);
		$this->load->view('slider', $data);
		$this->load->view('home', $data);
		$this->load->view('footer', $data);
	}

	// load sản phẩm
	public function loadproduct()
	{
		$table_cate_pro = 'tbl_category_product';
		$categoryModel = $this->load->model('categoryModel');
		$data['danhmucsanpham'] = $categoryModel->list_category($table_cate_pro);
		$id_cate = $_GET['idDM'];
		$sotin1trang = 4;

		$trang = $_GET["page"];

		settype($trang, "int");
		$from = ($trang - 1) * $sotin1trang;

		$table_product = 'tbl_product';
		$productModel = $this->load->model('productModel');
		$data['productt'] = $productModel->list_product_byajax($table_product, $id_cate, $from, $sotin1trang);

		foreach ($data['productt'] as $key => $pro_cate) {
			// if ($pro_cate['id_category_product'] == $id_cate) {

			echo "<div class='col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 item-pro'>";
			echo "<form action='" . BASE_URL . "giohangController/themgiohang' method='POST'>";
			echo "<input type='hidden' name='product_id' value='" . $pro_cate['id_product'] . "'>";
			echo "<input type='hidden' name='product_title' value='" . $pro_cate['title_product'] . "'>";
			echo "<input type='hidden' name='product_title' value='" . $pro_cate['title_product'] . "'>";
			echo "<input type='hidden' name='product_image' value='" . $pro_cate['image_product'] . "'>";
			echo "<input type='hidden' name='product_image' value='" . $pro_cate['image_product'] . "'>";
			echo "<input type='hidden' name='product_price' value='" . $pro_cate['price_product'] . "'>";
			echo "<input type='hidden' name='product_quantity' value='1'>";
			echo "<div class='profile-card-4 text-center'>";
			echo "<a href='" . BASE_URL . "sanphamController/chitietsanpham/" . $pro_cate['id_product'] . "'>";
			echo "<img src='" . BASE_URL . "public/uploads/imgproduct/" . $pro_cate['image_product'] . "' class='img img-responsive' title='" . $pro_cate['title_product'] . "'>";
			echo "</a>";
			echo "<div class='profile-content'>";
			echo "<div class='profile-name'>";
			echo "</p>
                    </div>";
			echo "<a href='" . BASE_URL . "sanphamController/chitietsanpham/" . $pro_cate['id_product'] . "'>";
			echo "<div class=' profile-description vanban'>" . $pro_cate['title_product'] . "</div>";
			echo "</a>
                    <div class='row' style='justify-content: center;'>";
			echo "<div class='col-xs-6'>
                    <div class='nutmuahang'>
    
                        <button type='submit' class='btn btn-info btn-md'>Mua hàng</button>
                    </div>
                </div>";
			echo "<div class='col-xs-6'>
                    <div class='profile-overview'>
                        <h2>" . number_format($pro_cate['price_product'], 0, ',', '.') . '₫' . "</h2>
                        <h7>Giá cũ: " . number_format($pro_cate['price_product'], 0, ',', '.') . '₫' . "</h7>
                    </div>
                </div>";
			echo "     
                    </div>
                </div>
                </div>
                </form>
                </div>";
		}
	}

	public function lienhe()
	{
		session::init();

		$table2 = 'tbl_category_post';
		$table = 'tbl_category_product';

		$categoryModel = $this->load->model('categoryModel');


		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);


		$this->load->view('header', $data);
		$this->load->view('contact');
		$this->load->view('footer');
	}
	public function guilienhe()
	{
		$ten = $_POST['ten'];
		$email = $_POST['email'];
		$noidung = $_POST['noidung'];

		$table = 'tbl_lienhe';
		$data = array(
			'ten' 			=> $ten,
			'email' 			=> $email,
			'noidung' 			=> $noidung

		);
		$postModel = $this->load->model('postModel');
		$result = $postModel->insertlienhe($table, $data);

		if ($result == 1) {

			$message['msg'] = "Gửi thành công";
			header('Location:' . BASE_URL . "index/lienhe?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Gửi thất bại";
			header('Location:' . BASE_URL . "index/lienhe?msg=" . urlencode(serialize($message)));
		}
	}

	public function insert_post()
	{
		$title = $_POST['title_post'];
		$content = $_POST['content_post'];
		$cate = $_POST['category_post'];

		// Xử lý hình ảnh
		$image = $_FILES['image_post']['name'];
		$tmp_image = $_FILES['image_post']['tmp_name'];
		$div = explode('.', $image);
		$file_ext = strtolower(end($div));
		$unique_image = $div[0] . time() . '.' . $file_ext;
		$path_uploads = "public/uploads/imgpost/" . $unique_image;


		$table = 'tbl_post';
	}

	public function gioithieu()
	{
		session::init();

		// seo
		// $this->load->$title = "Tất cả bài viết - duongdong.com";
		// $this->load->$desc = "Tất cả bài viết - duongdong.com";

		$table2 = 'tbl_category_post';
		$table = 'tbl_category_product';
		$table3 = 'tbl_intro_page';


		$categoryModel = $this->load->model('categoryModel');
		$introModel = $this->load->model('introModel');

		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);
		$data['noidunggioithieu'] = $introModel->intro_page($table3);

		$this->load->view('header', $data);
		$this->load->view('gioithieu', $data);
		$this->load->view('footer');
	}
	public function notfound()
	{
		session::init();

		$table2 = 'tbl_category_post';
		$table = 'tbl_category_product';

		$categoryModel = $this->load->model('categoryModel');

		$data['danhmucsanpham'] = $categoryModel->list_category_home($table);
		$data['dmtintuc'] = $categoryModel->list_category_post_home($table);
		$data['danhmucbaiviet'] = $categoryModel->list_category_post($table2);

		$this->load->view('header', $data);
		$this->load->view('404');
		$this->load->view('footer');
	}
}
