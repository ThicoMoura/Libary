<?php
// Incluo a classe do Crud
require_once 'Crud.class.php';

class sintese extends Crud{
	
	protected $table = 'sintese';
	private $userid;
	private $livroid;
	private $nomesi;
	private $sintese;
	private $nota;
	private $statussintese;

	public function setUserid($userid){
		$this->userid = $userid;
	}

	public function setLivroid($livroid){
	$this->livroid = $livroid;
	}

	public function setNomesi($nomesi){
	$this->nomesi = $nomesi;
	}

	public function setSintese($sintese){
	$this->sintese = $sintese;
	}

	public function setNota($nota){
	$this->nota = $nota;
	}

	public function setStatussintese($statussintese){
	$this->statussintese = $statussintese;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (userid, livroid, statussintese, nomesi, sintese) VALUES (:userid, :livroid, :statussintese, :nomesi, :sintese)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':statussintese', $this->statussintese, PDO::PARAM_STR);
		$stmt->bindParam(':nomesi', $this->nomesi, PDO::PARAM_STR);
		$stmt->bindParam(':sintese', $this->sintese, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET livroid = :livroid, sintese = :sintese, statussintese = :statussintese, nota = :nota WHERE sinteseid = :sinteseid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':sintese', $this->sintese, PDO::PARAM_STR);
		$stmt->bindParam(':statussintese', $this->statussintese, PDO::PARAM_STR);
		$stmt->bindParam(':nota', $this->nota, PDO::PARAM_STR);
		$stmt->bindParam(':sinteseid', $id, PDO::PARAM_INT);

		return $stmt->execute();
	}



}