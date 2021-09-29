<meta charset="utf-8">
<?php

	include('util.php');

	//Função de logout
    function logout(){

    	session_start();
		session_unset();
		session_destroy();
		//redirect('Logout efetuado com sucesso!','../index.php');
		header_loc("/index.php");
	}