<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'funcao.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {

$id = $_GET['id'];

$pedido = new pedido_pro();

    $pedido -> deleteP($id);

    header("Location: painel.php?mensagem=Pedido apagado com sucesso"); 

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>