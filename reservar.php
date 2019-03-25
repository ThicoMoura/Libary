<?php 

//inicio a sessão
session_start();

//verifico se o usuario esta logado
require 'check.php';

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

if (isLoggedIn()) {


//Id livro
$id = $_GET['id'];

//defino minhas classes de verificação e update
$livro = new veri();
$update = new update_quant();

//transformo meu objeto em array
foreach ($livro->readACER($id) as $key => $li) {

//condicional para ver ser esta disponivel	
if (in_array("disponivel", $li)) {

	$user = new usuario_adm();
	$id = $_SESSION['user_id'];

foreach ($user->readSI($id) as $key => $quan) {

if ($quan['quant'] <= $quan['limite']) {
    
    $quant = ++$quan['quant'];
    $limite = $quan['limite'];
    $update ->setLimite($limite);
    $update ->setQuant($quant);
    $update ->update($id);

	$status = "reservado";

	$livroid = $li['livroid'];

	$numero = $li['numero'];

	$acervoid = $li['acervoid'];

	$n = $li['n'];

	$id = $_GET['id'];

	$previsao = date('d-m-y', strtotime('+2 week'));

	$livro ->setLivroid($livroid);

	$livro ->setNumero($numero);

	$livro ->setN($n);

	$livro ->setStatus($status);

	$livro ->setPrevisao($previsao);

	$livro ->update($id);


    $locacao = new locacao();

    $userid = $_SESSION['user_id'];
    $statuslocacao = "locado";
    $datalocacao = date('d-m-y H:i:s');
    $tempoentrega = date('d-m-y H:i:s', strtotime('+2 week'));
    $hide = 0;

    $locacao -> setAcervoid($acervoid);
    $locacao -> setUserid($userid);
    $locacao -> setDatalocacao($datalocacao);
    $locacao -> setStatuslocacao($statuslocacao);
    $locacao -> setTempoentrega($tempoentrega);
    $locacao -> setHide($hide);
    $locacao -> create();



    header("Location: index.php?mensagem=Reserva realizada com sucesso");  

}else{
  header("Location: index.php?mensagem=Limite de reservas atingido");

}

}

} else {
	header("Location: index.php?mensagem=O livro já esta reservado");
}

}
    } else{
        header("Location: index.php?mensagem=Usuario não logado");
    } ?>
  