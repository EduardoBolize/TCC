<meta charset="utf-8">
<?php

	include_once('../functions/cadastrar_login.php');
	include_once('../functions/util.php');

	if(isset($_POST['nm_matricula']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone']) and isset($_POST['nr_telefone2']) and isset($_POST['nr_cpf']) and isset($_POST['dt_matricula']) and isset($_POST['tx_email']) and isset($_POST['nr_rg']) and isset($_POST['nm_sexo']) and isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		$nm_matricula = $_POST['nm_matricula'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone = $_POST['nr_telefone'];
		$nr_telefone2 = $_POST['nr_telefone2'];
		$nr_cpf = $_POST['nr_cpf'];
		$dt_matricula = $_POST['dt_matricula'];
		$tx_email = $_POST['tx_email'];
		$tx_login = $_POST['tx_login'];
		$tx_pass = $_POST['tx_pass'];
		$nr_rg = $_POST['nr_rg'];
		$nm_sexo = $_POST['nm_sexo'];

		$mysqli = db_connect();

		//Formatar Data
		$date =  formatar_para_date($dt_matricula);

		//Cadastra o login
		$cd_login = cadastrar_login($tx_login,$tx_pass);

		//Cadastra a matricula do aluno
		$sql = "INSERT into tb_matricula values (null,'$nm_matricula','$ds_endereco','$ds_cidade','$nr_telefone','$nr_telefone2','$nr_cpf','$date',1,'$tx_email',0,$cd_login,'$nr_rg','$nm_sexo')";

		if($mysqli->query($sql)){
			//redirect("Sua matricula foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_aluno.php');
		}else{
			redirect("Não foi possível cadastrar a matricula","../administrador/crud_aluno.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_aluno.php");
	}
