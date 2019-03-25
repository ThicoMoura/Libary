<?php

session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

$sql = "SELECT nometur FROM turma WHERE turmaid = " .$_SESSION['user_turma'];
$stmt = DB::prepare($sql);
$stmt ->execute();

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configurações</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>
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

  <?php if ($_SESSION['user_nivel'] == "administrador"): ?>
 
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="update_user_adm.php" method="post" enctype="multipart/form-data" class="col s12" id="form_adm">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_nome'])?>" id="nome_adm" type="text" class="validate" name="nome_adm" required>
          <label for="nome_adm">Nome</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_login'])?>" id="login_adm" type="text" disabled pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="" name="login_adm" required>
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
  <div class="row"></div>


 <?php else: if ($_SESSION['user_nivel'] == "aluno"):  ?>


  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="update_user_al.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_nome'])?>" id="nome_al" type="text" class="validate" disabled name="nome_al" required>
          <label for="nome_al">Nome</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_login'])?>" id="login_al" type="text" disabled pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_al" required>
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
          <input value="<?php echo($_SESSION['user_email'])?>" type="email" class="validate" name="email_al" required>
          <label for="email_al">Email</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){ echo utf8_encode($value['nometur']); }?>" id="turma_al" disabled type="text" class="validate" name="turma_al" required>
          <label for="turma_al">Turma</label>
        </div>
        </div>

  <div class="row">
        <div class="input-field col s4">
          <input value="<?php echo($_SESSION['user_matricula'])?>" disabled id="matricula_al" type="number" class="validate" name="matricula_al" required>
          <label for="matricula_al">Matricula</label>
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

  <?php else: if ($_SESSION['user_nivel'] == "bibliotecario"): ?>

  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="update_user_bi.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_nome'])?>" id="nome_bi" type="text" class="validate" name="nome_bi" required>
          <label for="nome_bi">Nome</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_login'])?>" id="login_bi" type="text" disabled pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_bi" required>
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
          <input value="<?php echo($_SESSION['user_email'])?>" id="email_bi" type="text" class="validate" name="email_bi" required>
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
  <?php else: if ($_SESSION['user_nivel'] == "professor"): ?>

  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="update_user_pr.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_nome'])?>" id="nome_pr" type="text" class="validate" name="nome_pr" required>
          <label for="nome_pr">Nome</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_login'])?>" id="login_pr" disabled type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_pr" required>
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
          <input value="<?php echo($_SESSION['user_email'])?>" id="email_pr" type="text" class="validate" name="email_pr" required>
          <label for="email_pr">Email</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){ echo utf8_encode($value['nometur']); }?>" id="turma_pr" disabled type="text" class="validate" name="turma_pr" required>
          <label for="turma_pr">Turma</label>
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
  <div class="row"></div>

  <?php else:  if($_SESSION['user_nivel'] == 'usuario'): ?>


  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>

  <div class="row">

     <!--Col s12 = Define o limite de Col-->

      <form action="update_user_usr.php" method="post" enctype="multipart/form-data" class="col s12" id="teste">
        <div class="row">

  <!--Input-field = Define a class input-->

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_nome'])?>" id="nome_usr" type="text" class="validate" name="nome_usr" required>
          <label for="nome_usr">Nome</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_login'])?>" id="login_usr" disabled type="text" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" class="validate" name="login_usr" required>
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
          <input value="<?php echo($_SESSION['user_email'])?>" id="email_usr" type="text" class="validate" name="email_usr" required>
          <label for="email_usr">Email</label>
        </div>

        <div class="input-field col s6">
          <input value="<?php echo($_SESSION['user_endereco'])?>" id="endereco" type="text" class="validate" name="endereco" required>
          <label for="endereco">Endereço</label>
        </div>
        </div>

        <div class="row">
        <div class="input-field col s4">
          <input value="<?php echo($_SESSION['user_telefone'])?>" id="telefone" type="text" class="validate" name="telefone" required>
          <label for="telefone">Telefone</label>
        </div>
  
        <div class="col s1">
            <button type="submit" class="btn waves-effect waves-light">Atualizar</button>
        </div>
      </div>
      </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>
  <div class="row"></div>
  <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>
  <?php endif; ?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>

<script>
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
</script>

<footer class="page-footer <?php echo $_SESSION['user_menu'] ?>">
  <div class="container">
    <div class="row">
      <div class="col 10 s12">
        <h5 class="white-text">Biblioteca Vilmar</h5>
        <p class="grey-text text-lighten-4">Este site é um projeto de conclusão do curso Técnico em Informatica do Mediotec, para mais informações sobre o Mediotec, acessar o link.</p><a class="grey-text text-lighten-3" href="http://portal.mec.gov.br/mediotec">Mediotec</a>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2018 Copyright Text
    </div>
  </div>
</footer>
</body>
</html>