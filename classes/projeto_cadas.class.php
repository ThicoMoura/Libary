<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class projeto_cadas extends Crud{
	protected $table = 'projeto_cadas';
	private $userid;
	private $projetoid;

	public function setUserid ($userid){
		$this ->userid = $userid;	
	}

	public function setProjetoid ($projetoid){
		$this ->projetoid = $projetoid;	
	}


	public function create(){
		$sql  = "INSERT INTO $this->table (userid, projetoid) VALUES (:userid, :projetoid)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':projetoid', $this->projetoid, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET  WHERE procadid = :procadid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':procadid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>