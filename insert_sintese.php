<?php 

session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$sinteset = new sintese();

$nomesi = $_POST['nomesi'];
$sintese = $_POST['sintese'];
$livroid = $_GET['id'];
$userid = $_SESSION['user_id'];
$statussintese = "pronto";

$sinteset ->setNomesi($nomesi);
$sinteset ->setSintese($sintese);
$sinteset ->setLivroid($livroid);
$sinteset ->setUserid($userid);
$sinteset ->setStatussintese($statussintese);
$sinteset ->create();

header("Location: painel.php?mensagem=Sintese criada com sucesso");