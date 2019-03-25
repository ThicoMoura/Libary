<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'funcao.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {

$pedido = new pedido_pro();

//Id livro
$id = $_GET['id'];

    $statuspedido = "negado";

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> update($id);

    header("Location: painel.php?mensagem=Pedido negado com sucesso"); 

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>