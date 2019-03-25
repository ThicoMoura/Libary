<?php

session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}


$url = $_SERVER['REQUEST_URI']; 


?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
     

<?php require_once 'menu_painel.php'; ?>

  </nav>

  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_livro.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o titulo do livro" id="titulo" type="text" class="validate" name="titulo" required>
          <label for="titulo">Titulo</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o autor do livro" id="autor" type="text" class="validate" name="autor" required>
          <label for="autor">Autor</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a editora do livro" id="editora" type="text" class="validate" name="editora" required>
          <label for="editora">Editora</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o genêro do livro" id="genero" type="text" class="validate" name="genero" required>
          <label for="genero">Genêro</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a fileira onde esta o livro" id="fileira" type="text" class="validate" name="fileira" required>
          <label for="fileira">Fileira</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o codigo do livro" id="numero" type="text" class="validate" name="numero" required>
          <label for="numero">Número</label>
        </div>
        </div>

      <div class="row">
        <div class="input-field col s12">
          <textarea id="sinopse" class="materialize-textarea" placeholder="Digite aqui a sinópse do livro" name="sinopse" required></textarea>
          <label for="sinopse">Sinópse</label>
          <script>
            CKEDITOR.replace('sinopse');
          </script>
        </div>
      </div>

  <div class="row">
        <div class="input-field col s4">
          <input placeholder="Digite aqui quantos livros tem" id="quant" type="number" class="validate" name="quant" required>
          <label for="quant">Quantidade de livros</label>
        </div>

  <div class="col s5">
          <div class="btn file-field input-field">
            <span>Foto</span>
            <input type="file" id="foto" name="foto" class="validate" requerid>
          </div>
  </div>  
  
  <div class="col s1">
            <button type="submit" class="btn waves-effect waves-light">Cadastrar</button>
        </div>
      </div>
      </form>
    </div>

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

