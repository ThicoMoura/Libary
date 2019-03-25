<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_bi();

// Recebo os dados do Registro
$id = $_GET['id'];
$nome = $_POST['nome'];
$login = $_POST['login']
$senha = md5($_POST['senha']);
$senha_conf = md5($_POST['senha_con']);
$email = $_POST['email'];


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