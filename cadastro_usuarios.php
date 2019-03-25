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
    <title>Cadastro de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>
  </head>
  <body>
     

<?php require_once 'menu_painel.php'; ?>

  <div class="nav-content">
        <ul class="tabs tabs-transparent">
          <li class="tab"><a href="#CadastroAd">Cadastro de Administradores</a></li>
          <li class="tab"><a href="#CadastroAl">Cadastro de Alunos</a></li>
          <li class="tab"><a href="#CadastroB">Cadastro de Bibliotecarios</a></li>
          <li class="tab"><a href="#CadastroP">Cadastro de Professores</a></li>
          <li class="tab"><a href="#CadastroU">Cadastro de Usuario público</a></li>
        </ul>
      </div>
  </nav>

 <div id="CadastroAd">
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_adm.php" method="post" enctype="multipart/form-data" class="col s12" id="form_adm">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Nome do usuario" id="nome_adm" type="text" class="validate" name="nome_adm" required>
          <label for="nome_adm">Nome</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Login do usuario" id="login_adm" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_adm" required>
          <label for="login_adm">Login</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a Senha do usuario" id="senha_adm" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_adm" required>
          <label for="senha_adm">Senha</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Confirme a Senha" id="senha_con_adm" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_con_adm" required>
          <label for="senha_con_adm">Confirmar senha</label>
        </div>
        </div>

      <div class="row">
  <div class="col s1">
            <button type="submit" class="btn waves-effect waves-light">Cadastrar</button>
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

</div>


<div id="CadastroAl">
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_al.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Nome do usuario" id="nome_al" type="text" class="validate" name="nome_al" required>
          <label for="nome_al">Nome</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Login do usuario" id="login_al" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_al" required>
          <label for="login_al">Login</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a Senha do usuario" id="senha_al" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_al" required>
          <label for="senha_al">Senha</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Confirme a Senha do usuario" id="senha_con_al" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_con_al" required>
          <label for="senha_con_al">Confirmar a Senha</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui o Email do usuario" id="email_al" type="email" class="validate" name="email_al" required>
          <label for="email_al">Email</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui a Turma do usuario" id="turmaid_al" type="number" class="validate" name="turmaid_al" required>
          <label for="turmaid_al">Turma</label>
        </div>
        </div>

  <div class="row">
        <div class="input-field col s4">
          <input placeholder="Digite aqui o numero de Matricula da usuario" id="matricula_al" type="number" class="validate" name="matricula_al" required>
          <label for="matricula_al">Matricula</label>
        </div>
  
  <div class="col s1">
            <button type="submit" class="btn waves-effect waves-light">Cadastrar</button>
        </div>
      </div>
      </form>
    </div>

  <div class="row"></div>
</div>

<div id="CadastroB">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_bi.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Nome do usuario" id="nome_bi" type="text" class="validate" name="nome_bi" required>
          <label for="nome_bi">Nome</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Login do usuario" id="login_bi" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_bi" required>
          <label for="login_bi">Login</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a Senha do usuario" id="senha_bi" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_bi" required>
          <label for="senha_bi">Senha</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Confirmar a Senha do usuario" id="senha_con_bi" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_con_bi" required>
          <label for="senha_con_bi">Confirmar a Senha</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a Email onde esta o usuario" id="email_bi" type="text" class="validate" name="email_bi" required>
          <label for="email_bi">Email</label>
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
  <div class="row"></div>
</div>

<div id="CadastroP">
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_pr.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Nome do usuario" id="nome_pr" type="text" class="validate" name="nome_pr" required>
          <label for="nome_pr">Nome</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o login_adm do usuario" id="login_pr" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_pr" required>
          <label for="login_adm">Login</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a senha_al do usuario" id="senha_pr" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_pr" required>
          <label for="senha_pr">Senha</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Confirmar a Senha do usuario" id="senha_con_pr" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" class="validate" name="senha_con_pr" required>
          <label for="senha_con_pr">Confirmar a Senha</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a Email onde esta o usuario" id="email_pr" type="text" class="validate" name="email_pr" required>
          <label for="email_pr">Email</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui a Turma do usuario" id="turmaid_pr" type="number" class="validate" name="turmaid_pr" required>
          <label for="turmaid_pr">Turma</label>
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
  <div class="row"></div>
  <div class="row"></div>
</div>

<div id="CadastroU">
  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="insert_usr.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input placeholder="Digite aqui o nome_adm do usuario" id="nome_usr" type="text" class="validate" name="nome_usr" required>
          <label for="nome_usr">Nome</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o login_adm do usuario" id="login_usr" type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_usr" required>
          <label for="login_usr">Login</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a senha_al do usuario" id="senha_usr" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="senha_usr" required>
          <label for="senha_usr">Senha</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Confirmar a Senha do usuario" id="senha_con_usr" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" type="password" class="validate" name="senha_con_usr" required>
          <label for="senha_con_usr">Confirmar a Senha</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s6">
          <input placeholder="Digite aqui a email_al onde esta o usuario" id="email_usr" type="text" class="validate" name="email_usr" required>
          <label for="email_usr">Email</label>
        </div>

        <div class="input-field col s6">
          <input placeholder="Digite aqui o Endereço do usuario" id="endereco" type="text" class="validate" name="endereco" required>
          <label for="endereco">Endereço</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s4">
          <input placeholder="Digite aqui Telefone do usuarios" id="telefone" type="text" class="validate" name="telefone" required>
          <label for="telefone">Telefone</label>
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
</div>

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

