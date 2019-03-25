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
$endereco = $_POST['endereco_usr'];
$telefone = $_POST['telefone_usr'];


      	if($senha != $senha_conf){
 
        header("Location: painel.php?mensagem=Senhas diferentes");
 
      	}else{

            $usuario -> setNome($nome);
            $usuario -> setLogin($login);
            $usuario -> setSenha($senha);
            $usuario -> setEmail($email);
            $usuario -> setTurma($turma);
            $usuario -> setEndereco($endereco);
            $usuario -> setTelefone($telefone);
            $usuario -> update($id);


          header("Location: painel.php?mensagem=Atualização realizada com sucesso");
        }