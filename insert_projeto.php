<?php

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$livro = new projeto();

// Dados da Notícia
$titulo = utf8_decode($_POST['titulo']);
$descricao = utf8_decode($_POST['descricao']);
$horario = utf8_decode($_POST['horario']);
$autor = utf8_decode($_POST['autor']);

$livro ->setTitulo($titulo);
$livro ->setDescricao($descricao);
$livro ->setHorario($horario);
$livro ->setAutor($autor);
$livro ->create();

header("Location: painel.php?mensagem=Projeto cadastrado com sucesso");

?>