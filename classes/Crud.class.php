<?php
// Incluo a classe de conexão ao db
require_once('DB.class.php');

abstract class Crud extends DB {

	protected $table;


	abstract public function create();

	public function read($id){
		$sql = "SELECT * FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readTur($id){
		$sql = "SELECT * FROM $this->table WHERE turmaid = :turmaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':turmaid', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readLid($id){
		$sql = "SELECT * FROM $this->table WHERE livroid = :livroid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readKey($numero){
		$sql = "SELECT * FROM $this->table WHERE numero = :numero";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':numero', $numero, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = DB::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function readLOG($login){
	$sql = "SELECT * FROM $this->table WHERE login = :login";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':login', $login, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL();
	}

	public function readEMAIL($email){
	$sql = "SELECT * FROM $this->table WHERE email = :email";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL();
	}

	public function readACER($id){
	$sql = "SELECT * FROM $this->table WHERE acervoid = :acervoid";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':acervoid', $id, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readSI($id){
	$sql = "SELECT * FROM $this->table WHERE userid = :userid";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':userid', $id, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readLoc($id){
	$sql = "SELECT * FROM $this->table WHERE locaid = :locaid";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':locaid', $id, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	public function readPRO($id){
	$sql = "SELECT * FROM $this->table WHERE projetoid = :projetoid";
	$stmt = DB::prepare($sql);
	$stmt->bindParam(':projetoid', $id, PDO::PARAM_STR);
	$stmt->execute();
	return $stmt->fetchALL(PDO::FETCH_ASSOC);
	}

	
	abstract public function update($id);

	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deletePr($id){
		$sql  = "DELETE FROM $this->table WHERE procadid = :procadid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':procadid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteP($id){
		$sql  = "DELETE FROM $this->table WHERE pedidoid = :pedidoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':pedidoid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteLoc($id){
		$sql  = "DELETE FROM $this->table WHERE locaid = :locaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':locaid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deletePro($id){
		$sql  = "DELETE FROM $this->table WHERE projetoid = :projetoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':projetoid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteLi($id){
		$sql  = "DELETE FROM $this->table WHERE livroid = :livroid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteUs($id){
		$sql  = "DELETE FROM $this->table WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteTur($id){
		$sql  = "DELETE FROM $this->table WHERE turmaid = :turmaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':turmaid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function deleteF($id){
		$sql  = "DELETE FROM $this->table WHERE favoritoid = :favoritoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':favoritoid', $id, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
}
