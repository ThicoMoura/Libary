<!--carregar a função isLoggedIn()-->
<?php require_once 'funcao.php';?>

<!--Links css-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/paralex.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css"  media="screen,projection"/>


  <nav class="nav">
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Biblioteca Vilmar</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if (isLoggedIn()): ?>
          <li><a href="logout.php" class="right"><i class="fas fa-sign-out-alt right"></i></a><a href="panel.php" class="right"><i class="fas fa-user"></i></a><a class="right">Olá, <?php echo $_SESSION['user_login']; ?></a></li>
        <?php else: ?>
          <li><a class="right" href="cadastro_user.php">Increva-se</a></li>
          <li><a class="right" href="login_user.php">Entrar</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  