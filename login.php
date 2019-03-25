<?php
 
function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

 
// resgata variáveis do formulário
$login = $_POST['login'];
$senha = md5($_POST['senhalogin']);
 
$sql = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
$stmt = DB::prepare($sql);
$stmt->bindParam(':login', $login, PDO::PARAM_STR);
$stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
$stmt->execute();
$us = $stmt->fetchALL(PDO::FETCH_ASSOC); 

if ($stmt->rowCount() == 0)
{
    header('Location:index.php?mensagem=Usuário não encontrado');
}

foreach ($us as $key => $users) {

// pega o primeiro usuário

$user = $users;

$sql = "SELECT * FROM config WHERE userid = :userid";
$stmt = DB::prepare($sql);
$stmt->bindParam(':userid', $user['userid'], PDO::PARAM_INT);
$stmt->execute();
$teste = $stmt->fetchALL(PDO::FETCH_ASSOC);

foreach ($teste as $key => $teste1) {

session_start();
$_SESSION['logged_in'] = true;
$_SESSION['user_id'] = $user['userid'];
$_SESSION['user_nome'] = $user['nome'];
$_SESSION['user_senha'] = $user['senha'];
$_SESSION['user_login'] = $user['login'];
$_SESSION['user_nivel'] = $user['nivel'];
$_SESSION['user_endereco'] = $user['endereco'];
$_SESSION['user_telefone'] = $user['telefone'];
$_SESSION['user_menu'] = $teste1['menu'];
$_SESSION['user_fundo'] = $teste1['fundo'];
$_SESSION['user_texto'] = $teste1['texto'];
$_SESSION['user_turma'] = $user['turmaid'];
$_SESSION['user_matricula'] = $user['matricula'];
$_SESSION['user_email'] = $user['email'];

header('Location: index.php?mensagem=Usuário logado com sucesso');

}}

?>