<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class usuario_pr extends Crud{
	
	protected $table = 'usuarios';
	private $nome;
	private $email;
	private $login;
	private $senha;
	private $nivel;
	private $turmaid;

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setEmail($email){
		$this->email = $email;
	}

		public function setLogin($login){
		$this->login = $login;
	}

		public function setSenha($senha){
		$this->senha = $senha;
	}

		public function setNivel($nivel){
		$this->nivel = $nivel;
	}
		public function setTurmaid($turmaid){
		$this->turmaid = $turmaid;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (nome, email, login, senha, nivel, turmaid) VALUES (:nome, :email, :login, :senha, :nivel, :turmaid)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_STR);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, login = :login, senha = :senha, turmaid = :turmaid WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}
