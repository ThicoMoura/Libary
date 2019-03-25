<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_bi();

// Recebo os dados do Registro
$id = $_SESSION['user_id'];
$nome = $_POST['nome_bi'];
$login = $_SESSION['user_login']
$senha = md5($_POST['senha_bi']);
$senha_conf = md5($_POST['senha_con_bi']);
$email = $_POST['email_bi'];


      	if($senha != $senha_conf){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

            $usuario -> setNome($nome);
            $usuario -> setLogin($login);
            $usuario -> setSenha($senha);
            $usuario -> setEmail($email);
            $usuario -> update($id);


          header("Location: painel.php?mensagem=Atualização realizada com sucesso");
        }