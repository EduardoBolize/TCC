<?php
	
	include_once('../functions/login.php');
	//include_once('../functions/util.php');

	//Redireciona junto de uma mensagem (JS)
	function redirect($alert,$pag){

		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.location = '".$pag."';";
		echo "</script>";

	}
	function header_loc($pag){

		echo "<script>";
		echo "window.location = '".$pag."';";
		echo "</script>";

	}

	if(isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		if(isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

			$tx_login = $_POST['tx_login'];
			$tx_pass = $_POST['tx_pass'];

			login($tx_login,$tx_pass);

		}else{
			redirect("Preencha todas as informações do formulário!","../index.php");
		}
	}else{
		redirect("Preencha todas as informações do formulário!","../index.php");
	}