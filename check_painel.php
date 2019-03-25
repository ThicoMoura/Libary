<?php

   if (isset($_SESSION['user_nivel']) == "administrador")
   {
       header('Location: index_admin.php');
   }

?>