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
    <title>Arquivo Projetos</title>
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
      <h5 class="center-align">Arquivo Projetos</h5>
      <a class="btn-floating right btn-small blue waves-effect waves-blue tooltipped" data-position="bottom" data-tooltip="add novo" href="cadastro_projetos.php"><i class="material-icons">add</i></a>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Titulo</td>
            <td>Autor</td>
            <td>Descrição</td>
            <td>Horario</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT titulo, autor, descricao, horario, projetoid FROM projetos";

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
            echo" 
           <tr>      
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['autor'])."</td>
            <td>".utf8_encode($value['descricao'])."</td>
            <td>".utf8_encode($value['horario'])."</td>
            <td><a class='btn-floating btn-small blue waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='editar' href='editar.php?id=".$value['projetoid']."&mod=projetos'><i class='material-icons'>edit</i></a><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Excluir' href='deletar.php?id=".$value['projetoid']."&mod=projetos'><i class='material-icons'>delete</i></a></td>";}?>

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