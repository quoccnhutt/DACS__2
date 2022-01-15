<?php 

	class database extends PDO{
		
		public function __construct($connect, $user, $pass){

			parent::__construct($connect, $user, $pass);
			// $db = new PDO($connect, $user, $pass);
		}

		public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC){
			$statement = $this->prepare($sql);

			foreach($data as $key => $value){
				$statement->bindParam($key, $value);
			}
	
			$statement->execute();
			return $statement->fetchAll($fetchStyle);
		}

		



		public function insert($table, $data){

			$keys = implode(", ", array_keys($data));
			$values = ":" .implode(", :", array_keys($data));

			$sql = "INSERT INTO $table ($keys) VALUES ($values)";
			$statement = $this->prepare($sql);

			foreach($data as $key => $value){
				$statement->bindValue(":$key", $value);
			}
			
			return $statement->execute();
		}

		public function update($table, $data, $condition){
			$updateKeys = '';

			foreach($data as $key => $value){
				$updateKeys .= "$key=:$key,";
			}
			$updateKeys = rtrim($updateKeys, ","); //xoá dấu "," ở cuối dòng

			$sql = "UPDATE $table SET $updateKeys WHERE $condition";
			$statement = $this->prepare($sql);

			foreach($data as $key => $value){
				$statement->bindValue(":$key", $value);
			}
			return $statement->execute();
	}

		public function delete($table, $condition, $limit = 1){
			$sql = "DELETE FROM $table WHERE $condition LIMIT $limit";
			return $this->exec($sql);

		}

		public function affectedRows($sql,$username,$password){
		$statement = $this->prepare($sql);
		$statement->execute(array($username,$password));
		return $statement->rowCount();
		}

		public function selectUser($sql,$username,$password){
			$statement = $this->prepare($sql);
			$statement->execute(array($username,$password));
		return $statement->fetchAll(PDO::FETCH_ASSOC);
		}
	}

 ?>
 