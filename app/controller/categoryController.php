<?php

class categoryController extends DController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->list_category();
	}

	public function crud_category_product()
	{
		if (isset($_POST["action"])) {
			// insert
			if ($_POST["action"] == "insert") {
				$maDM = $_POST['maDM'];
				$title = $_POST['title_category_product'];
				$desc = $_POST['description'];

				$table = 'tbl_category_product';
				$data = array(
					'title_category_product' => $title,
					'decription' 			=> $desc,
					'maDM'					=> $maDM
				);
				$categoryModel = $this->load->model('categoryModel');
				$result = $categoryModel->insertCategory($table, $data);
				if ($result == 1) {
					$output['msg'] = array(
						'msg' => "Thêm thành công !!!",
						'icon' => "success"
					);
				} else {
					$output['msg'] = array(
						'msg' => "Thêm thất bại !!!",
						'icon' => "error"
					);
				}
				die(json_encode($output));
				// echo $maDM;
			}

			// load data
			if ($_POST["action"] == "fetch_single") {
				$id = $_POST["id"];

				$table = 'tbl_category_product';
				$condition = "id_category_product='$id'";

				$categoryModel = $this->load->model('categoryModel');
				$data['categorybyid'] = $categoryModel->categorybyId($table, $condition);

				foreach ($data['categorybyid'] as $key => $value) {
					$output['data'] = array(
						'title' => $value['title_category_product'],
						'code' => $value['maDM'],
						'desc' => $value['decription']
					);
				}
				die(json_encode($output));
			}
			// update
			if ($_POST["action"] == "update") {
				$id = $_POST["id"];

				$table = 'tbl_category_product';
				$condition = "id_category_product='$id'";

				$maDM = $_POST['maDM'];
				$title = $_POST['title_category_product'];
				$description = $_POST['description'];

				$data = array(
					'title_category_product' => $title,
					'decription' 			=> $description,
					'maDM' 					=> $maDM
				);
				$categoryModel = $this->load->model('categoryModel');
				$result = $categoryModel->updateCategory($table, $data, $condition);
				if ($result == 1) {
					$output['msg'] = array(
						'msg' => "Cập nhật thành công !!!",
						'icon' => "success"
					);
				} else {
					$output['msg'] = array(
						'msg' => "Cập nhật thất bại !!!",
						'icon' => "error"
					);
				}
				die(json_encode($output));
			}
		}
	}

	public function list_category()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$table = "tbl_category_product";
		$categoryModel = $this->load->model('categoryModel');
		$data['category'] = $categoryModel->list_category($table);

		$this->load->view('cpanel/product/list_category', $data);
		$this->load->view('cpanel/footer');
	}

	// load data category product admin
	public function load_data_catepro()
	{
		$table = "tbl_category_product";
		$categoryModel = $this->load->model('categoryModel');
		$data['all_category'] = $categoryModel->list_category($table);


		// Mặc định sẽ là trang 1.
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$totalCate = count($data['all_category']); // Lấy tổng số bài viết.
		$postOnePage = 5; // Số bài viết hiển thị trong 1 trang.
		// Khi đã có tổng số bài viết và số bài viết trong một trang ta có thể tính ra được tổng số trang
		$pageTotal = ceil($totalCate / $postOnePage);
		$limit = ($current_page - 1) * $postOnePage;

		$data['category'] = $categoryModel->select_category_page($table, $limit, $postOnePage);


		$output = '';
		$output .= '
		<table class="table table-hover " >
			<thead>
                <tr>
                    <th>STT</th>
                    <th>Mã danh mục</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Quản lý</th>
                </tr>
            </thead>
			<tbody id="result_search">
		';

		if ($totalCate > 0) {
			$i = 0;
			foreach ($data['category'] as $key => $cate) {
				$i++;
				$output .= '
				<tr>
	                <td>' . $i . '</td>
	                <td>' . $cate["maDM"] . '</td>
	                <td>' . $cate["title_category_product"] . '</td>
	                <td>' . $cate["decription"] . '</td>
	                <td>
	                    <a href="' . BASE_URL . 'categoryController/xem_category/' . $cate['id_category_product'] . '" class="btn btn-warning btn-sm">View</a>
	                    <button type="button" class="btn btn-primary edit btn-sm" id="' . $cate['id_category_product'] . '" name="edit"  data-toggle="modal" data-target="#add">Edit</button>
						<button type="button" class="btn btn-danger delete btn-sm" id="' . $cate['id_category_product'] . '" name="delete">Del</button>						
	                </td>
	            </tr>					
				';
			}
		} else {
			$output .= '
				<tr>
					<td colspan="5" align="center">Data not found</td>
				</tr>
				';
		}
		$output .= '
			</tbody>
		</table>';
		// phân trang
		$output .= '
		<div class="container">
			<nav aria-label="">
				<ul class="pagination">';
		if ($current_page == 1) {
			$disabled = 'disabled';
		} else {
			$disabled = '';
		}
		$output .= '
					<li class="page-item ' . $disabled . '">
						<a class="page-link" href="#" tabindex="-1" data-page="' . ($current_page - 1) . '">Previous</a>
					</li>
				';


		for ($i = 1; $i <= $pageTotal; $i++) {
			$class = ($current_page == $i) ? 'active' : '';
			$output .= '<li class="page-item ' . $class . '">';
			$output .= '<a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>';
			$output .= '</li>';
		}

		if ($current_page < $pageTotal) {
			$output .= '
					`<li class="page-item">
						<a class="page-link" href="#" data-page="' . ($current_page + 1) . '">Next»</a>
					</li>';
		}

		$output .= '</ul></nav></div>';
		echo $output;
	}
	// search category
	public function search_category()
	{
		$url = $_GET['url'];
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		$a = $_POST["search"];
		$sql = "SELECT * FROM tbl_category_product 
		WHERE title_category_product LIKE '%$a%' OR maDM LIKE '%$a%' OR decription LIKE '%$a%' 
		ORDER BY id_category_product DESC;";

		$categoryModel = $this->load->model('categoryModel');

		$data['result'] = $categoryModel->search($sql);
		$output = '';
		$num = count($data['result'], 0);
		if ($num > 0) {
			$i = 0;
			foreach ($data['result'] as $key => $value) {
				$i++;
				$output .= '
				<tr>
	                <td>' . $i . '</td>
	                <td>' . $value["maDM"] . '</td>
	                <td>' . $value["title_category_product"] . '</td>
	                <td>' . $value["decription"] . '</td>
	                <td>
	                    <a href="' . BASE_URL . 'categoryController/xem_category/' . $value['id_category_product'] . '" class="btn btn-warning btn-sm">View</a>
	                    <button type="button" class="btn btn-primary edit btn-sm" id="' . $value['id_category_product'] . '" name="edit"  data-toggle="modal" data-target="#add">Edit</button>
						<button type="button" class="btn btn-danger delete btn-sm" id="' . $value['id_category_product'] . '" name="delete">Del</button>						
	                </td>
	            </tr>					
				';
			}
		}
		echo $output;
	}

	public function xem_category($id)
	{
		$table = 'tbl_category_product';
		$condition = "id_category_product='$id'";

		$categoryModel = $this->load->model('categoryModel');
		$data['categorybyid'] = $categoryModel->categorybyId($table, $condition);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/product/detail_category', $data);
		$this->load->view('cpanel/footer');
	}

	public function delete_category()
	{
		// delete
		if ($_POST["action"] == "delete") {
			$id = $_POST["id"];

			$table = 'tbl_category_product';
			$condition = "id_category_product = '$id'";
			$categoryModel = $this->load->model('categoryModel');

			$result = $categoryModel->deleteCategory($table, $condition);

			die(json_encode($result));
		}
	}

	//  PRODUCT

	// load data product admin
	public function load_data_product()
	{
		$id_product = "id_product";
		$id_category_product = "id_category_product";
		$table_product = "tbl_product";
		$table_category_product = "tbl_category_product";

		$productModel = $this->load->model('productModel');
		$data['all_products'] = $productModel->list_product($table_product, $table_category_product);

		// Mặc định sẽ là trang 1.
		$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$total = count($data['all_products']); // Lấy tổng số bài viết.
		$postOnePage = 5; // Số bài viết hiển thị trong 1 trang.
		// Khi đã có tổng số bài viết và số bài viết trong một trang ta có thể tính ra được tổng số trang
		$pageTotal = ceil($total / $postOnePage);
		$limit = ($current_page - 1) * $postOnePage;

		$data['products'] = $productModel->select_product_page($table_product, $table_category_product, $limit, $postOnePage);

		$output = '';
		$output .= '
		<table class="table table-hover tbl-list11 table-bordered" >
			<thead>
                <tr>
				<th>ID</th>
				<th>Tên sản phẩm</th>
				<th>Giá mới</th>
				<th>Giá cũ</th>
				<th>Mô tả</th>
				<th>Số lượng</th>
				<th>Hình ảnh 1</th>
				<th>Hình ảnh 2</th>
				<th>Hình ảnh 3</th>
				<th>Danh mục</th>
				<th>Nổi bật</th>
				<th>Ngày</th>
				<th>Quản lý</th>
                </tr>
            </thead>
			<tbody id="result_search_product">
		';

		if ($total > 0) {
			$i = 0;
			foreach ($data['products'] as $key => $value) {
				if ($value['noi_bat'] == 0) {
					$noibat =  'Không';
				} else {
					$noibat = 'Có';
				}
				$i++;
				$output .= '
			<tr>
				  <td>' . $i . '</td>
				  <td>
				 	 <div class="vanban">' . $value["title_product"] . '</div>
				  </td>
				  <td>' . number_format($value["price_product"], 0, ',', '.') . ' VNĐ' . '</td>
				  <td>' . number_format($value["old_price_product"], 0, ',', '.') . ' VNĐ' . '</td>
				  <td>
				 	 <div class="vanban11">' . $value["desc_product"] . '</div>
				  </td>
				  <td>' . $value["quantity_product"] . '</td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product_2'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product_3'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>' . $value["title_category_product"] . '</td>
				  <td>' .	$noibat			  . '</td>
				  <td>' . $value["date"] . '</td>

				  <td>
					<a href="' . BASE_URL . 'categoryController/xemchitiet_sanpham/' . $value['id_product'] . '" class="btn btn-warning btn-sm">View</a>
					<button type="button" class="btn btn-primary editproduct btn-sm" id="' . $value['id_product'] . '" name="edit"  data-toggle="modal" data-target="#add_product">Edit</button>
					<button type="button" class="btn btn-danger deleteproduct btn-sm" id="' . $value['id_product'] . '" name="delete">Del</button>
				  </td>
				</tr>
			';
			}
		} else {
			$output .= '
			<tr>
				<td colspan="12" align="center">Data not found</td>
			</tr>
			';
		}
		$output .= '</tbody></table>';
		// phân trang
		$output .= '
		<div class="container d-flex flex-row-reverse">
			<nav aria-label="">
				<ul class="pagination">';
		if ($current_page == 1) {
			$disabled = 'disabled';
		} else {
			$disabled = '';
		}
		$output .= '
					<li class="page-item ' . $disabled . '">
						<a class="page-link" href="#" tabindex="-1" data-page="' . ($current_page - 1) . '">Previous</a>
					</li>
				';


		for ($i = 1; $i <= $pageTotal; $i++) {
			$class = ($current_page == $i) ? 'active' : '';
			$output .= '<li class="page-item ' . $class . '">';
			$output .= '<a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a>';
			$output .= '</li>';
		}

		if ($current_page < $pageTotal) {
			$output .= '
					`<li class="page-item">
						<a class="page-link" href="#" data-page="' . ($current_page + 1) . '">Next»</a>
					</li>';
		}

		$output .= '</ul></nav></div>';
		echo $output;
	}

	public function crud_product()
	{
		if (isset($_POST["action"])) {

			if ($_POST["action"] == "insert") {
				$title = $_POST['title_product'];
				$price = $_POST['price_product'];
				$price_old = $_POST['old_price_product'];
				$desc = $_POST['desc_product'];
				$quantity = $_POST['quantity_product'];
				$cate = $_POST['category_product'];
				$noibat = $_POST['noi_bat'];
				$date = $_POST['date'];

				// Xử lý hình ảnh 1 
				if ($_FILES['image_product']['name'] != '') {
					$image = $_FILES['image_product']['name'];
					$tmp_image = $_FILES['image_product']['tmp_name'];
					$div = explode('.', $image);

					$file_ext = strtolower(end($div));
					$allowed_type = array("jpg", "jpeg", "png", "gif");
					if (in_array($file_ext, $allowed_type)) {
						$unique_image = $div[0] . time() . '.' . $file_ext;
						$path_uploads = "public/uploads/imgproduct/" . $unique_image;
					}
				} else {
					$unique_image = '';
				}

				// Xử lý hình ảnh 2
				if ($_FILES['image_product_2']['name'] != '') {
					$image_2 = $_FILES['image_product_2']['name'];
					$tmp_image_2 = $_FILES['image_product_2']['tmp_name'];
					$div2 = explode('.', $image_2);
					$file_ext_2 = strtolower(end($div2));
					$allowed_type = array("jpg", "jpeg", "png", "gif");
					if (in_array($file_ext_2, $allowed_type)) {
						$unique_image_2 = $div2[0] . time() . '.' . $file_ext_2;
						$path_uploads_2 = "public/uploads/imgproduct/" . $unique_image_2;
					}
				} else {
					$unique_image_2 = '';
				}
				// Xử lý hình ảnh 3
				if ($_FILES['image_product_3']['name'] != '') {
					$image_3 = $_FILES['image_product_3']['name'];
					$tmp_image_3 = $_FILES['image_product_3']['tmp_name'];
					$div3 = explode('.', $image_3);
					$file_ext_3 = strtolower(end($div3));
					$allowed_type = array("jpg", "jpeg", "png", "gif");
					if (in_array($file_ext_3, $allowed_type)) {
						$unique_image_3 = $div3[0] . time() . '.' . $file_ext_3;
						$path_uploads_3 = "public/uploads/imgproduct/" . $unique_image_3;
					}
				} else {
					$unique_image_3 = '';
				}

				$table = 'tbl_product';
				$data = array(
					'title_product' 			=> $title,
					'price_product' 			=> $price,
					'old_price_product' 		=> $price_old,
					'desc_product' 				=> $desc,
					'quantity_product' 			=> $quantity,
					'image_product' 			=> $unique_image,
					'id_category_product' 		=> $cate,
					'noi_bat' 					=> $noibat,
					'image_product_2' 			=> $unique_image_2,
					'image_product_3' 			=> $unique_image_3,
					'date' 						=> $date
				);
				$productModel = $this->load->model('productModel');
				$result = $productModel->insertProduct($table, $data);

				if ($result == 1) {
					if ($unique_image != '') {
						move_uploaded_file($tmp_image, $path_uploads);
					}
					if ($unique_image_2 != '') {
						move_uploaded_file($tmp_image_2, $path_uploads_2);
					}
					if ($unique_image_3 != '') {
						move_uploaded_file($tmp_image_3, $path_uploads_3);
					}

					$output['msg'] = array(
						'msg' => "Thêm thành công !!!",
						'icon' => "success"
					);
				} else {
					$output['msg'] = array(
						'msg' => "Thêm thất bại !!!",
						'icon' => "error"
					);
				}
				die(json_encode($output));
			}
			// load data
			if ($_POST["action"] == "fetch_single") {
				$id = $_POST["id"];

				$table1 = 'tbl_product';
				// $table2 = "tbl_category_product";

				$condition = "id_product='$id'";

				$productModel = $this->load->model('productModel');
				// $categoryModel = $this->load->model('categoryModel');

				$data['productbyid'] = $productModel->productbyId($table1, $condition);
				// $data['category'] = $categoryModel->list_category($table2);

				foreach ($data['productbyid'] as $key => $value) {
					$output['data'] = array(
						'title_product' 			=> $value['title_product'],
						'price_product' 			=> $value['price_product'],
						'old_price_product' 		=> $value['old_price_product'],
						'desc_product' 				=> $value['desc_product'],
						'quantity_product' 			=> $value['quantity_product'],
						'image_product' 			=> $value['image_product'],
						'id_category_product' 		=> $value['id_category_product'],
						'noi_bat' 					=> $value['noi_bat'],
						'image_product_2' 			=> $value['image_product_2'],
						'image_product_3' 			=> $value['image_product_3'],
						'date' 						=> $value['date']
					);
				}
				die(json_encode($output));
			}
			// update
			if ($_POST["action"] == "update") {
				$id = $_POST["hidden_id"];

				$table = 'tbl_product';
				$condition = "id_product='$id'";


				$title = $_POST['title_product'];
				$price = $_POST['price_product'];
				$price_old = $_POST['old_price_product'];
				$desc = $_POST['desc_product'];
				$quantity = $_POST['quantity_product'];
				$cate = $_POST['category_product'];
				$noibat = $_POST['noi_bat'];
				$date = $_POST['date'];

				$img1 = $_FILES['image_product']['name'];
				$img2 = $_FILES['image_product_2']['name'];
				$img3 = $_FILES['image_product_3']['name'];


				$productModel = $this->load->model('productModel');

				$data['productbyid'] = $productModel->productbyId($table, $condition);

				// Xử lý hình ảnh 1 
				// if ($_FILES['image_product']['name'] != '') {
				// 	$image = $_FILES['image_product']['name'];
				// 	$tmp_image = $_FILES['image_product']['tmp_name'];
				// 	$div = explode('.', $image);

				// 	$file_ext = strtolower(end($div));
				// 	$allowed_type = array("jpg", "jpeg", "png", "gif");
				// 	if (in_array($file_ext, $allowed_type)) {
				// 		$unique_image = $div[0] . time() . '.' . $file_ext;
				// 		$path_uploads = "public/uploads/imgproduct/" . $unique_image;
				// 	}

				// 	foreach ($data['productbyid'] as $key => $value) {
				// 		$path_unlink = "public/uploads/imgproduct/";
				// 		unlink($path_unlink . $value['image_product']);
				// 	}
				// 	move_uploaded_file($tmp_image, $path_uploads);
				// } else {
				// 	$unique_image = '';
				// }

				// // Xử lý hình ảnh 2
				// if ($_FILES['image_product_2']['name'] != '') {
				// 	$image_2 = $_FILES['image_product_2']['name'];
				// 	$tmp_image_2 = $_FILES['image_product_2']['tmp_name'];
				// 	$div2 = explode('.', $image_2);
				// 	$file_ext_2 = strtolower(end($div2));
				// 	$allowed_type = array("jpg", "jpeg", "png", "gif");
				// 	if (in_array($file_ext_2, $allowed_type)) {
				// 		$unique_image_2 = $div2[0] . time() . '.' . $file_ext_2;
				// 		$path_uploads_2 = "public/uploads/imgproduct/" . $unique_image_2;
				// 	}
				// } else {
				// 	$unique_image_2 = '';
				// }
				// // Xử lý hình ảnh 3
				// if ($_FILES['image_product_3']['name'] != '') {
				// 	$image_3 = $_FILES['image_product_3']['name'];
				// 	$tmp_image_3 = $_FILES['image_product_3']['tmp_name'];
				// 	$div3 = explode('.', $image_3);
				// 	$file_ext_3 = strtolower(end($div3));
				// 	$allowed_type = array("jpg", "jpeg", "png", "gif");
				// 	if (in_array($file_ext_3, $allowed_type)) {
				// 		$unique_image_3 = $div3[0] . time() . '.' . $file_ext_3;
				// 		$path_uploads_3 = "public/uploads/imgproduct/" . $unique_image_3;
				// 	}
				// } else {
				// 	$unique_image_3 = '';
				// }

				$table = 'tbl_product';

				$data = array(
					'title_product' 			=> $title,
					'price_product' 			=> $price,
					'old_price_product' 		=> $price_old,
					'desc_product' 				=> $desc,
					'quantity_product' 			=> $quantity,
					// 'image_product' 			=> $unique_image,
					'id_category_product' 		=> $cate,
					'noi_bat' 					=> $noibat,
					// 'image_product_2' 			=> $unique_image_2,
					// 'image_product_3' 			=> $unique_image_3,
					'date' 						=> $date
				);



				$result = $productModel->updateProduct($table, $data, $condition);

				if ($result == 1) {
					// if ($unique_image != '') {
					// 	move_uploaded_file($tmp_image, $path_uploads);
					// }
					// if ($unique_image_2 != '') {
					// 	move_uploaded_file($tmp_image_2, $path_uploads_2);
					// }
					// if ($unique_image_3 != '') {
					// 	move_uploaded_file($tmp_image_3, $path_uploads_3);
					// }

					$output['msg'] = array(
						'msg' => "Cập nhật thành công !!!",
						'icon' => "success"
					);
				} else {
					$output['msg'] = array(
						'msg' => "Cập nhật thất bại !!!",
						'icon' => "error"
					);
				}
				die(json_encode($output));
			}
		}
	}

	// search category
	public function search_product()
	{
		if (isset($_POST["search"])) {
			$a = $_POST["search"];
			$sql = "SELECT * FROM tbl_product
		WHERE title_product LIKE '%$a%' OR price_product LIKE '%$a%' OR old_price_product LIKE '%$a%' OR quantity_product LIKE '%$a%' 
		ORDER BY tbl_product.id_product DESC;";
		} else
		if (isset($_POST["id_cate"])) {
			$id_cate = $_POST["id_cate"];
			$sql = "SELECT * FROM tbl_product
			WHERE id_category_product = $id_cate
			ORDER BY id_product DESC;";
		}
		$productModel = $this->load->model('productModel');
		$data['result'] = $productModel->searchProduct($sql);

		$table = "tbl_category_product";
		$categoryModel = $this->load->model('categoryModel');
		$data['category'] = $categoryModel->list_category($table);

		$num = count($data['result'], 0);
		$output = '';
		if ($num > 0) {
			$i = 0;
			foreach ($data['result'] as $key => $value) {
				if ($value['noi_bat'] == 0) {
					$noibat =  'Không';
				} else {
					$noibat = 'Có';
				}
				foreach ($data['category'] as $key => $value1) {
					if ($value['id_category_product'] == $value1['id_category_product']) {
						$title_cate = $value1['title_category_product'];
					}
				}

				$i++;
				$output .= '
			<tr>
				  <td>' . $i . '</td>
				  <td>
				 	 <div class="vanban">' . $value["title_product"] . '</div>
				  </td>
				  <td>' . number_format($value["price_product"], 0, ',', '.') . ' VNĐ' . '</td>
				  <td>' . number_format($value["old_price_product"], 0, ',', '.') . ' VNĐ' . '</td>
				  <td>
				 	 <div class="vanban11">' . $value["desc_product"] . '</div>
				  </td>
				  <td>' . $value["quantity_product"] . '</td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product_2'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>
				  	<img src="' . BASE_URL . 'public/uploads/imgproduct/' . $value['image_product_3'] . '" height="100px" width="100px" alt="">
				  </td>
				  <td>' . $title_cate . '</td>
				  <td>' .	$noibat			  . '</td>
				  <td>' . $value["date"] . '</td>

				  <td>
					<a href="' . BASE_URL . 'categoryController/xemchitiet_sanpham/' . $value['id_product'] . '" class="btn btn-warning btn-sm">View</a>
					<button type="button" class="btn btn-primary editproduct btn-sm" id="' . $value['id_product'] . '" name="edit"  data-toggle="modal" data-target="#add_product">Edit</button>
					<button type="button" class="btn btn-danger deleteproduct btn-sm" id="' . $value['id_product'] . '" name="delete">Del</button>
				  </td>
				</tr>
			';
			}
		} else {
			$output .= '
			<tr>
				<td colspan="12" align="center">Data not found</td>
			</tr>
			';
		}
		echo $output;
	}

	public function list_product()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$table = "tbl_category_product";
		$categoryModel = $this->load->model('categoryModel');
		$data['category'] = $categoryModel->list_category($table);

		$this->load->view('cpanel/product/list_product', $data);
		$this->load->view('cpanel/footer');
	}

	public function listProductById()
	{
	}

	public function xemchitiet_sanpham($id)
	{
		$table1 = 'tbl_product';
		$table2 = "tbl_category_product";

		$condition = "id_product='$id'";

		$productModel = $this->load->model('productModel');

		$data['productbyid'] = $productModel->productbyId($table1, $condition);
		$data['category'] = $productModel->details_product_home($table2, $table1, $id);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/product/detail_product', $data);
		$this->load->view('cpanel/footer');
	}

	public function delete_product()
	{
		if ($_POST["action"] == "delete") {
			$id = $_POST["id"];

			$table = 'tbl_product';
			$condition = "id_product = '$id'";
			$productModel = $this->load->model('productModel');

			$result = $productModel->deleteProduct($table, $condition);

			die(json_encode($result));
		}
	}
}
