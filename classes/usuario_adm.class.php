<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class usuario_adm extends Crud{
	
	protected $table = 'usuarios';
	private $nome;
	private $login;
	private $senha;
	private $nivel;


	public function setNome($nome){
		$this->nome = $nome;
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

	public function create(){
		$sql  = "INSERT INTO $this->table (nome, login, senha, nivel) VALUES (:nome, :login, :senha, :nivel)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, login = :login, senha = :senha WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}
