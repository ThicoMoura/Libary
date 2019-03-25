<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';


class livro extends Crud{
	
	protected $table = 'livro';
	private $titulo;
	private $autor;
	private $editora;
	private $genero;
	private $foto;
	private $sinopse;
	private $fileira;
	private $numero;

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	
	public function setAutor($autor){
		$this->autor = $autor;
	}

		public function setEditora($editora){
		$this->editora = $editora;
	}

		public function setGenero($genero){
		$this->genero = $genero;
	}

		public function setFoto($foto){
		$this->foto = $foto;
	}

		public function setSinopse($sinopse){
		$this->sinopse = $sinopse;
	}

		public function setFileira($fileira){
		$this->fileira = $fileira;
	}

		public function setNumero($numero){
		$this->numero = $numero;
	}


	public function create(){
		$sql  = "INSERT INTO $this->table (titulo, autor, editora, genero, foto, sinopse, fileira, numero) VALUES (:titulo, :autor, :editora, :genero, :foto, :sinopse, :fileira, :numero)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor, PDO::PARAM_STR);
		$stmt->bindParam(':editora', $this->editora, PDO::PARAM_STR);
		$stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);
		$stmt->bindParam(':foto', $this->foto, PDO::PARAM_STR);
		$stmt->bindParam(':sinopse', $this->sinopse, PDO::PARAM_STR);
		$stmt->bindParam(':fileira', $this->fileira, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET titulo = :titulo, autor = :autor, editora = :editora, genero = :genero, sinopse = :sinopse, fileira = :fileira, numero = :numero WHERE livroid = :livroid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor, PDO::PARAM_STR);
		$stmt->bindParam(':editora', $this->editora, PDO::PARAM_STR);
		$stmt->bindParam(':genero', $this->genero, PDO::PARAM_STR);
		$stmt->bindParam(':sinopse', $this->sinopse, PDO::PARAM_STR);
		$stmt->bindParam(':fileira', $this->fileira, PDO::PARAM_INT);
		$stmt->bindParam(':numero', $this->numero, PDO::PARAM_STR);
		$stmt->bindParam(':livroid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}



}
