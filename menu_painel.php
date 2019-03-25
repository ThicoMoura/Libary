<nav class="nav-extended <?php echo $_SESSION['user_menu'] ?>">


  
    <!--Menu superior-->
    <div class="nav-wrapper" id="teste1">
        <a href="#" data-activates="mobile-demo" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
        <a href="index.php" class="brand-logo">Biblioteca Vilmar</a>
      <ul class="right">
        <li><a href="configuracoes.php">Configurações</a></li>
        <li><a class="right modal-trigger" href="cores.php">Cores</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
      
      <!--Menu Lateral -->

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
                      <li><a class="waves-effect waves-blue" href="cadastro_usuarios.php">Usuarios</a></li>
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
                      <li><a class="waves-effect waves-blue" href="arquivo_turma.php">Turmas</a></li>
                      <li><a class="waves-effect waves-blue" href="arquivo_usuarios.php">Usuarios</a></li>
                      <li><a class="waves-effect waves-blue" href="logs.php">Logs</a></li>
                  <li><div class="divider"></div></li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
      </ul>
      
    </div>
