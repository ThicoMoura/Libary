<?php 

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

require 'funcao.php';

$projeto_cadas = new projeto_cadas();

$userid = $_SESSION['user_id'];
$projetoid = $_GET['projetoid'];
$statuspro = "realizando";

$projeto_cadas -> setUserid($userid);
$projeto_cadas -> setProjetoid($projetoid);
$projeto_cadas -> setStatuspro($statuspro);
$projeto_cadas -> create();

header("Location: painel.php?mensagem=Configurações salvas com sucesso");
?>