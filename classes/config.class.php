<?php
// Incluo a classe do Crud
require_once 'Crud.class.php';

class config extends Crud{
	
	protected $table = 'config';
	private $userid;
	private $menu;
	private $fundo;
	private $texto;
	private $menu3;

	public function setUserid($userid){
		$this->userid = $userid;
	}

	public function setMenu($menu){
	$this->menu = $menu;
	}

	public function setFundo($fundo){
	$this->fundo = $fundo;
	}

	public function setTexto($texto){
	$this->texto = $texto;
	}

	public function setMenu3($menu3){
	$this->menu3 = $menu3;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (userid, menu, fundo, texto, menu3) VALUES (:userid, :menu, :fundo, :texto, :menu3)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':userid', $this->userid, PDO::PARAM_INT);
		$stmt->bindParam(':menu', $this->menu, PDO::PARAM_STR);
		$stmt->bindParam(':fundo', $this->fundo, PDO::PARAM_STR);
		$stmt->bindParam(':texto', $this->texto, PDO::PARAM_STR);
		$stmt->bindParam(':menu3', $this->menu3, PDO::PARAM_STR);
		return $stmt->execute(); 
	}
	
	public function update($id){
		$sql  = "UPDATE $this->table SET menu = :menu, texto = :texto WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':menu', $this->menu, PDO::PARAM_STR);
		$stmt->bindParam(':texto', $this->texto, PDO::PARAM_STR);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);

		return $stmt->execute();
	}



}