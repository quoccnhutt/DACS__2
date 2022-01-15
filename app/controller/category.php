<?php 

	class category extends DController{

		public function __construct(){
			$message = array();
			$data = array();
			parent::__construct();		
		}

		public function list_category(){

			$this->load->view('header');

			$categoryModel = $this->load->model('categoryModel');
			$table_category_product = 'tbl_category_product';
			$data['category'] = $categoryModel->category($table_category_product);

			$this->load->view('category', $data);
			$this->load->view('footer');
		}

		public function categoryById(){

			$this->load->view('header');
			$categoryModel = $this->load->model('categoryModel');
			$id = 3;
			$table_category_product = 'tbl_category_product';
			$data['categorybyid'] = $categoryModel->categorybyId($table_category_product, $id);

			$this->load->view('categoryById', $data);
			$this->load->view('footer');
		}

		public function addcategory(){
			$this->load->view('addCategogy');
			
		}



		public function insertCategory(){
			$categoryModel = $this->load->model('categoryModel');

			$table_category_product = 'tbl_category_product';

			$title = $_POST['title'];
			$description = $_POST['description'];

			$data = array(
				'title_category_product' => $title,
				'decription' 			=> $description
			);

			$result = $categoryModel->insertCategory($table_category_product, $data);
			if ($result == 1) {
				$message['msg'] = "Thêm dữ liệu thành công.";
			} else {
				$message['msg'] = "Thêm dữ liệu thất bại.";
			}

			$this->load->view('addCategogy', $message);
		}



		public function updateCategory(){
			$categoryModel = $this->load->model('categoryModel');
			$table_category_product = 'tbl_category_product';

			// $title = $_POST['title'];
			// $description = $_POST['description'];

			$condition = "id_category_product=1";

			// $data = array(
			// 	'title_category_product' => $title,
			// 	'decription' 			=> $description
			// );

			$data = array(
				'title_category_product' => 'Nguyễn',
				'decription' 			=> 'Nhựt'
			);

			$result = $categoryModel->updateCategory($table_category_product, $data, $condition);
			if ($result == 1) {
				// $message['msg'] = "Cập nhật dữ liệu thành công.";
				echo "Cập nhật dữ liệu thành công.";

			} else {
				echo 'Cập nhật dữ liệu thất bại';
			}

			

		}

		public function deleteCategory(){
			$categoryModel = $this->load->model('categoryModel');
			$table_category_product = 'tbl_category_product';

			// $title = $_POST['title'];
			// $description = $_POST['description'];

			$condition = "id_category_product=4";

			$result = $categoryModel->deleteCategory($table_category_product, $condition);

			if ($result == 1) {
				// $message['msg'] = "Cập nhật dữ liệu thành công.";
				echo "Xoá dữ liệu thành công.";

			} else {
				echo 'Xoá dữ liệu thất bại';
			}

			

		}














	}




 ?>