<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class veri extends Crud{
	protected $table = 'livro_acervo';
	private $livroid;
	private $numero;
	private $n;
	private $status;
	private $previsao;

	public function setLivroid ($livroid){
		$this ->livroid = $livroid;	
	}

	public function setNumero ($numero){
		$this ->numero = $numero;	
	}

	public function setN ($n){
		$this ->n = $n;	
	}

	public function setStatus ($status){
		$this ->status = $status;	
	}

	public function setPrevisao ($previsao){
		$this ->previsao = $previsao;	
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (livroid, numero, n, status) VALUES (:livroid, :numero, :n, :status)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_INT);
		$stmt->bindParam(':n', $this->n, PDO::PARAM_INT);
		$stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET livroid = :livroid, numero = :numero, n = :n, status = :status, previsao = :previsao WHERE acervoid = :acervoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_INT);
		$stmt->bindParam(':n', $this->n, PDO::PARAM_INT);
		$stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
		$stmt->bindParam(':previsao', $this->previsao, PDO::PARAM_STR);
		$stmt->bindParam(':acervoid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>