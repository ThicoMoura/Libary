<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$usuario = new usuario_al();

// Recebo os dados do Registro
$id = $_SESSION['user_id'];
$nome = $_POST['nome_al'];
$login = $_SESSION['user_login'];
$senha = md5($_POST['senha_al']);
$senha_conf = md5($_POST['senha_con_al']);
$email = $_POST['email_al'];
$turmaid = $_SESSION['user_turma'];
$matricula = $_SESSION['user_matricula'];
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
