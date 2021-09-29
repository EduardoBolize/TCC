<?php

	include('../functions/util.php');

	//session_start();
	session_unset();
	session_destroy();
	//redirect('Logout efetuado com sucesso!','../index.php');
	header_loc("/saladeaula/index.php");