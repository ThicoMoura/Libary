<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class livro_acervo extends Crud{
	
	protected $table = 'livro_acervo';
	private $livroid;
	private $numero;
	private $n;
	private $status;

	public function setLivroid($livroid){
		$this->livroid = $livroid;
	}

	public function getLivroid($livroid){
		$livroid = $this->livroid;
	}
	
	public function setNumero($numero){
		$this->numero = $numero;
	}

		public function setN($n){
		$this->n = $n;
	}

		public function setStatus($status){
		$this->status = $status;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (livroid, numero, n, status) VALUES (:livroid, :numero, :n, :status)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
		$stmt->bindParam(':n', $this->n, PDO::PARAM_INT);
		$stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET livroid = :livroid, numero = :numero, n = :n, status = :status WHERE acervoid = :acervoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':livroid', $this->livroid, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
		$stmt->bindParam(':n', $this->n, PDO::PARAM_INT);
		$stmt->bindParam(':status', $this->status, PDO::PARAM_STR);
		$stmt->bindParam(':acervoid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}



}
