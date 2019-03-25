<?php

session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$nome = $_GET['nome']; 


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
  <div class="row"><h4 class="center-align">Sintese</h4></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_sintese_pedido.php?nome=<?php echo $nome;?>" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s12">
          <input placeholder="Digite aqui o nome da sua Sintese" id="nomesi" type="text" class="validate" name="nomesi" value="<?php echo $nome;?>" disabled required>
          <label for="nomesi">Nome</label>
        </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea id="sintese" class="materialize-textarea" placeholder="Digite aqui sua Sintese" name="sintese" required></textarea>
          <label for="sintese">Sintese</label>
          <script>
            CKEDITOR.replace('sintese');
          </script>
        </div>
      </div>

      <div class="row">
  <div class="col s1">
            <button type="submit" class="btn waves-effect waves-light">Cadastrar</button>
  </div>
        </div>
      </div>
      </form>
    </div>
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