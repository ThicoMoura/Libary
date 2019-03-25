<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$turma = new turma();


$nometur = utf8_decode($_POST['nometur']);


		$turma ->setNometur($nometur);
		$turma ->create();

		header("Location: painel.php?mensagem=Turma cadastrada com sucesso");
?>