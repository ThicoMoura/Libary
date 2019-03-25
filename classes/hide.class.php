<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class hide extends Crud{
	protected $table = 'locacao';
	private $hide;

	public function setHide ($hide){
		$this ->hide = $hide;	
	}
	
	public function create(){
		$sql  = "INSERT INTO $this->table (hide) VALUES (:hide)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':hide', $this->hide, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET hide = :hide WHERE locaid = :locaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':hide', $this->hide, PDO::PARAM_INT);
		$stmt->bindParam(':locaid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>