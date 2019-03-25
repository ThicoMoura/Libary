<?php 

//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

require_once 'funcao.php';

if (isLoggedIn()){

	$favorito = new favorito();

	$livroid = $_GET['id'];
	$userid = $_SESSION['user_id'];

	$sql = "SELECT favoritoid FROM favorito WHERE livroid = ".$livroid." and userid = " .$userid;
	$stmt = DB::prepare($sql);
	$stmt ->execute();


	if ($stmt->rowCount() == 0) {
		$favorito -> setUserid($userid);
 		$favorito -> setLivroid($livroid);
  		$favorito -> create();

  		header("Location: index.php?mensagem=Adicionado com sucesso ao favorito");

	}else{

  		foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value) {

		$favorito -> deleteF($value['favoritoid']);
		header("Location: index.php?mensagem=Removido com sucesso ao favorito");
	}
	}

} else{

	header("Location: index.php?mensagem=Usuario não logado");

}?>
