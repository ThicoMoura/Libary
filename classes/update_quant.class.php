<?php

// Incluo a classe do Crud
require_once 'Crud.class.php';

class update_quant extends Crud{
	
	protected $table = 'usuarios';
	private $quant;
	private $limite;

		public function setQuant($quant){
		$this->quant = $quant;
	}

		public function setLimite($limite){
		$this->limite = $limite;
	}

	public function create(){
		$sql  = "INSERT INTO $this->table (limite, quant) VALUES (:limite, :quant)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_STR);
		$stmt->bindParam(':quant', $this->quant, PDO::PARAM_STR);
		return $stmt->execute(); 
	}

	public function update($id){
		$sql  = "UPDATE $this->table SET limite = :limite, quant = :quant WHERE userid = :userid";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':limite', $this->limite, PDO::PARAM_STR);
		$stmt->bindParam(':quant', $this->quant, PDO::PARAM_STR);
		$stmt->bindParam(':userid', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}