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
      <div class="col s5 m5">
          <form action="login.php" method="post">
            <div class="row">
              <h5 class="center-align">Login</h5>
            </div>
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
              <button class="btn right waves-effect waves-blue" type="submit">Acessar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="cadastro" class="modal grey darken-3">
    <div class="modal-content">
      <div class="col s8">
          <form class="" action="inser_user.php" method="post">
            <div class="row">
              <h5 class="center-align">Cadastrar</h5>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s11 m11 l11 xl11">
                <input type="text" id="nome" name="nome" class="validate" required>
                <label for="Nome" class="">Nome</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="login" name="login" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" maxlength="15" required>
                <label for="login" class="">Login</label>
              </div>
        <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="email" id="email" name="email" class="validate" required>
                <label for="email" class="">Email</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s5 m5 l5 xl5">
                <input type="password" id="senha" name="senha" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="senha" class="">Senha</label>
              </div>
        <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="password" id="senha2" name="senha2" class="validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                <label for="senha2">Confirmar senha</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="endereco" name="endereco" class="validate" required>
                <label for="endereco">Endereço</label>
              </div>
        <div class="col s1 m1 l1 xl1"></div>
              <div class="input-field col s5 m5 l5 xl5">
                <input type="text" id="telefone" name="telefone" class="validate" maxlength="15" required>
                <label for="telefone">telefone</label>
              </div>
            </div>
            <div class="row"></div>
            <div class="row"></div>
            <div class="row">
                <div class="col s12 m10 l12 xl12">
                  <h6 class="red-text">*O login e senha deve conter no minha 8 letras, com uma letra maiuscula, uma minuscula e um numero</h6>
                </div>
                <button class="btn right" type="submit" id="Btn">Acessar</button>
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
  <div class="row">
		<?php
			$id = $_GET['id'];
			$livro = new livro();
          	$livro_acervo = new livro_acervo();
			foreach ($livro->readLid($id) as $key => $value) {
			echo '
				<div class="col s3 m3 l4 xl4">
					<img src="fotos/'.$value['foto'].'">
				</div>';
			echo '
				<div class="col s8 m8 l8 xl8">
					<h5 class="">Informações do Livro:</h5>
					<table class="striped">
						<tr>
                        	<td><span class="">Titulo do Livro: </span></td>
                            <td><span class="">'.utf8_encode($value['titulo']).'</span></td>
                        </tr>
                        <tr>
                            <td><span class="">Autor do Livro: </span></td>
                            <td><span class="">'.utf8_encode($value['autor']).'</span></td>
                        </tr>
                        <tr>
                            <td><span class="">Editora do Livro: </span></td>
                            <td><span class="">'.utf8_encode($value['editora']).'</span></td>
                        </tr>
                        <tr>
                            <td><span class="">Genêro do Livro: </span></td>
                            <td><span class="">'.utf8_encode($value['genero']).'</span></td>
                        </tr>
                        <tr>
                            <td><span class="">Sinopse: </span></td>
                            <td><span class="">'.utf8_encode($value['sinopse']).'</span></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><a class="btn blue btn-small waves-effect waves-blue" href="insert_favorito.php?id='.$value['livroid'].'">Favorito</span></td>
                        </tr>
					</table>
				</div>';}?>


    </div>
		<div class="row"></div>
		<div class="row">		
		<div class="col s12 m12 l4 xl4"></div>
		<div class="col s12 m12 l8 xl8">
			<h5 class="">Exmeplares:</h5>
			<table class="responsive-table centered striped">
				<tr>
                    <td><span class="">Numero do Livro: </span></td>
                    <td><span class="">Previsão de devolução: </span></td>
                    <td><span class="">Status do Livro: </span></td>
                    <td><span class="">Reservar: </span></td>
                </tr>
			<?php foreach ($livro_acervo->readLid($id) as $key => $value) {
				echo '
                    <tr>
                        <td><span class="">'.utf8_encode($value['numero']).''.utf8_encode($value['n']).'</span></td>
                        <td><span class="">'.utf8_encode($value['previsao']).'</span></td>
                        <td><span class="">'.utf8_encode($value['status']).'</span></td>
                        <td><a class="btn " href="pedido_livro.php?id='.$value['acervoid'].'">Reservar</a></td>
                    </tr>
					';
			}
		?>
			</table>
		</div>
	</div>

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