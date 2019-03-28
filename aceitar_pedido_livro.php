<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'funcao.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {

$pedido = new pedido_livro();

//Id livro
$id = $_GET['id'];

    $statuspedido = "aceito";

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> update($id);

    $sql = "SELECT userid, acervoid FROM pedido WHERE pedidoid = ".$id;

	$stmt = DB::prepare($sql);

	$stmt ->execute();

	foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {

	$userid = $value['userid'];

	$acervoid = $value['acervoid'];

    header("Location: painel.php?id=".$id."&userid=".$userid.""); 

    }

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>