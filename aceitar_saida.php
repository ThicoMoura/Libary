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

        $sql = "SELECT procadid FROM projeto_cadas WHERE projetoid = ".$projetoid." and userid = ".$userid;

        $stmt = DB::prepare($sql);

        $stmt ->execute();

        foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {

            $id = $value['procadid'];

            $pro_cadas = new projeto_cadas();

            $pro_cadas -> deletePr($id);

            header("Location: painel.php?mensagem=Pedido apagado com sucesso"); 
        }

    }

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>