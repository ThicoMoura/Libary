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
$nomeli = $_POST['nomeli'];

$datalimite = $_POST['datalimite'];

$pedido = new pedido_si();

//defino minhas classes de verificação e update


$sql = "SELECT * FROM pedido

WHERE nomeped = 'Sintese do livro'

and statuspedido = 'espera'

and nomeli = '".$nomeli."' 

and userid = ".$_SESSION['user_id'];

$stmt = DB::prepare($sql);
$stmt ->execute();

if ($stmt->rowCount() == 0)
{   
    
    $userid = $_SESSION['user_id'];

    $turmaid = $_SESSION['user_turma'];

    $nomeped = "Sintese do livro";

    $statuspedido = "espera";

    $pedido -> setUserid($userid);

    $pedido -> setNomeli($nomeli);

    $pedido -> setTurmaid($turmaid);

    $pedido -> setNomeped($nomeped);

    $pedido -> setStatuspedido($statuspedido);

    $pedido -> setDatalimite($datalimite);

    $pedido -> create();



    header("Location: painel.php?mensagem=Pedido realizado com sucesso"); 

} else {
    header('Location:painel.php?mensagem=O pedido de Sintese já foi enviado');
}

} else{
        header("Location: index.php?mensagem=Usuario não logado");
} ?>