<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class pedido_si extends Crud{
	protected $table = 'pedido';
	private $userid;
	private $nomeli;
	private $turmaid;
	private $nomeped;
	private $statuspedido;
	private $datalimite;

	public function setUserid ($userid){
		$this ->userid = $userid;	
	}

	public function setNomeli ($nomeli){
		$this ->nomeli = $nomeli;	
	}

	public function setTurmaid ($turmaid){
		$this ->turmaid = $turmaid;	
	}

	public function setNomeped ($nomeped){
		$this ->nomeped = $nomeped;	
	}

	public function setStatuspedido ($statuspedido){
		$this ->statuspedido = $statuspedido;	
	}

	public function setDatalimite ($datalimite){
		$this ->datalimite = $datalimite;	
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (userid, nomeli, turmaid, nomeped ,statuspedido, datalimite) VALUES (:userid, :nomeli, :turmaid, :nomeped ,:statuspedido, :datalimite)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':nomeli', $this->nomeli, PDO::PARAM_STR);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		$stmt->bindParam(':nomeped', $this->nomeped, PDO::PARAM_STR);
		$stmt->bindParam(':statuspedido', $this->statuspedido, PDO::PARAM_STR);
		$stmt->bindParam(':datalimite', $this->datalimite, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET statuspedido = :statuspedido WHERE pedidoid = :pedidoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':statuspedido', $this->statuspedido, PDO::PARAM_STR);
		$stmt->bindParam(':pedidoid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>