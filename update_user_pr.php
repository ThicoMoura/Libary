<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_pr();

// Recebo os dados do Registro
$id = $_SESSION['user_id'];
$nome = $_POST['nome_pr'];
$login = $_SESSION['user_login'];
$senha = md5($_POST['senha_pr']);
$senha_conf = md5($_POST['senha_con_pr']);
$email = $_POST['email_pr'];
$turmaid = $_SESSION['user_turma'];

      	if($senha != $senha_conf){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

            $usuario -> setNome($nome);
            $usuario -> setLogin($login);
            $usuario -> setSenha($senha);
            $usuario -> setEmail($email);
            $usuario -> setTurmaid($turmaid);
            $usuario -> update($id);


          header("Location: painel.php?mensagem=Atualização realizada com sucesso");
        }
