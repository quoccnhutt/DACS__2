
<?php

class addressModel extends DModel
{
    public function __construct()
    {

        parent::__construct();
    }

    public function list_quanhuyen($table, $key)
    {
        $sql = "SELECT * FROM $table WHERE _province_id = '$key'";
        return $this->db->select($sql);
    }
    public function list_tinh($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }

    public function ten_tinh($id)
    {
        $sql = "SELECT _name FROM province WHERE id = '$id'";
        return $this->db->select($sql);
    }
    public function ten_huyen($id)
    {
        $sql = "SELECT _name FROM district WHERE id = '$id'";
        return $this->db->select($sql);
    }
}
?>




		
