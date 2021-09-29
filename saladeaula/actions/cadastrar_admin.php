<meta charset="utf-8">
<?php

	include_once('../functions/cadastrar_login.php');
	include_once('../functions/util.php');

	if(isset($_POST['nm_admin']) and isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		$nm_admin = $_POST['nm_admin'];
		$tx_login = $_POST['tx_login'];
		$tx_pass = $_POST['tx_pass'];

		//Cadastra o login
		$cd_login = cadastrar_login($tx_login,$tx_pass);

		//Cadastro dos dados do admin
		$sql_admin = "INSERT into tb_admin values (null,'$nm_admin',1,$cd_login,1)";

		if($mysqli->query($sql_admin)){
			//redirect("O administrador foi cadastrado com sucesso!","");
			header('Location:../administrador/crud_admin.php');
		}else{
			redirect("Não foi possível cadastrar o administrador","../administrador/crud_admin.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_admin.php");
	}
