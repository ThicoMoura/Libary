<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

?>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/css/materialize.min.css">
    <style>
    .icon-block {
      padding: 0 15px;
    }
    .icon-block .material-icons {
      font-size: inherit;
    }
    </style>
  </head>
  <body>
  <nav>
    <div class="nav-wrapper <?php echo($_SESSION['user_menu'])?>">
      <a href="index.php" class="brand-logo">Biblioteca</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="painel.php">Painel</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

    <form action="update_config.php" method="post">

      <div class="col s12">
  
        <div class="input-field col s6">
          <select id="menu" name="menu">
            <option disabled selected>Escolha uma cor</option>
            <option value="grey darken-4">Cinza Escuro</option>
            <option value="blue">Azul</option>
            <option value="red">Vermelho</option>
            <option value="green">Verde</option>
            <option value="indigo">Indigo</option>
            <option value="purple">Roxo</option>
            <option value="orange">Laranja</option>
          </select>
          <label>Seleção de cores</label>
        </div>
        <div class="input-field col s6">
          <select id="texto" name="texto">
            <option value="grey darken-4">Cinza Escuro</option>
            <option value="blue">Azul</option>
            <option value="red">Vermelho</option>
            <option value="green">Verde</option>
            <option value="indigo">Indigo</option>
            <option value="purple">Roxo</option>
            <option value="orange">Laranja</option>
          </select>
          <label>Seleção de cores</label>
        </div>

        <button class="btn right">Confirmar</button>
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

<?php require_once 'footer.php'?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script>
  $(document).ready(function() {
    $('select').material_select();
});
</script>

</body>
</html>