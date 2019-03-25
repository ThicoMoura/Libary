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
          <!--caso esteja, seu nome aparecera e opções de abrir o painel e sair da conta-->
          <li><a href="logout.php" class="right"><i class="fas fa-sign-out-alt right"></i></a><a href="painel.php" class="right"><i class="fas fa-user"></i></a><a class="right">Olá, <?php echo $_SESSION['user_login']; ?></a></li>
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
                <div class="col s7 m7 l7 xl7"></div>
                <div class="col s2 m2 l2 xl2"><a class="btn waves-effect waves-blue modal-action modal-close red">Close</a></div>
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
                  <div class="col s6 m6 l6 xl6"><i class="fas fa-question-circle tooltipped" data-position="right" data-tooltip="login e senha deve conter Letras maiusculas, minusculas, acento, e numeros com no minimo oito"></i></div>
                  <div class="col s2 m2 l2 xl2"><a class="btn waves-effect waves-blue modal-action modal-close red">Close</a></div>
                  <button class="btn waves-effect waves-blue green" type="submit">Cadastrar</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </nav>

	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>
	<div class="row"></div>

		<?php
			$id = $_GET['id'];
			$projeto = new projeto();
			foreach ($projeto->readPRO($id) as $key => $value) {
			echo '
				<div class="col s12 m12 l12 xl12">
					<h5>Informações do Livro:</h5>
					<table class="striped">
						<tr>
              <td><span class="">Titulo do Projeto: </span></td>
              <td><span class="">'.utf8_encode($value['titulo']).'</span></td>
            </tr>
            <tr>
              <td><span class="">Autor do Projeto: </span></td>
              <td><span class="">'.utf8_encode($value['autor']).'</span></td>
              </tr>
              <tr>
                  <td><span class="">Horario do Projeto: </span></td>
                  <td><span class="">'.utf8_encode($value['horario']).'</span></td>
              </tr>
              <tr>
                  <td><span class="">Descrição do Projeto: </span></td>
                  <td><span class="">'.utf8_encode($value['descricao']).'</span></td>
              </tr>
					</table>
          <a class="btn right" href="pedido_projeto.php?id='.$value['projetoid'].'">Solicitar</a>
				</div>';}?>
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

<!--footer-->
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