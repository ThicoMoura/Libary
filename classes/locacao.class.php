<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class locacao extends Crud{
	protected $table = 'locacao';
	private $acervoid;
	private $userid;
	private $datalocacao;
	private $dataentrega;
	private $statuslocacao;
	private $tempoentrega;
	private $hide;

	public function setAcervoid ($acervoid){
		$this ->acervoid = $acervoid;	
	}

	public function setUserid ($userid){
		$this ->userid = $userid;	
	}

	public function setDatalocacao ($datalocacao){
		$this ->datalocacao = $datalocacao;	
	}

	public function setDataentrega ($dataentrega){
		$this ->dataentrega = $dataentrega;	
	}

	public function setStatuslocacao ($statuslocacao){
		$this ->statuslocacao = $statuslocacao;	
	}

	public function setTempoentrega ($tempoentrega){
		$this ->tempoentrega = $tempoentrega;	
	}

	public function setHide ($hide){
		$this ->hide = $hide;	
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (acervoid, userid, datalocacao, statuslocacao, tempoentrega, hide) VALUES (:acervoid, :userid, :datalocacao, :statuslocacao, :tempoentrega, :hide)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':acervoid', $this->acervoid, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':datalocacao', $this->datalocacao, PDO::PARAM_STR);
		$stmt->bindParam(':statuslocacao', $this->statuslocacao, PDO::PARAM_STR);
		$stmt->bindParam(':tempoentrega', $this->tempoentrega, PDO::PARAM_STR);
		$stmt->bindParam(':hide', $this->hide, PDO::PARAM_INT);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET dataentrega = :dataentrega, statuslocacao = :statuslocacao WHERE locaid = :locaid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':dataentrega', $this->dataentrega, PDO::PARAM_STR);
		$stmt->bindParam(':statuslocacao', $this->statuslocacao, PDO::PARAM_STR);
		$stmt->bindParam(':locaid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>