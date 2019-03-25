<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'funcao.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {


//Id livro
$id = $_GET['id'];

//defino minhas classes de verificação e update
$pedido = new pedido_pro();

$sql = "SELECT * FROM pedido

WHERE nomeped = 'Entrar no projeto'

and statuspedido = 'espera'

and projetoid = ".$id." 

and userid = ".$_SESSION['user_id'];

$stmt = DB::prepare($sql);
$stmt ->execute();

if ($stmt->rowCount() == 0)
{
    
    $userid = $_SESSION['user_id'];

    $projetoid = $id;

    $turmaid = $_SESSION['user_turma'];

    $nomeped = "Entrar no projeto";

    $statuspedido = "espera";

    $pedido -> setUserid($userid);

    $pedido -> setProjetoid($projetoid);

    $pedido -> setTurmaid($turmaid);

    $pedido -> setNomeped($nomeped);

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> create();



    header("Location: index.php?mensagem=Pedido realizado com sucesso"); 

} else {
    header('Location:index.php?mensagem=O pedido para entrar no projeto já foi enviado');
}

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>