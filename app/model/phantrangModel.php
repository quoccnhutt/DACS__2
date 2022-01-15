
<?php

class phantrangModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function ptr_post($tbl_product, $tbl_category_product, $id1, $id2, $item_per_page, $offset)
    {
        $sql = "SELECT * FROM $tbl_product, $tbl_category_product WHERE $tbl_product.$id1=$tbl_category_product.$id1 ORDER BY $tbl_product.$id2 DESC LIMIT $item_per_page OFFSET $offset";
        return $this->db->select($sql);
    }
    public function list($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_product ASC";
        return $this->db->select($sql);
    }
    public function select($table, $start, $limit)
    {
        $sql = "SELECT * FROM $table LIMIT $start, $limit";
        return $this->db->select($sql);
    }
}
?>




    
