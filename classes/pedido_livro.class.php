<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class pedido_livro extends Crud{
	protected $table = 'pedido';
	private $userid;
	private $acervoid;
	private $turmaid;
	private $nomeped;
	private $statuspedido;

	public function setUserid ($userid){
		$this ->userid = $userid;	
	}

	public function setAcervoid ($acervoid){
		$this ->acervoid = $acervoid;	
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

	public function create(){
		$sql  = "INSERT INTO $this->table (userid, acervoid, turmaid, nomeped ,statuspedido) VALUES (:userid, :acervoid, :turmaid, :nomeped ,:statuspedido)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':acervoid', $this->acervoid, PDO::PARAM_INT);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		$stmt->bindParam(':nomeped', $this->nomeped, PDO::PARAM_STR);
		$stmt->bindParam(':statuspedido', $this->statuspedido, PDO::PARAM_STR);
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