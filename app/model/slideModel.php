<?php

class slideModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }


    // SLIDESHOW
    public function select_slide($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_slide DESC";
        return $this->db->select($sql);
    }
    public function insertSlide($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function slidebyId($table, $condition)
    {
        $sql = "SELECT * FROM $table WHERE $condition";
        return $this->db->select($sql);
    }
    public function deleteSlide($table, $condition)
    {
        return $this->db->delete($table, $condition);
    }
    public function updateSlide($table, $data, $condition)
    {
        return $this->db->update($table, $data, $condition);
    }



    // BANNER
    public function select_banner($table)
    {
        $sql = "SELECT * FROM $table ORDER BY id_banner ASC";
        return $this->db->select($sql);
    }
    public function insertBanner($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function bannerbyId($table, $condition)
    {
        $sql = "SELECT * FROM $table WHERE $condition";
        return $this->db->select($sql);
    }
    public function deleteBanner($table, $condition)
    {
        return $this->db->delete($table, $condition);
    }
    public function updateBanner($table, $data, $condition)
    {
        return $this->db->update($table, $data, $condition);
    }
}
