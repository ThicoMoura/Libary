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
$pedido = new pedido_livro();

$sql = "SELECT * FROM pedido

WHERE nomeped = 'Reservar livro'

and statuspedido = 'espera'

and acervoid = ".$id." 

and userid = ".$_SESSION['user_id'];

$stmt = DB::prepare($sql);
$stmt ->execute();

if ($stmt->rowCount() == 0)
{
    
    $userid = $_SESSION['user_id'];

    $acervoid = $id;

    $turmaid = $_SESSION['user_turma'];

    $nomeped = "Reservar livro";

    $statuspedido = "espera";

    $pedido -> setUserid($userid);

    $pedido -> setAcervoid($acervoid);

    $pedido -> setTurmaid($turmaid);

    $pedido -> setNomeped($nomeped);

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> create();



    header("Location: index.php?mensagem=Pedido realizado com sucesso"); 

} else {
    header('Location:index.php?mensagem=O pedido para reservar o livro já foi enviado');
}

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>