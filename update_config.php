<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$config = new config();

// Recebo os dados do Registro
$id = $_SESSION['user_id'];
$menu = $_POST['menu'];
$texto = $_POST['texto'];
$_SESSION['user_menu'] = $_POST['menu'];
$_SESSION['user_texto'] = $_POST['texto'];

    $config -> setMenu($menu);
    $config -> setTexto($texto);
    $config -> update($id);

    header("Location: painel.php?mensagem=Atualização realizada com sucesso");
  