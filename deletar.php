<?php

session_start();

require_once "funcao.php";

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

// Dados da Notícia
$id = $_GET['id'];
$mod = $_GET['mod'];

$livro = new livro();
$livro_acervo = new livro_acervo();
$projeto = new projeto();
$usuario_adm = new usuario_adm();
$usuario_al = new usuario_al();
$usuario_bi = new usuario_bi();
$usuario_pr = new usuario_pr();
$usuario_usr = new usuario_usr();
$turma = new turma();
$config = new config();

?>


<?php if ($mod == "livro") {

  $livro_acervo->deleteLi($id);
  $livro->deleteLi($id);
  header("Location: painel.php?mensagem=Livro apagado com sucesso");

 } elseif ($mod == "projetos") {

  $projeto->deletePro($id);
  header("Location: painel.php?mensagem=Projeto apagado com sucesso");


} elseif ($mod == "administrador") {

  $config->deleteUs($id);
  $usuario_adm->deleteUs($id);
  header("Location: painel.php?mensagem=Usuario apagado com sucesso");

  
} elseif ($mod == "aluno") {

  $config->deleteUs($id);
  $usuario_al->deleteUs($id);
  header("Location: painel.php?mensagem=Usuario apagado com sucesso");

 
} elseif ($mod == "bibliotecario") {

  $config->deleteUs($id);
  $usuario_bi->deleteUs($id);
  header("Location: painel.php?mensagem=Usuario apagado com sucesso");
  
} elseif ($mod == "professor") {

  $config->deleteUs($id);
  $usuario_pr->deleteUs($id);
  header("Location: painel.php?mensagem=Usuario apagado com sucesso");

  
} elseif ($mod == "usuario") {

  $config->deleteUs($id);
  $usuario_usr->deleteUs($id);
  header("Location: painel.php?mensagem=Usuario apagado com sucesso");
  
} elseif ($mod == "turma") {

  $turma->deleteTur($id);
  header("Location: painel.php?mensagem=Turma apagado com sucesso");
  
}?>
