<?php

//inicio a sessão
session_start();

//carrega todas as classes
function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

//carrega a função isLoggedIn()
require_once 'funcao.php';


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
        <?php if (isLoggedIn()): ?>
          <!--caso esteja, seu nome_usr aparecera e opções de abrir o painel e sair da conta-->
          <li><a href="logout.php" class="right"><i class="fas fa-sign-out-alt right"></i></a><a href="painel.php" class="right"><i class="fas fa-user"></i></a><a class="right">Olá, <?php echo $_SESSION['user_nome']; ?></a></li>
        <?php else: ?>
          <!--Caso não esteja, opção de entrar e cadastrar ira aparecer-->
          <li><a class="right modal-trigger" href="#cadastro">Cadastrar</a></li>
          <li><a class="right modal-trigger" href="#login">Entrar</a></li>
        <?php endif; ?>
      </ul>
    </div>

    <div id="login" class="modal grey darken-3">

    <div class="modal-content">

        <div class="row">
            <h5 class="center-align">Login</h5>
        </div>

      <div class="col s5 m5">
          <form action="login.php" method="post">
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s11">
          	<input id="login" type="text" name="login">
          	<label for="login">Login</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s11">
                <input type="password" id="senhalogin" name="senhalogin" class="" required>
                <label for="senhalogin" class="">Senha</label>
              </div>
            </div>

            <div class="row"></div>

            <div class="row">
                <div class="col s3 m3 l5 xl7"></div>
                <div class="col s3 m3 l3 xl2"><a class="btn waves-effect waves-blue modal-action modal-close red">Close</a></div>
                <button class="btn waves-effect waves-blue green" type="submit">Acessar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="cadastro" class="modal grey darken-3">
    <div class="modal-content">
      <div class="col s8">
          <form class="" action="insert_usr.php" method="post">
            <div class="row">
              <h5 class="center-align">Cadastrar</h5>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s11 m11 l11 xl11">
                <input type="text" id="nome_usr" name="nome_usr" class="validate" required>
                <label for="nome_usr">Nome</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">

              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="login_usr" name="login_usr" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="15" required>
                <label for="login_usr">Login</label>
              </div>
	      <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="email" id="email_usr" name="email_usr" class="validate" required>
                <label for="email_usr">Email</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s5 m5 l5 xl5">
                <input type="password" id="senha_usr" name="senha_usr" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="senha_usr" >Senha</label>
              </div>
	      <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="password" id="senha_con_usr" name="senha_con_usr" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="senha_con_usr">Confirmar senha</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="endereco_usr" name="endereco_usr" class="validate" required>
                <label for="endereco_usr">Endereço</label>
              </div>
	      <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="telefone_usr" name="telefone_usr" class="validate" maxlength="15" required>
                <label for="telefone_usr">telefone</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
              <div class="row">
                  <div class="col s3 m3 l5 xl7"><i class="fas fa-question-circle tooltipped" data-position="right" data-tooltip="login e senha deve conter Letras maiusculas, minusculas, acento, e numeros com no minimo oito"></i></div>
                  <div class="col s3 m3 l3 xl2"><a class="btn waves-effect waves-blue modal-action modal-close red">Close</a></div>
                  <button class="btn waves-effect waves-blue green" type="submit">Cadastrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
    <!--menu deslizante-->
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#index" class="active">Index</a></li>
        <li class="tab"><a href="#livros">Livros</a></li>
        <li class="tab"><a href="#projetos">Projetos</a></li>
      </ul>
    </div>
  </nav>
  <!--index do menu deslizante-->
  <div id="index" class="col s12">
    <div class="parallax-container">
      <!--imagem parallax-->
      <div class="parallax"><img src="fotos/B1.jpg" onload="showToast('<?php echo $_GET['mensagem']; ?>', 3000)"></div>
    </div>
    <!--conteudo entre o parallax-->
    <div class="container">
    <!--Cria uma secção-->  
    <div class="section">
      <div class="row">
        <div class="col s12 m4">
          <!--Deixa em bloco-->
          <div class="icon-block">
            <!--icone-->
            <h2 class="center light-blue-text">
              <i class="material-icons">accessibility</i>
            </h2>
            <!--titulo-->
            <h5 class="center <?php echo $_SESSION["user_texto"] ?>-text">Praticidade</h5>
            <!--texto-->
            <p class="light <?php echo $_SESSION["user_texto"] ?>-text">Este site foi feito com o objetivo de tornar pratico a locação de livros, além de, trazer uma melhor interação entre os alunos e o corpo docente, trazendo informações sobre projetos na biblioteca, novidades, tanto na biblioteca, quanto escolar, com uma interface agradavel, melhora sua interação com a biblioteca.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <!--Deixa em bloco-->
          <div class="icon-block">
            <!--icone-->
            <h2 class="center light-blue-text">
              <i class="material-icons">school</i>
            </h2>
            <!--titulo-->
            <h5 class="center <?php echo $_SESSION["user_texto"] ?>-text">Interativo</h5>
            <!--texto-->
            <p class="light <?php echo $_SESSION["user_texto"] ?>-text">A sua leitura não acaba no livro, após a leitura você tem a oportunidade de escrever uma sintese ou redação, na qual será corrigida pelo professor, e terá sua nota.</p>
          </div>
        </div>
        <div class="col s12 m4">
          <!--Deixa em bloco-->
          <div class="icon-block">
            <!--icone-->
            <h2 class="center light-blue-text">
              <i class="material-icons">flash_on</i>
            </h2>
            <!--titulo-->
            <h5 class="center <?php echo $_SESSION["user_texto"] ?>-text">Rapido</h5>
            <!--texto-->
            <p class="light <?php echo $_SESSION["user_texto"] ?>-text">O que antes tinha de passar algum tempo buscando seu livro na biblioteca, esta no seu dispositivo, encurtando todo esse tempo, tendo de ir só para buscar o livro, ou até mesmo ler o online</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <!--menu deslizante, livros-->
  <div id="livros" class="">

    <!--espaçamento-->
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <!--pesquiça lateral-->
    <div class="row">
        <?php $sql = "SELECT * FROM livro";
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $li){
            echo '
              <div class="col">
                <div class="card">
                  <div class="card-image small">
                    <img src="fotos/'.$li['foto'].'" >
                    <a href="livro.php?id='.$li['livroid'].'" class="btn-floating halfway-fab waves-effect waves-light modal-trigger red"><i class="material-icons">add</i></a>
                  </div>
                  <div class="card-content">
                    <span class="">Livro: '.utf8_encode($li['titulo']).'</span>
                    <p class="">Autor: '.utf8_encode($li['autor']).'</p>
                  </div>
                </div>
            </div>';}?>

    </div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
  </div>
  <!--menu delizante, projetos-->
  <div id="projetos" class="col s12">

    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <!--pesquiça lateral-->
    <div class="row">
    <?php 

          $projetos = new projeto();
          foreach ($projetos->readALL() as $key => $pr) {
            echo '
              <div class="col">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">Projeto: '.utf8_encode($pr['titulo']).'</span>
                    <p>Autor: '.utf8_encode($pr['autor']).'</p>
                  </div>
                  <div class="card-action">
                    <a href="projeto.php?id='.$pr['projetoid'].'" class="btn halfway-fab waves-effect waves-light blue">Abrir</a>
                  </div>
                </div>
            </div>';}?>
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
  </div>
  
<?php include 'footer.php'; ?>

<!--links dos scripts-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<!--script para o funcionamento do parallax-->
<script>
$(document).ready(function(){
  $('.parallax').parallax();
});

$(document).ready(function(){
  $('.modal').modal();
});

$('ul.tabs').tabs();
$('.modal-trigger').leanModal({
    ready: function () {
        $('#firstTab').click();
    }
});

/* Máscaras ER */
function mascara(o,f){
  v_obj=o;
  v_fun=f;
setTimeout("execmascara()",1)
}
function execmascara(){
  v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
  v=v.replace(/\D/g,"");             //Remove tudo o que não é dígito
  v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
  v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
  return v;
}
function id( el ){
  return document.getElementById( el );
}
window.onload = function(){
  id('telefone_usr').onkeyup = function(){
  mascara( this, mtel );
  }
};

function showToast(message, duration) {
  Materialize.toast(message, duration);
};


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

$(document).ready(function(){
    $('.tooltipped').tooltip();
});


</script>
</body>
</html>
