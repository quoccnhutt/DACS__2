
<?php

class categoryModel extends DModel
{
	public function __construct()
	{

		parent::__construct();
	}

	public function search($sql)
	{
		return $this->db->select($sql);
	}

	public function list_category($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
		return $this->db->select($sql);
	}
	// PHÂN TRANG
	public function select_category_page($table, $start, $limit)
	{
		$sql = "SELECT * FROM $table LIMIT $start, $limit";
		return $this->db->select($sql);
	}
	public function categorybyId($table, $condition)
	{
		$sql = "SELECT * FROM $table WHERE $condition";
		return $this->db->select($sql);
	}

	public function insertCategory($table_category_product, $data)
	{
		return $this->db->insert($table_category_product, $data);
	}

	public function updateCategory($table_category_product, $data, $condition)
	{
		return $this->db->update($table_category_product, $data, $condition);
	}

	public function deleteCategory($table_category_product, $condition)
	{
		return $this->db->delete($table_category_product, $condition);
	}

	//  CATEGORY POST
	public function list_category_post($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id_category_post DESC";
		return $this->db->select($sql);
	}
	public function insertCategory_post($table, $data)
	{
		return $this->db->insert($table, $data);
	}

	public function post_category($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id_category_post DESC";
		return $this->db->select($sql);
	}

	public function deleteCategory_post($table, $condition)
	{
		return $this->db->delete($table, $condition);
	}

	public function updateCategory_post($table_category_product, $data, $condition)
	{
		return $this->db->update($table_category_product, $data, $condition);
	}








	// trang nguoi dung

	public function list_category_home($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id_category_product DESC";
		return $this->db->select($sql);
	}
	public function categorybyId_home($table, $table_product, $id)
	{
		$sql = "SELECT * FROM $table, $table_product WHERE $table.id_category_product=$table_product.id_category_product AND $table_product.id_category_product='$id' ORDER BY $table_product.id_product DESC";
		return $this->db->select($sql);
	}



	public function list_category_post_home($table)
	{
		$sql = "SELECT * FROM $table ORDER BY id_category_post DESC";
		return $this->db->select($sql);
	}

	public function postbyId_home($table, $table_post, $id)
	{
		$sql = "SELECT * FROM $table, $table_post WHERE $table.id_category_post=$table_post.id_category_post AND $table_post.id_category_post='$id' ORDER BY $table_post.id_post DESC";
		return $this->db->select($sql);
	}
}
?>




		
