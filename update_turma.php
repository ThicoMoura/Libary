<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$turma = new turma();
$id = $_GET['id'];

// Dados da Notícia
$nometur = utf8_decode($_POST['nometur']);


		$turma ->setNometur($nometur);
		$turma ->update($id);

		header("Location: painel.php?mensagem=Livro cadastrado com sucesso");

?>