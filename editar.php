<?php

session_start();

require_once "funcao.php";

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

// Dados da Notícia
$id = $_GET['id'];
$mod = $_GET['mod'];

$livro = new livro();
$projeto = new projeto();
$usuario_adm = new usuario_adm();
$usuario_al = new usuario_al();
$usuario_bi = new usuario_bi();
$usuario_pr = new usuario_pr();
$usuario_usr = new usuario_usr();
$turma = new turma();

$sql = "SELECT nometur FROM turma t, usuarios u WHERE t.turmaid = u.turmaid and u.userid = " .$id;
$stmt = DB::prepare($sql);
$stmt ->execute();

?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!--transformação para celular-->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar <?php echo$mod;?></title>

    <!--links css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
</head>
<body>

<?php require_once 'menu_painel.php'?>
</nav>

  <div class="row"></div>
  <div class="row"></div>
  <div class="row"><h5 class="center-align">Editar <?php echo$mod;?></h5></div>
  <div class="row"></div>

<?php if ($mod == "livro") { 

  echo '<div class="row">
    <form class="col s12" action="update_livro.php?id='.$id.'" method="post">
      <div class="row">
        <div class="col s6">
          Titulo:
          <div class="input-field">
          <input id="titulo" type="text" name="titulo">
          <label for="titulo">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['titulo']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Autor:
        <div class="input-field">
          <input id="autor" type="text" name="autor">
          <label for="autor">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['autor']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Editora:
        <div class="input-field">
          <input id="editora" type="text" name="editora">
          <label for="editora">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['editora']);} echo'</label>
        </div>
      </div>
        <div class="col s6">
          Genêro:
        <div class="input-field">
          <input id="genero" type="text" name="genero">
          <label for="genero">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['genero']);} echo'</label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Fileira:
        <div class="input-field">
          <input id="fileira" type="text" name="fileira">
          <label for="fileira">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['fileira']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Numero:
        <div class="input-field">
          <input id="numero" type="text" name="numero">
          <label for="numero">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['numero']);} echo'</label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Sinopse:
        <div class="input-field">
          <input id="sinopse" type="text" name="sinopse">
          <label for="sinopse">'; foreach($livro -> readLid($id) as $value){ echo utf8_encode($value['sinopse']);} echo'</label>
        </div>
        </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

} elseif ($mod == "projetos") { 

  echo'<div class="row">
    <form class="col s12" action="update_projeto.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Titulo:
          <div class="input-field">
          <input id="titulo" type="text" name="titulo">
          <label for="titulo">'; foreach($projeto -> readPRO($id) as $value){ echo utf8_encode($value['titulo']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Autor:
        <div class="input-field">
          <input id="autor" type="text" name="autor">
          <label for="autor">'; foreach($projeto -> readPRO($id) as $value){ echo utf8_encode($value['autor']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Descricao:
        <div class="input-field">
          <input id="descricao" type="text" name="descricao">
          <label for="descricao">'; foreach($projeto -> readPRO($id) as $value){ echo utf8_encode($value['descricao']);} echo'</label>
        </div>
      </div>
        <div class="col s6">
          Horario:
        <div class="input-field">
          <input id="horario" type="text" name="horario">
          <label for="horario">'; foreach($projeto -> readPRO($id) as $value){ echo utf8_encode($value['horario']);} echo'</label>
        </div>
        </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';


} elseif ($mod == "administrador") { 

  echo'<div class="row">
    <form class="col s12" action="update_adm.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text" name="nome">
          <label for="nome">'; foreach($usuario_adm -> readSI($id) as $value){ echo utf8_encode($value['nome']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Login:
        <div class="input-field">
          <input id="login" type="text" name="login">
          <label for="login">'; foreach($usuario_adm -> readSI($id) as $value){ echo utf8_encode($value['login']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Senha:
        <div class="input-field">
          <input id="senha" type="password" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="senha">Senha</label>
        </div>
      </div>
        <div class="col s6">
          Confimar senha:
        <div class="input-field">
          <input id="conf_senha" type="password" name="senha_con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="conf_senha">Confirmar senha</label>
        </div>
        </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

  
}elseif ($mod == "aluno") {

  echo'<div class="row">
    <form class="col s12" action="update_al.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text" name="nome">
          <label for="nome">'; foreach($usuario_al -> readSI($id) as $value){ echo utf8_encode($value['nome']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Login:
        <div class="input-field">
          <input id="login" type="text" name="login">
          <label for="login">'; foreach($usuario_al -> readSI($id) as $value){ echo utf8_encode($value['login']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Senha:
        <div class="input-field">
          <input id="senha" type="password" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="senha"></label>
        </div>
      </div>
        <div class="col s6">
          Confirmar senha:
        <div class="input-field">
          <input id="conf_senha" type="password" name="senha_con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="conf_senha"></label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Email:
        <div class="input-field">
          <input id="email" type="text" name="email">
          <label for="email">'; foreach($usuario_al -> readSI($id) as $value){ echo utf8_encode($value['email']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Matricula:
        <div class="input-field">
          <input id="matricula" type="number" name="matricula">
          <label for="matricula">'; foreach($usuario_al -> readSI($id) as $value){ echo utf8_encode($value['matricula']);} echo'</label>
        </div> 
      </div>
      <div class="row">
        <div class="col s6">
          Turma:
        <div class="input-field">
          <input id="turma" type="number" name="turmaid">
          <label for="turma">'; foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){ echo utf8_encode($value['nometur']); } echo'</label>
        </div>
        </div>
        <div class="col s6">
          Limite:
        <div class="input-field">
          <input id="limite" type="number" name="limite">
          <label for="limite">'; foreach($usuario_al -> readSI($id) as $value){ echo utf8_encode($value['limite']);} echo'</label>
        </div>
      </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

 
}elseif ($mod == "bibliotecario") {

  echo'<div class="row">
    <form class="col s12" action="update_bi.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text" name="nome">
          <label for="nome">'; foreach($usuario_bi -> readSI($id) as $value){ echo utf8_encode($value['nome']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Login:
        <div class="input-field">
          <input id="login" type="text" name="login">
          <label for="login">'; foreach($usuario_bi -> readSI($id) as $value){ echo utf8_encode($value['login']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Senha:
        <div class="input-field">
          <input id="senha" type="password" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="senha">Senha</label>
        </div>
      </div>
        <div class="col s6">
          Confimar senha:
        <div class="input-field">
          <input id="conf_senha" type="password" name="senha_con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="conf_senha">Confirmar senha</label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Email:
        <div class="input-field">
          <input id="email" type="text" name="email">
          <label for="email">'; foreach($usuario_bi -> readSI($id) as $value){ echo utf8_encode($value['email']);} echo'</label>
        </div>
      </div>
    </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

  
} elseif ($mod == "professor") {

  echo'<div class="row">
    <form class="col s12" action="update_pr.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text" name="nome">
          <label for="nome">'; foreach($usuario_pr -> readSI($id) as $value){ echo utf8_encode($value['nome']);} echo'</label>
        </div>
        </div>
        <div class="col s6">
          Login:
        <div class="input-field">
          <input id="login" type="text" name="login">
          <label for="login">'; foreach($usuario_pr -> readSI($id) as $value){ echo utf8_encode($value['login']);} echo'</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Senha:
        <div class="input-field">
          <input id="senha" type="password" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="senha">Senha</label>
        </div>
      </div>
        <div class="col s6">
          Confimar senha:
        <div class="input-field">
          <input id="conf_senha" type="password" name="senha_con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="conf_senha">Confirmar senha</label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Email:
        <div class="input-field">
          <input id="email" type="text" name="email">
          <label for="email">'; foreach($usuario_pr -> readSI($id) as $value){ echo utf8_encode($value['email']);} echo'</label>
        </div>
      </div>
      <div class="col s6">
          Turma:
        <div class="input-field">
          <input id="turma" type="number" name="turmaid">
          <label for="turma">'; foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){ echo utf8_encode($value['nometur']); } echo'</label>
        </div>
      </div>
    </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

  
} elseif ($mod == "usuario") {

 echo' <div class="row">
    <form class="col s12" action="update_usr.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text" name="nome">
          <label for="nome">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['nome']);} echo '</label>
        </div>
        </div>
        <div class="col s6">
          Login:
        <div class="input-field">
          <input id="login" type="text" name="login">
          <label for="login">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['login']);} echo '</label>
        </div>
      </div>
      </div>
      <div class="row">
        <div class="col s6">
          Senha:
        <div class="input-field">
          <input id="senha" type="password" name="senha" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="senha">Senha</label>
        </div>
      </div>
        <div class="col s6">
          Confirmar senha:
        <div class="input-field">
          <input id="conf_senha" type="password" name="senha_con" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
          <label for="conf_senha">Confirmar senha</label>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Email:
        <div class="input-field">
          <input id="email" type="text" name="email">
          <label for="email">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['email']);} echo '</label>
        </div>
        </div>
        <div class="col s6">
          Endereço:
        <div class="input-field">
          <input id="endereco" type="text" name="endereco">
          <label for="endereco">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['endereco']);} echo '</label>
        </div>
      </div>
      <div class="row">
        <div class="col s6">
          Telefone:
        <div class="input-field">
          <input id="telefone" type="text" name="telefone">
          <label for="telefone">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['telefone']);} echo '</label>
        </div>
        </div>
        <div class="col s6">
          Limite:
        <div class="input-field">
          <input id="limite" type="number" name="limite">
          <label for="limite">'; foreach($usuario_usr -> readSI($id) as $value){ echo utf8_encode($value['limite']);} echo '</label>
        </div>
      </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

  
 } elseif ($mod == "turma") {

 echo' <div class="row">
    <form class="col s12" action="update_turma.php?id='.$id.'" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col s6">
          Nome:
          <div class="input-field">
          <input id="nome" type="text">
          <label for="nome">'; foreach($turma -> readTur($id) as $value){ echo utf8_encode($value['nometur']);} echo '</label>
        </div>
        </div>
      </div>
      <button class="btn green right waves-effect waves-blue">Atualizar</button>
    </form>
    </div>

  <div class="row"></div>
  <div class="row"></div>';

  
 } ?>

<?php require_once 'footer.php';?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

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