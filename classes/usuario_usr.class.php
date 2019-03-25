<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class usuario_usr extends Crud{
	
	protected $table = 'usuarios';
	private $nome;
	private $email;
	private $login;
	private $senha;
	private $nivel;
	private $endereco;
	private $telefone;
	private $quant;
	private $limite;

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

		public function setEndereco($endereco){
		$this->endereco = $endereco;
	}

		public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

		public function setQuant($quant){
		$this->quant = $quant;
	}

		public function setLimite($limite){
		$this->limite = $limite;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (nome, email, login, senha, nivel, endereco, telefone, limite, quant) VALUES (:nome, :email, :login, :senha, :nivel, :endereco, :telefone, :limite, :quant)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':login', $this->login, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_STR);
		$stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
		$stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_INT);
		$stmt->bindParam(':quant', $this->quant, PDO::PARAM_INT);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, endereco = :endereco, telefone = :telefone, limite = :limite WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_STR);
		$stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
		$stmt->bindParam(':senha', $this->senha, PDO::PARAM_STR);
		$stmt->bindParam(':nivel', $this->nivel, PDO::PARAM_STR);
		$stmt->bindParam(':endereco', $this->endereco, PDO::PARAM_STR);
		$stmt->bindParam(':telefone', $this->telefone, PDO::PARAM_STR);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_STR);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}
