<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_adm();

// Recebo os dados do Registro
$id = $_SESSION['user_id'];
$nome = $_POST['nome_adm'];
$login = $_SESSION['user_login'];
$senha = md5($_POST['senha_adm']);
$senha_conf = md5($_POST['senha_con_adm']);


    if ($senhateste = $senha) {
      header('Location: painel.php?mensagem=A senha deve ser diferente');

    }else{

      	if($senha != $senha_conf){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

          $usuario -> setNome($nome);
          $usuario -> setLogin($login);
          $usuario -> setSenha($senha);
          $usuario -> update($id);

          header("Location: painel.php?mensagem=Atualização realizada com sucesso");
        }
    }