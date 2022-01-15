<?php 

	class DModel{
		protected $db = array();

		public function __construct(){
			$connect = 'mysql:dbname=websiteMVC_PDO;host=localhost;charset=utf8';
			$user = 'root';
			$pass = '';
			$this->db = new database($connect, $user, $pass);
		}
	}


 ?>
 