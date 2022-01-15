<?php

class postController extends DController
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->add_category();
	}
	public function add_category()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/post/add_category');
		$this->load->view('cpanel/footer');
	}
	public function insert_category()
	{
		$title = $_POST['title_category_post'];
		$desc = $_POST['description'];
		$table = 'tbl_category_post';
		$data = array(
			'title_category_post' => $title,
			'description' 			=> $desc
		);
		$categoryModel = $this->load->model('categoryModel');
		$result = $categoryModel->insertCategory_post($table, $data);

		if ($result == 1) {
			$message['msg'] = "Thêm danh mục bài viết thành công";
			header('Location:' . BASE_URL . "postController?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Thêm danh mục bài viết thất bại";
			header('Location:' . BASE_URL . "postController?msg=" . urlencode(serialize($message)));
		}
	}

	public function list_category()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$table = "tbl_category_post";

		$categoryModel = $this->load->model('categoryModel');
		$data['categoryPost'] = $categoryModel->post_category($table);


		$this->load->view('cpanel/post/list_category', $data);
		$this->load->view('cpanel/footer');
	}

	public function xem_category($id)
	{
		$table = 'tbl_category_post';
		$condition = "id_category_post='$id'";

		$categoryModel = $this->load->model('categoryModel');
		$data['categorybyid'] = $categoryModel->categorybyId($table, $condition);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/post/detail_category_post', $data);
		$this->load->view('cpanel/footer');
	}

	public function delete_category($id)
	{
		$table = 'tbl_category_post';
		$condition = "id_category_post = '$id'";
		$categoryModel = $this->load->model('categoryModel');

		$result = $categoryModel->deleteCategory_post($table, $condition);

		if ($result == 1) {
			$message['msg'] = "Xoá thành công";
			header('Location:' . BASE_URL . "postController/list_category?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Xoá thất bại";
			header('Location:' . BASE_URL . "postController/list_category?msg=" . urlencode(serialize($message)));
		}
	}

	public function edit_category($id)
	{

		$table = 'tbl_category_post';
		$condition = "id_category_post='$id'";

		$categoryModel = $this->load->model('categoryModel');
		$data['categorybyid'] = $categoryModel->categorybyId($table, $condition);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/post/edit_category', $data);
		$this->load->view('cpanel/footer');
	}


	public function update_category($id)
	{
		$table = 'tbl_category_post';
		$condition = "id_category_post='$id'";

		$title = $_POST['title_category_post'];
		$description = $_POST['description'];

		$data = array(
			'title_category_post' => $title,
			'description' 			=> $description
		);
		$categoryModel = $this->load->model('categoryModel');
		$result = $categoryModel->updateCategory_post($table, $data, $condition);
		if ($result == 1) {
			$message['msg'] = "Cập nhật thành công";
			header('Location:' . BASE_URL . "postController/list_category?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Cập nhật thất bại";
			header('Location:' . BASE_URL . "postController/list_category?msg=" . urlencode(serialize($message)));
		}
	}







	public function add_post()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$table = 'tbl_category_post';

		$categoryModel = $this->load->model('categoryModel');
		$data['category_post'] = $categoryModel->post_category($table);

		$this->load->view('cpanel/post/add_post', $data);
		$this->load->view('cpanel/footer');
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
		$data = array(
			'title_post' 			=> $title,
			'content_post' 			=> $content,
			'image_post' 			=> $unique_image,
			'id_category_post' 		=> $cate
		);
		$postModel = $this->load->model('postModel');
		$result = $postModel->insertPost($table, $data);

		if ($result == 1) {
			move_uploaded_file($tmp_image, $path_uploads);

			$message['msg'] = "Thêm bài viết thành công";
			header('Location:' . BASE_URL . "postController/add_post?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Thêm bài viết thất bại";
			header('Location:' . BASE_URL . "postController?/add_post?msg=" . urlencode(serialize($message)));
		}
	}

	public function list_post()
	{
		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');

		$table_post = "tbl_post";
		$table_category_post = "tbl_category_post";

		$postModel = $this->load->model('postModel');
		$data['posts'] = $postModel->list_post($table_post, $table_category_post);


		$this->load->view('cpanel/post/list_post', $data);
		$this->load->view('cpanel/footer');
	}


	public function delete_post($id)
	{
		$table = 'tbl_post';
		$condition = "id_post = '$id'";
		$postModel = $this->load->model('postModel');

		$result = $postModel->deletePost($table, $condition);

		if ($result == 1) {
			$message['msg'] = "Xoá thành công";
			header('Location:' . BASE_URL . "postController/list_post?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Xoá thất bại";
			header('Location:' . BASE_URL . "postController/list_post?msg=" . urlencode(serialize($message)));
		}
	}
	public function edit_post($id)
	{

		$table1 = 'tbl_post';
		$table2 = "tbl_category_post";

		$condition = "id_post='$id'";

		$postModel = $this->load->model('postModel');
		$categoryModel = $this->load->model('categoryModel');

		$data['postbyid'] = $postModel->postbyId($table1, $condition);
		$data['category_post'] = $categoryModel->list_category_post($table2);


		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/post/edit_post', $data);
		$this->load->view('cpanel/footer');
	}


	public function update_post($id)
	{
		$table = 'tbl_post';
		$condition = "id_post='$id'";
		$postModel = $this->load->model('postModel');


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
		if ($image) {
			$data['postbyid'] = $postModel->postbyId($table, $condition);
			foreach ($data['postbyid'] as $key => $value) {
				$path_unlink = "public/uploads/imgpost/";
				unlink($path_unlink . $value['image_post']);
			}
			move_uploaded_file($tmp_image, $path_uploads);

			$data = array(
				'title_post' 			=> $title,
				'content_post' 			=> $content,
				'image_post' 			=> $unique_image,
				'id_category_post' 		=> $cate
			);
		} else {
			$data = array(
				'title_post' 			=> $title,
				'content_post' 			=> $content,
				// 'image_post' 			=> $unique_image,
				'id_category_post' 		=> $cate
			);
		}

		$result = $postModel->updatePost($table, $data, $condition);


		if ($result == 1) {
			$message['msg'] = "Cập nhật thành công";
			header('Location:' . BASE_URL . "postController/list_post?msg=" . urlencode(serialize($message)));
		} else {
			$message['msg'] = "Cập nhật thất bại";
			header('Location:' . BASE_URL . "postController/list_post?msg=" . urlencode(serialize($message)));
		}
	}

	public function xemchitietbaiviet($id)
	{

		$table1 = 'tbl_post';
		$table2 = "tbl_category_post";

		$condition = "id_post='$id'";
		$postModel = $this->load->model('postModel');

		$data['postbyid'] = $postModel->postbyId($table1, $condition);
		$data['category'] = $postModel->details_post_home($table2, $table1, $id);

		$this->load->view('cpanel/header');
		$this->load->view('cpanel/menu');
		$this->load->view('cpanel/post/detail_post', $data);
		$this->load->view('cpanel/footer');
	}
}
