<meta charset="utf-8">
<?php

	include_once('../functions/cadastrar_login.php');
	include_once('../functions/util.php');

	if(isset($_POST['nm_professor']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone']) and isset($_POST['nr_telefone2']) and isset($_POST['nr_cpf']) and isset($_POST['tx_email']) and isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		$nm_professor = $_POST['nm_professor'];
		$nr_cpf = $_POST['nr_cpf'];
		$nr_telefone = $_POST['nr_telefone'];
		$nr_telefone2 = $_POST['nr_telefone2'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$tx_email = $_POST['tx_email'];
		$tx_login = $_POST['tx_login'];
		$tx_pass = $_POST['tx_pass'];

		//Cadastra o login
		$cd_login = cadastrar_login($tx_login,$tx_pass);

		//Cadastra o professor
		$sql = "INSERT into tb_professor values (null,'$nm_professor',1,'$nr_cpf','$nr_telefone','$nr_telefone2','$ds_endereco','$ds_cidade','$tx_email',0,1,$cd_login)";
		//echo $sql;

		if($mysqli->query($sql)){
			//redirect("O cadastro foi efetuado com sucesso!","");
			header('Location:../administrador/crud_professor.php');
		}else{
			redirect("O cadastro não pôde ser efetuado!","../administrador/crud_professor.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_professor.php");
	}
