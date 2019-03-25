<?php 

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_adm();

$nome = $_POST['nome_adm'];
$login = $_POST['login_adm'];
$senha = md5($_POST['senha_adm']);
$senhaconfi = md5($_POST['senha_con_adm']);
$nivel = "administrador";


$logarray = $usuario->readLOG($login);

    if($logarray == $login){
 
        header("Location: painel.php?mensagem=Login ja cadastrado");
 
      }else{
      	if($senha != $senhaconfi){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

          $usuario -> setNome($nome);
          $usuario -> setLogin($login);
          $usuario -> setSenha($senha);
          $usuario -> setNivel($nivel);
          $usuario -> create();

          $sql = "SELECT userid FROM usuarios WHERE login = :log and senha = :sen";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':log', $login);
            $stmt->bindParam(':sen', $senha);
            $stmt -> execute();
            foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
              header("Location: insert_config.php?id=".$value['userid']."");
        }
      }
    }
?>