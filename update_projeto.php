<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$livro = new projeto();

// Recebo os dados do Registro
$id = $_GET['id'];
$titulo = utf8_decode($_POST['titulo']);
$autor = utf8_decode($_POST['autor']);
$descricao = utf8_decode($_POST['descricao']);
$horario = utf8_decode($_POST['horario']);

		$livro -> setTitulo($titulo);
		$livro -> setAutor($autor);
		$livro -> setDescricao($descricao);
		$livro -> setHorario($horario);
		$livro -> update($id);

		header("Location: painel.php?mensagem=Atualização realizada com sucesso");