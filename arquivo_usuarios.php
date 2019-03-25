<?php

//inicio a sessão
session_start();

//carrega todas as classes
function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

//carrega a função isLoggedIn()
require_once 'funcao.php';

if(!isLoggedIn() && $_SESSION['user_nivel'] == "administrador" || $_SESSION['user_nivel'] == "bibliotecario") {
  header('Location: index.php?mensagem=Acesso negado necessario login');
} 

?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--transformação para celular-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arquivo Usuarios</title>
    <!--links css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>

<?php require_once 'menu_painel.php'?>
</nav>

    
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row">

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">Arquivo Usuários</h5>
      <a class="btn-floating right btn-small blue waves-effect waves-blue tooltipped" data-position="bottom" data-tooltip="add novo" href="cadastro_usuarios.php"><i class="material-icons">add</i></a>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Nome</td>
            <td>Login</td>
            <td>Email</td>
            <td>Nivel</td>
            <td>Endereço</td>
            <td>Telefone</td>
            <td>Matricula</td>
            <td>Quantidade de Reservas</td>
            <td>Limite de Reservas</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT u.nome, u.login, u.email, u.nivel, u.endereco, u.telefone, u.matricula, u.quant, u.limite,  u.userid FROM usuarios u";

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
            echo" 
           <tr>      
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['login'])."</td>
            <td>".utf8_encode($value['email'])."</td>
            <td>".utf8_encode($value['nivel'])."</td>
            <td>".utf8_encode($value['endereco'])."</td>
            <td>".utf8_encode($value['telefone'])."</td>
            <td>".utf8_encode($value['matricula'])."</td>
            <td>".utf8_encode($value['quant'])."</td>
            <td>".utf8_encode($value['limite'])."</td>
            <td><a class='btn-floating btn-small blue waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='editar' href='editar.php?id=".$value['userid']."&mod=".$value['nivel']."'><i class='material-icons'>edit</i></a><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Excluir' href='deletar.php?id=".$value['userid']."&mod=".$value['nivel']."'><i class='material-icons'>delete</i></a></td>";}?>

          </tr>       
        </tbody>
      </table>
    </div>
  </div>
  <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

<?php require_once 'footer.php'; ?> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

<!--script para o funcionamento do parallax-->
<script>
$(document).ready(function(){
  $('.modal').modal();
});

$(function () {
  $('.modal-trigger').leanModal({
    ready: function () {
    $('ul.tabs').tabs();
    }});
});

$(document).ready(function(){
  $('.button-collapse').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
  // START CLOSE
  $('.button-collapse').sideNav('hide');
});

$(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>