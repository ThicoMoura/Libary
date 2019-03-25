<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_al();

// Recebo os dados do Registro
$id = $_GET['user_id'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$senha_conf = md5($_POST['senha_con']);
$email = $_POST['email'];
$turmaid = $_POST['turmaid'];
$matricula = $_POST['matricula'];
$limite = $_POST['limite'];


      	if($senha != $senha_conf){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

            $usuario -> setNome($nome);
            $usuario -> setLogin($login);
            $usuario -> setSenha($senha);
            $usuario -> setEmail($email);
            $usuario -> setTurmaid($turmaid);
            $usuario -> setMatricula($matricula);
            $usuario -> setLimite($limite);
            $usuario -> update($id);


          header("Location: painel.php?mensagem=Atualização realizada com sucesso");
        }
