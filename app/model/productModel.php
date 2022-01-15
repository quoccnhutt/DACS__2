
<?php

class productModel extends DModel
{
	public function __construct()
	{

		parent::__construct();
	}

	public function searchProduct($sql)
	{
		return $this->db->select($sql);
	}
	public function search($sql)
	{
		return $this->db->select($sql);
	}

	// PHÂN TRANG
	public function select_product_page($table_product, $table_category_product, $start, $limit)
	{
		$sql = "SELECT * FROM $table_product, $table_category_product WHERE $table_product.id_category_product = $table_category_product.id_category_product ORDER BY $table_product.id_product DESC LIMIT $start, $limit";
		return $this->db->select($sql);
	}

	public function insertProduct($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	public function list_product($table1, $table2)
	{
		$sql = "SELECT * FROM $table1, $table2 WHERE $table1.id_category_product=$table2.id_category_product ORDER BY $table1.id_product DESC";
		return $this->db->select($sql);
	}
	public function deleteProduct($table, $condition)
	{
		return $this->db->delete($table, $condition);
	}
	public function updateProduct($table_product, $data, $condition)
	{
		return $this->db->update($table_product, $data, $condition);
	}

	public function productbyId($table, $condition)
	{
		$sql = "SELECT * FROM $table WHERE $condition";
		return $this->db->select($sql);
	}

	public function list_product_home($table)
	{
		$sql = "SELECT * FROM $table ORDER BY $table.id_product DESC";
		return $this->db->select($sql);
	}
	public function list_product_byajax($table, $id, $from, $sotin1trang)
	{
		$sql = "SELECT * FROM $table WHERE id_category_product = $id
		ORDER BY $table.id_product DESC
		LIMIT $from, $sotin1trang";
		return $this->db->select($sql);
	}
	public function list_product_hot($table)
	{
		$sql = "SELECT * FROM $table ORDER BY $table.id_product DESC ";
		return $this->db->select($sql);
	}
	public function details_product_home($table, $table_product, $id)
	{
		$sql = "SELECT * FROM $table,$table_product WHERE $table.id_category_product=$table_product.id_category_product AND $table_product.id_product='$id'";
		return $this->db->select($sql);
	}
	public function related_product_home($table, $table_product, $cond)
	{
		$sql = "SELECT * FROM $table,$table_product WHERE $cond";
		return $this->db->select($sql);
	}

	// them review
	public function insertReview($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	// load review
	public function load_review($sql)
	{
		return $this->db->select($sql);
	}
	// them comment
	public function insertComment($table, $data)
	{
		return $this->db->insert($table, $data);
	}
	// load load_comment
	public function load_comment($sql)
	{
		return $this->db->select($sql);
	}
	// get reply comment
	// public function getReplyComment($sql)
	// {
	// 	return $this->db->select($sql);
	// }
	function get_reply_comment($parent_id = 0, 	$marginleft = 0)
	{
		$output = '';

		$sql = "SELECT * FROM tbl_comment WHERE id_comment_parent = '" . $parent_id . "'";
		$result = $this->db->select($sql);
		$count = count($result, 0);
		if ($parent_id == 0) {
			$marginleft = 0;
		} else {
			$marginleft = $marginleft + 48;
		}
		if ($count > 0) {
			foreach ($result as $key => $value) {
				$output .= '
                <div class="card panel-default" style="margin-left:' . $marginleft . 'px">
                <div class="card-header">By <b>' . $value["comment_sender_name"] . '</b> on <i>' . $value["date_comment"] . '</i></div>
                <div class="card-body">' . $value["comment"] . '</div>
                <div class="card-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $value["id_comment"] . '">Reply</button></div>
               </div>
                    ';
				$output .= $this->get_reply_comment($value["id_comment"], $marginleft);
			}
		}
		return $output;
	}
}
?>




		
