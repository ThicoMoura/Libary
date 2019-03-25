<?php 

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuarios = new usuario_usr();

$nome = $_POST['nome_usr'];
$login = $_POST['login_usr'];
$senha = md5($_POST['senha_usr']);
$senhaconfi = md5($_POST['senha_con_usr']);
$email = $_POST['email_usr'];
$telefone = $_POST['telefone_usr'];
$endereco = $_POST['endereco_usr'];
$limite = "5";
$quant = "0";
$nivel = "usuario";


$logarray = $usuarios->readLOG($login);
$mailarray = $usuarios->readEMAIL($email);

    if($logarray == $login){
 
        header("Location: index.php?mensagem=Login ja cadastrado");
 
      }else{
      	if($senha != $senhaconfi){
 
        header("Location: index.php?mensagem=Senhas diferentes");
 
      	}else{
          if($mailarray == $email){

            header("Location: index.php?mensagem=Email ja cadastrado");

          } else{

            $usuarios->setNome($nome);
            $usuarios->setLogin($login);
            $usuarios->setSenha($senha);
            $usuarios->setEmail($email);
            $usuarios->setTelefone($telefone);
            $usuarios->setEndereco($endereco);
            $usuarios->setLimite($limite);
            $usuarios->setQuant($quant);
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