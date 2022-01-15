<?php

class introModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }


    public function intro_page($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
}
