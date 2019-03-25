<?php
// Incluo a classe do Crud
require_once 'Crud.class.php';

class favorito extends Crud{
	
	protected $table = 'favorito';
	private $livroid;
	private $userid;

	public function setLivroid($livroid){
		$this->livroid = $livroid;
	}
	
	public function setUserid($userid){
		$this->userid = $userid;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (livroid, userid) VALUES (:livroid, :userid)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET livroid = :livroid, userid = :userid WHERE favoritoid = :favoritoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':favoritoid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}



}