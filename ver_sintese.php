<?php

session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sintese</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
     

  <nav class="nav <?php echo $_SESSION['user_menu'] ?>">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Biblioteca Vilmar</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="right" href="painel.php">Painel</a></li>
        <li><a class="right" href="configuracoes.php">Configurações</a></li>
        <li><a class="right" href="cores.php">Cores</a></li>
        <li><a class="right" href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>
  
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">A fazer</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Nome da sintese</td>
            <td>Nota</td>
            <td>Livro</td>
            <td>Status</td>
            <td>Sintese</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT s.sinteseid, s.nomesi, s.sintese, s.nota, s.statussintese, l.titulo 

          FROM sintese s, livro l

          WHERE s.livroid = l.livroid

          and s.sinteseid = ".$_GET['id'];

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){

            echo" 
           <tr>
            <td>".utf8_encode($value['nomesi'])."</td>
            <td>".utf8_encode($value['nota'])."</td>      
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['statussintese'])."</td>
            <td class='truncate'>".utf8_encode($value['sintese'])."</td>";}?>
          </tr>       
        </tbody>
      </table>
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
  <div class="row"></div>


<footer class="page-footer <?php echo $_SESSION['user_menu'] ?>">
  <div class="container">
    <div class="row">
      <div class="col 10 s12">
        <h5 class="white-text">Biblioteca Vilmar</h5>
        <p class="grey-text text-lighten-4">Este site é um projeto de conclusão do curso Técnico em Informatica do Médiotec, para mais informações sobre o Médiotec, acessar o link.</p><a class="grey-text text-lighten-3" href="http://portal.mec.gov.br/mediotec">Médiotec</a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2018 Copyright Text
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
    </div>
  </div>
</footer>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script>

  // SIDEBAR
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
$(".dropdown-trigger").dropdown({});
});

</script>

</body>
</html>

    