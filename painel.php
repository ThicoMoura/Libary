<?php
//inicio a sessão
session_start();

function __autoload($classe){
  require_once 'classes/'.$classe.'.class.php'; 
}

  require_once "funcao.php";

if(!isLoggedIn()) {
  header('Location: index.php?mensagem=Acesso negado necessario login');
} 

$url = $_SERVER['REQUEST_URI'];

$teste = new locacao();


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
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
    <style>
    .icon-block {
      padding: 0 15px;
    }
    .icon-block .material-icons {
      font-size: inherit;
    }
    </style>
    <div>teste</div>
  </head>
  <body onload="mensagem('<?php echo $_GET['mensagem'];?>', 3000)">

<nav class="nav-extended <?php echo $_SESSION['user_menu'] ?>">
  
    <!--Menu superior-->
    <div class="nav-wrapper" id="teste1">
      <?php if ($_SESSION['user_nivel'] == "administrador" || $_SESSION['user_nivel'] == "bibliotecario"): ?>
        <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
      <?php endif; ?>
      <ul class="right">
        <li><a href="index.php" class="right tooltipped" data-position='bottom' data-tooltip='Inicio'><i class="fas fa-home"></i></a></li>
        <li><a class="right tooltipped" data-position='bottom' data-tooltip='Configurações' href="configuracoes.php"><i class="fas fa-cogs"></i></a></li>
        <li><a class="right tooltipped" data-position='bottom' data-tooltip='Sair' href="logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
      </ul>
    </div>
    <?php if ($_SESSION['user_nivel'] == "usuario" || $_SESSION['user_nivel'] == "aluno"): ?>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#inicio">Inicio</a></li>
        <li class="tab"><a href="#sintese">Sinteses</a></li>
        <li class="tab"><a href="#livros">Livros</a></li>
        <li class="tab"><a href="#projetos">Projetos</a></li>
      </ul>
    </div>
    <?php else: if ($_SESSION['user_nivel'] == "administrador" || $_SESSION['user_nivel'] == "bibliotecario"): ?>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#inicio">Inicio</a></li>
        <li class="tab"><a href="#livrosadm">Locações</a></li>
        <li class="tab"><a href="#pedidosadm">Pedidos</a></li>
      </ul>
    </div>
    <?php else: if ($_SESSION['user_nivel'] == "professor"):?>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#inicio">Inicio</a></li>
        <li class="tab"><a href="#turma">Turma</a></li>
        <li class="tab"><a href="#sintesepr">Sinteses</a></li>
      </ul>
    </div>
    <?php endif; ?>
    <?php endif; ?>
    <?php endif; ?>

    <ul class="side-nav" id="mobile-demo">
        <li><a href="painel.php">Painel</a></li>    
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue"><i class="medium material-icons">assignment_ind</i> Cadastros<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a class="waves-effect waves-blue" href="cadastro_livro.php">Livros</a></li>
                    <li><a class="waves-effect waves-blue" href="cadastro_projetos.php">Projetos</a></li>
                    <li><a class="waves-effect waves-blue" href="cadastro_turma.php">Turma</a></li>
                    <?php if ($_SESSION['user_nivel'] == "administrador"): ?>
                    <li><a class="waves-effect waves-blue" href="cadastro_usuarios.php">Usuarios</a></li>
                    <?php endif; ?>
                    <li><div class="divider"></div></li>
                  </ul>
                </div>
              </li>
          </ul>
      </li>       
        
        
        <li class="white">
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue"><i class="medium material-icons">assignment_ind</i>Registros<i class="material-icons right" style="margin-right:0;">arrow_drop_down</i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a class="waves-effect waves-blue" href="arquivo_livro.php">Livros</a></li>
                  <li><a class="waves-effect waves-blue" href="arquivo_projetos.php">Projetos</a></li>
                  <li><a class="waves-effect waves-blue" href="arquivo_turma.php">Turma</a></li>
                  <?php if ($_SESSION['user_nivel'] == "administrador"): ?>
                  <li><a class="waves-effect waves-blue" href="arquivo_usuarios.php">Usuarios</a></li>
                  <li><a class="waves-effect waves-blue" href="logs.php">Logs</a></li>
                  <?php endif; ?>
                  <li><div class="divider"></div></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
  </nav>


  <div class="row" id="inicio">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <!--Cria uma secção-->  
    <div class="section" >
      <div class="row"> 
        <div class="col s12 m4"></div>
        <div class="col s12 m4">
          <!--Deixa em bloco-->
          <div class="icon-block">
            <!--icone-->
            <h2 class="center light-blue-text">
              <a class="btn-floating pulse btn-large"><i class="large material-icons">apps</i></a>
            </h2>
            <!--titulo-->
            <h5 class="center">Bem Vindo ao Painel</h5>
            <!--texto-->
            <p class="light">Aqui neste local é onde estará o controle de toda sua conta, haverá locaçao de livros, favoritos, projetos cadastrados, entre outros, além da configuração da sua conta.</p>
          </div>
        </div>
        <div class="col s12 m4"></div>
      </div>
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
  </div>

  <?php if ($_SESSION['user_nivel'] == "usuario" || $_SESSION['user_nivel'] == "aluno"):?>
  <div class="row" id="sintese">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">A fazer</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Titulo do livro</td>
            <td>Sinopse</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT distinct (l.livroid) as livroid, l.titulo, l.sinopse

          FROM livro l, locacao a, livro_acervo la

          WHERE la.livroid = l.livroid 

          and a.statuslocacao = 'devolvido'

          and la.acervoid = a.acervoid

          and l.livroid not in (select livroid from sintese where userid = ".$_SESSION['user_id'].") 

          and a.userid = ".$_SESSION['user_id'];

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){

            echo" 
           <tr>      
            <td>".utf8_encode($value['titulo'])."</td>
            <td class='truncate'>".utf8_encode($value['sinopse'])."</td>";

            echo "<td><a class='btn btn-small waves-effect waves-blue green' href='sintese.php?id=".$value['livroid']."'>Fazer</a></td>";}?>

          </tr>       
        </tbody>
      </table>
    </div>

    <div class="row"></div>
    <div class="row"></div>
    <div class="divider"></div>

    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Prontas</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Titulo do livro</td>
            <td>Nome sintese</td>
            <td>Sinopse</td>
            <td>Nota</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT distinct (l.livroid), l.titulo, l.sinopse, s.sinteseid, s.nota, s.nomesi 

          FROM livro l, locacao a, livro_acervo la, sintese s

          WHERE la.livroid = l.livroid 

          and a.statuslocacao = 'devolvido'

          and la.acervoid = a.acervoid

          and la.livroid = s.livroid

          and a.userid = ".$_SESSION['user_id'];

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
            echo" 
           <tr>      
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['sinopse'])."</td>
            <td>".utf8_encode($value['nota'])."</td>
            <td><a class='btn btn-small waves-effect waves-blue blue' href='sintese.php?id=".$value['sinteseid']."'>Ver</a></td>";}?>
          </tr>       
        </tbody>
      </table>
    </div>
    <?php if ($_SESSION['user_nivel'] == "aluno"):?>
    <div class="col s6 m6 l6 xl6">
    <h5 class="center-align">Pedidas</h5>
      <table class="striped highlight">
        <thead>
          <tr>
            <td>Professor</td>
            <td>Turma</td>
            <td>Titulo do livro</td>
            <td>Data</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT distinct (p.pedidoid), t.nometur, p.nomeped, p.nomeli, u.nome, p.datalimite

          FROM usuarios u, turma t, pedido p, sintese s 

          WHERE p.turmaid = t.turmaid 

          and p.nomeli not in (select nomesi from sintese) 

          and p.turmaid = u.turmaid

          and p.datalimite >= curdate()";

          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
           echo"
          <tr>
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['nometur'])."</td>
            <td>".utf8_encode($value['nomeli'])."</td>
            <td>".utf8_encode($value['datalimite'])."</td>
            <td><a class='btn btn-small waves-effect waves-blue green' href='sinte.php?nome=".$value['nomeli']."'>Fazer</a>";}?>
          </tr>
        </tbody>
      </table>
    </div>
    <?php endif;?>
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
  <?php endif;?>

  <?php if ($_SESSION['user_nivel'] == "usuario" || $_SESSION['user_nivel'] == "aluno"):?>
  <div class="row" id="livros">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Livros locados</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Titulo</td>
            <td>Sinopse</td>
            <td>Tempo estimado</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT l.titulo, l.sinopse, lo.tempoentrega FROM livro l, livro_acervo la, locacao lo WHERE la.livroid = l.livroid and lo.statuslocacao = 'locado' and lo.acervoid = la.acervoid and lo.userid = ".$_SESSION['user_id'];
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
           echo"  <tbody>
                    <tr>
                      <td>".utf8_encode($value['titulo'])."</td>
                      <td class='truncate'>".utf8_encode($value['sinopse'])."</td>
                      <td>".$value['tempoentrega']."</td>
                    </tr>
                  </tbody>";}?>
      </table>
    </div>
    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Favoritos</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Titulo</td>
            <td>Sinopse</td>
            <td>Ações</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT l.titulo, l.sinopse, f.favoritoid, f.livroid FROM livro l, favorito f WHERE f.livroid = l.livroid and f.userid = ".$_SESSION['user_id'];
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
           echo"  <tbody>
                    <tr>
                      <td>".utf8_encode($value['titulo'])."</td>
                      <td class='truncate'>".utf8_encode($value['sinopse'])."</td>
                      <td><a class='btn btn-small waves-effect waves-blue green' href='livro.php?id=".$value['livroid']."'>Ver</a></td>
                    </tr>
                  </tbody>";}?>
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
    <div class="row"></div>
  </div>
  <?php endif;?>

<?php if ($_SESSION['user_nivel'] == "usuario" || $_SESSION['user_nivel'] == "aluno"):?>
  <div class="row" id="projetos">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Projetos</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Nome do projeto</td>
            <td>Responsavel pelo projeto</td>
            <td>hora do projeto</td>
            <td>Ações</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT pr.titulo, pr.autor, pr.horario, pr.projetoid FROM projetos pr, projeto_cadas p WHERE p.projetoid = pr.projetoid and p.userid = ".$_SESSION['user_id'];
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
            echo"  
        <tbody>
          <tr>
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['autor'])."</td>
            <td>".utf8_encode($value['horario'])."</td>
            <td><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Cancelar' href='pedido_sair.php?id=".$value['projetoid']."'><i class='material-icons'>close</i></a></a></td>";}?>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Pedidos</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Nome do pedido</td>
            <td>Nome do projeto</td>
            <td>Status do pedido</td>
            <td>Ações</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT p.nomeped, pr.titulo, p.statuspedido, pr.projetoid, p.pedidoid FROM pedido p, projetos pr WHERE p.projetoid = pr.projetoid and p.userid = ".$_SESSION['user_id'];
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
            echo"  
        <tbody>
          <tr>
            <td>".utf8_encode($value['nomeped'])."</td>
            <td>".utf8_encode($value['titulo'])."</td>
            <td>".utf8_encode($value['statuspedido'])."</td>";
            if ($value['statuspedido'] == "aceito"){
              echo "<td><a class='btn-floating btn-small green waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Aceito'><i class='material-icons'>check</i></a></a></td>";
            } elseif ($value['statuspedido'] == "negado") {
              echo "<td><a class='btn-floating btn-small blue waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Pedir novamente' href='pedido_projeto.php?id=".$value['projetoid']."'><i class='material-icons'>refresh</i></a></a></td>";
            } else{
              echo "<td><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Cancelar' href='apagar_pedido.php?id=".$value['pedidoid']."'><i class='material-icons'>close</i></a></a></td>";
            }}?>
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
    <div class="row"></div>
  </div>
  <?php endif;?>

  <?php if ($_SESSION['user_nivel'] == "administrador" || $_SESSION['user_nivel'] == "bibliotecario"):?>
  <div class="row" id="livrosadm">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">Locações</h5>
      <table class="striped highlight responsive-table">
        <thead>
          <tr class="rigth">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a class="btn-floating btn-small red tooltipped" data-position="bottom" data-tooltip="Deletar todos" href="ocult.php?id=all"><i class="material-icons">delete_forever</i></a></td>
          </tr>
          <tr>
            <td>Usuario</td>
            <td>Titulo</td>
            <td>Sinopse</td>
            <td>Data da reserva</td>
            <td>Data prevista entrega</td>
            <td>Data devolução</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
        <?php 
          $sql = "SELECT l.titulo, l.sinopse, lo.tempoentrega, la.acervoid, u.nome, lo.statuslocacao, lo.datalocacao, lo.locaid, lo.dataentrega FROM livro l, livro_acervo la, locacao lo, usuarios u WHERE la.livroid = l.livroid and lo.acervoid = la.acervoid and u.userid = lo.userid and lo.hide = '0' ";
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
           echo"
                    <tr>
                      <td for=".$value['locaid'].">".utf8_encode($value['nome'])."</td>
                      <td>".utf8_encode($value['titulo'])."</td>
                      <td class='truncate'>".utf8_encode($value['sinopse'])."</td>
                      <td>".$value['datalocacao']."</td>
                      <td>".$value['tempoentrega']."</td>
                      <td>".$value['dataentrega']."</td>";
                     
            if(in_array("locado", $value)){
              echo '<td><a class="btn-floating btn-small red waves-effect waves-blue tooltipped" data-position="bottom" data-tooltip="Devolver" href="devolucao.php?id='.$value['acervoid'].'"><i class="material-icons">
keyboard_backspace
</i></a></td>';
            } else{
              echo '<td><a class="btn-floating btn-small red waves-effect waves-blue" href="ocult.php?id='.$value['locaid'].'"><i class="material-icons">delete</i></a></td>';}}?>

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
    <div class="row"></div>
  </div>
  <?php endif;?>

  <?php if ($_SESSION['user_nivel'] == "administrador" || $_SESSION['user_nivel'] == "bibliotecario"):?>
  <div class="row" id="pedidosadm">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">Pedidos</h5>
      <table class="striped highlight responsive-table">
        <thead>
          <tr class="rigth">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td>Usuario</td>
            <td>Turma</td>
            <td>Nome</td>
            <td>Status do pedido</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>

        <?php 
          $sql = "SELECT u.nome, t.nometur, p.nomeped, p.pedidoid, p.statuspedido FROM usuarios u, turma t, pedido p WHERE u.userid = p.userid and u.turmaid = t.turmaid and p.statuspedido = 'espera' and p.nomeped <> 'Sintese do livro'";

          $stmt = DB::prepare($sql);

          $stmt ->execute();

          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){

            echo"

          <tr>
            <td>".utf8_encode($value['nome'])."</td>
            <td>".utf8_encode($value['nometur'])."</td>
            <td>".utf8_encode($value['nomeped'])."</td>
            <td>".utf8_encode($value['statuspedido'])."</td>";

            if ($value['nomeped'] == "Sair do projeto"){
              echo "<td><a class='btn-floating btn-small waves-effect waves-blue green tooltipped' data-position='bottom' data-tooltip='Aceitar' href='aceitar_saida.php?id=".$value['pedidoid']."'><i class='material-icons'>check</i></a><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Negar' href='negar_pedido.php?id=".$value['pedidoid']."''><i class='material-icons'>close</i></a></td>";
            }else {
              echo "<td><a class='btn-floating btn-small waves-effect waves-blue green tooltipped' data-position='bottom' data-tooltip='Aceitar' href='aceitar_pedido.php?id=".$value['pedidoid']."''><i class='material-icons'>check</i></a><a class='btn-floating btn-small red waves-effect waves-blue tooltipped' data-position='bottom' data-tooltip='Negar' href='negar_pedido.php?id=".$value['pedidoid']."''><i class='material-icons'>close</i></a></td>";
            }}?>

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
    <div class="row"></div>
  </div>
  <?php endif;?>

  <?php if ($_SESSION['user_nivel'] == "professor"):?>
  <div class="row" id="turma">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s12 m12 l12 xl12">
      <h5 class="center-align">Turma</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Matricula</td>
            <td>Turma</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT u.nome, u.email, u.matricula, t.nometur FROM usuarios u, turma t WHERE u.turmaid = t.turmaid and t.turmaid = ".$_SESSION['user_turma'];
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
           echo"  <tbody>
                    <tr>
                      <td>".utf8_encode($value['nome'])."</td>
                      <td>".utf8_encode($value['email'])."</td>
                      <td>".utf8_encode($value['matricula'])."</td>
                      <td>".utf8_encode($value['nometur'])."</td>
                    </tr>
                  </tbody>";}?>
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
    <div class="row"></div>
  </div>
  <?php endif;?>

  <?php if ($_SESSION['user_nivel'] == "professor"):?>
  <div class="row" id="sintesepr">
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>
    <div class="row"></div>

    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Pedido de sintese</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Pedido</td>
            <td>livro</td>
            <td>Tempo estimado</td>
            <td>Ações</td>
          </tr>
        </thead>
        <tbody>
          <form action="pedido_sintese.php" method="post">
          <tr>
            <td>Sintese do livro</td>
            <td>
              <div class='input-field col s8'>
                <input id="nomeli" type="text" name="nomeli">
                <label for="nomeli">Livro</label>
              </div>
            </td>
            <div class='input-field col s4'>
            <td><input type="date" name="datalimite" id="datalimite"/></td>
            </div>
            <td><button type="submit" class="btn green btn-small waves-effect waves-blue">Pedir</button></td>
          </tr>
          </form>
        </tbody>
      </table>
    </div>
    <div class="col s6 m6 l6 xl6">
      <h5 class="center-align">Pedidos</h5>
      <table  class="striped highlight">
        <thead>
          <tr>
            <td>Livro</td>
            <td>Aluno</td>
            <td>Nome da sintese</td>
            <td>Ações</td>
          </tr>
        </thead>
        <?php 
          $sql = "SELECT u.nome, s.nomesi, s.sinteseid, p.nomeli
          FROM pedido p, sintese s, usuarios u
          WHERE p.userid = ".$_SESSION['user_id']."
          and p.turmaid = u.turmaid
          and p.nomeli in (select nomesi from sintese)
          and s.statussintese = 'pronto'
          and p.nomeped = 'Sintese do livro'";
          $stmt = DB::prepare($sql);
          $stmt ->execute();
          foreach ($stmt->fetchALL(PDO::FETCH_ASSOC) as $value){
          
           echo"  <tbody>
                    <tr>
                      <td>".utf8_encode($value['nomeli'])."</td>
                      <td>".utf8_encode($value['nome'])."</td>
                      <td>".utf8_encode($value['nomesi'])."</td>
                      <td><a class='btn green btn-small waves-effect waves-blue' href='ver_sintese.php?id=".utf8_encode($value['sinteseid'])."'>Ver</a></td>
                    </tr>
                  </tbody>";}?>
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
    <div class="row"></div>
  </div>
  <?php endif;?>

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

$(function () {
  $('.modal-trigger').leanModal({
    ready: function () {
    $('ul.tabs').tabs();
    }});
});

$(document).ready(function(){
  $('.modal').modal();
});

function mensagem(message, duration) {
  Materialize.toast(message, duration);
}

$(document).ready(function(){
    $('.tooltipped').tooltip();
  });

  $(document).ready(function() {
    $('select').material_select();
});
</script>

  </body>
</html>