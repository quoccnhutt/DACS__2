
<?php

class postModel extends DModel
{
	public function __construct()
	{

		parent::__construct();
	}


	public function insertPost($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function list_post($table1, $table2)
	{
		$sql = "SELECT * FROM $table1, $table2 WHERE $table1.id_category_post=$table2.id_category_post ORDER BY $table1.id_post DESC";
		return $this->db->select($sql);
	}
	public function deletePost($table, $condition)
	{
		return $this->db->delete($table, $condition);
	}
	public function updatePost($table, $data, $condition)
	{
		return $this->db->update($table, $data, $condition);
	}

	public function postbyId($table, $condition)
	{
		$sql = "SELECT * FROM $table WHERE $condition";
		return $this->db->select($sql);
	}

	public function list_post_home($table)
	{
		$sql = "SELECT * FROM $table ORDER BY $table.id_post DESC";
		return $this->db->select($sql);
	}
	public function post_new($table)
	{
		$sql = "SELECT * FROM $table ORDER BY $table.id_post DESC LIMIT 3";
		return $this->db->select($sql);
	}

	public function details_post_home($table, $table_post, $id)
	{
		$sql = "SELECT * FROM $table,$table_post WHERE $table.id_category_post=$table_post.id_category_post AND $table_post.id_post='$id'";
		return $this->db->select($sql);
	}
	public function related_post_home($table, $table_post, $cond)
	{
		$sql = "SELECT * FROM $table,$table_post WHERE $cond";
		return $this->db->select($sql);
	}
	public function insertlienhe($table, $data)
	{
		return $this->db->insert($table, $data);
	}
}
?>




		
