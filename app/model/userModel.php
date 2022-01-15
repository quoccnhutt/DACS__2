
<?php

class userModel extends DModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list_user($table_user)
    {
        $sql = "SELECT * FROM $table_user  ORDER BY id_user DESC";
        return $this->db->select($sql);
    }
    public function list_admin($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->db->select($sql);
    }
    public function userbyId($table, $condition)
    {
        $sql = "SELECT * FROM $table WHERE $condition";
        return $this->db->select($sql);
    }
    public function insert_user($table_user, $data)
    {
        return $this->db->insert($table_user, $data);
    }
    public function login($table_user, $username, $password)
    {
        $sql = "SELECT * FROM $table_user WHERE email_user=? AND password_user =? ";
        return $this->db->affectedRows($sql, $username, $password);
    }
    public function getLogin($table_user, $username, $password)
    {
        $sql = "SELECT * FROM $table_user WHERE email_user=? AND password_user= ? ";
        return $this->db->selectUser($sql, $username, $password);
    }
}
?>




    
