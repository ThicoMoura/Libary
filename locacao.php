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
    <title>Biblioteca Vilmar</title>
    <!--links css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>
    <style>
    .icon-block {
      padding: 0 15px;
    }
    .icon-block .material-icons {
      font-size: inherit;
    }
  .valid {
      border-bottom: 1px solid #4CAF50 !important;
     box-shadow: 0 1px 0 0 #4CAF50 !important;
}
    </style>
</head>
<body>

  <!--menu-->
  <nav class="nav-extended <?php echo $_SESSION['user_menu'] ?>">
    <!--bottom menu-->
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Biblioteca Vilmar</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <!--verificar se o usuario esta locado-->
          <!--caso esteja, seu nome aparecera e opções de abrir o painel e sair da conta-->
          <li><a href="logout.php" class="right"><i class="fas fa-sign-out-alt right"></i></a><a href="painel.php" class="right"><i class="fas fa-user"></i></a></li>
      </ul>
    </div>
</nav>

    

<?php require_once 'footer.php'; ?> 

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

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

</script>