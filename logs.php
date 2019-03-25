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
    <title>Logs</title>
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

    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Locação</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Usuario</td>
            <td>Nome do livro</td>
            <td>datalocacao</td>
            <td>dataentrega</td>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT u.nome, li.titulo, l.datalocacao, l.dataentrega, l.statuslocacao, l.locaid 
          FROM locacao l, livro_acervo la, livro li, usuarios u
          WHERE l.userid = u.userid
          and l.acervoid = la.acervoid
          and la.livroid = li.livroid";

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
            echo" 
           <tr>      
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['datalocacao'])."</td>
            <td>".utf8_encode($value['dataentrega'])."</td>
            <td>".utf8_encode($value['statuslocacao'])."</td>";}?>

          </tr>       
        </tbody>
      </table>
    </div>
    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Pedidos</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Nome</td>
            <td>Usuario</td>
            <td>Turma</td>
            <td>Status</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT p.nomeped, u.nome, t.nometur, p.statuspedido, p.pedidoid 
          FROM pedido p, usuarios u, turma t
          WHERE p.userid = u.userid
          and u.turmaid = t.turmaid";

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
            echo" 
           <tr>      
            <td>".utf8_encode($value['nomeped'])."</td>
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['nometur'])."</td>
            <td>".utf8_encode($value['statuspedido'])."</td>";}?>

          </tr>       
        </tbody>
      </table>
    </div>
  </div>
  </div>
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

</script>