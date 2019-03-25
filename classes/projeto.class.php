<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class projeto extends Crud{
	protected $table = 'projetos';
	private $titulo;
	private $descricao;
	private $horario;
	private $autor;

	public function setTitulo ($titulo){
		$this ->titulo = $titulo;	
	}

	public function setDescricao ($descricao){
		$this ->descricao = $descricao;	
	}

	public function setHorario ($horario){
		$this ->horario = $horario;	
	}

	public function setAutor ($autor){
		$this ->autor = $autor;	
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (titulo, descricao, horario, autor) VALUES (:titulo, :descricao, :horario, :autor)";
		$stmt = DB::prepare($sql);
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
		$stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
		$stmt->bindParam(':horario', $this->horario, PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	/** 
	* Método update (Atualiza os dados do usuário no banco de dados)
	* @param $id = integer (Código do usuário que será atualizado)
	*/
	public function update($id){
		$sql  = "UPDATE $this->table SET titulo = :titulo, descricao = :descricao, horario = :horario, autor = :autor WHERE projetoid = :projetoid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':titulo', $this->titulo, PDO::PARAM_STR);
		$stmt->bindParam(':descricao', $this->descricao, PDO::PARAM_STR);
		$stmt->bindParam(':horario', $this->horario, PDO::PARAM_STR);
		$stmt->bindParam(':autor', $this->autor, PDO::PARAM_STR);
		$stmt->bindParam(':projetoid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}

?>