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

    $statuspedido = "aceito";

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> update($id);

    $pro_cadas = new projeto_cadas();

    $sql = "SELECT userid, projetoid FROM pedido WHERE pedidoid = ".$id;

	$stmt = DB::prepare($sql);

	$stmt ->execute();

	foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {

	$userid = $value['userid'];

	$projetoid = $value['projetoid'];

	$pro_cadas -> setUserid($userid);

	$pro_cadas -> setProjetoid($projetoid);

	$pro_cadas -> create();

	}

    header("Location: painel.php?mensagem=Pedido aceito com sucesso"); 

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>