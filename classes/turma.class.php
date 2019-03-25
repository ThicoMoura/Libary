<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class turma extends Crud{
	protected $table = 'turma';
	private $nometur;

	public function setNometur ($nometur){
		$this ->nometur = $nometur;	
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (nometur) VALUES (:nometur)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nometur', $this->nometur, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	/** 
	* Método update (Atualiza os dados do usuário no banco de dados)
	* @param $id = integer (Código do usuário que será atualizado)
	*/
	public function update($id){
		$sql  = "UPDATE $this->table SET nometur = :nometur WHERE turmaid = :turmaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nometur', $this->nometur, PDO::PARAM_STR);
		$stmt->bindParam(':turmaid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>