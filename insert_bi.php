<?php 

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuarios = new usuario_bi();

$nome = $_POST['nome_bi'];
$login = $_POST['login_bi'];
$senha = md5($_POST['senha_bi']);
$senhaconfi = md5($_POST['senha_con_bi']);
$email = $_POST['email_bi'];
$nivel = "bibliotecario";


$logarray = $usuarios->readLOG($login);
$mailarray = $usuarios->readEMAIL($email);

    if($logarray == $login){
 
        header("Location: painel.php?mensagem=Login ja cadastrado");
 
      }else{
        if($senha != $senhaconfi){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
        }else{
          if($mailarray == $email){

            header("Location: painel.php?mensagem=Email ja cadastrado");

          } else{

            $usuarios->setNome($nome);
            $usuarios->setLogin($login);
            $usuarios->setSenha($senha);
            $usuarios->setEmail($email);
            $usuarios->setNivel($nivel);
            $usuarios->create();

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
    }
?>