<?php

 	/**
	 * Verifica se o usuário está logado
	 */
	function isLoggedIn()
	{
    	if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
    {
        return false;
    }
 
    	return true;    
}

//verifico se o usuario esta logado
if (!isLoggedIn())
{
    header('Location: index.php?mensagem=usuario-nao-logado');
}