<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class usuario_al extends Crud{
	
	protected $table = 'usuarios';
	private $nome;
	private $email;
	private $login;
	private $senha;
	private $nivel;
	private $matricula;
	private $quant;
	private $limite;
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

		public function setMatricula($matricula){
		$this->matricula = $matricula;
	}

		public function setQuant($quant){
		$this->quant = $quant;
	}

		public function setLimite($limite){
		$this->limite = $limite;
	}

		public function setTurmaid($turmaid){
		$this->turmaid = $turmaid;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (nome, email, login, senha, nivel, matricula, turmaid, limite) VALUES (:nome, :email, :login, :senha, :nivel, :matricula, :turmaid, :limite)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_STR);
		$stmt->bindParam(':matricula', $this->matricula, PDO::PARAM_STR);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, login = :login, senha = :senha, matricula = :matricula, turmaid = :turmaid, limite = :limite WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':matricula', $this->matricula, PDO::PARAM_INT);
		$stmt->bindParam(':turmaid', $this->turmaid, PDO::PARAM_INT);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_INT);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}
