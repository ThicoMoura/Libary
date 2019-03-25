<?php 

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$config = new config();

$userid = $_GET['id'];
$menu = "";
$fundo = "";
$texto = "";
$menu3 = "";

$config -> setUserid($userid);
$config -> setMenu($menu);
$config -> setFundo($fundo);
$config -> setTexto($texto);
$config -> setMenu3($menu3);
$config -> create();

header("Location: index.php?mensagem=Usuario criado com sucesso");
?>