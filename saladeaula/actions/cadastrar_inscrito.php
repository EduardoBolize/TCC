<?php

	include_once('../functions/encriptar.php');		//Função de encriptar senha
	include_once('../functions/util.php');
	include_once('../functions/cadastrar_login.php');

    if(isset($_POST['nm_inscrito']) and isset($_POST['nr_cpf']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone1']) and isset($_POST['nr_telefone2']) and isset($_POST['tx_email']) and isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		$nm_inscrito= $_POST['nm_inscrito'];
		$nr_cpf = $_POST['nr_cpf'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone1= $_POST['nr_telefone1'];
		$nr_telefone2= $_POST['nr_telefone2'];
		$tx_email = $_POST['tx_email'];
		$tx_login = $_POST['tx_login'];
		$tx_pass = $_POST['tx_pass'];

      	//Cadastra o login
      	$cd_login = cadastrar_login($tx_login,$tx_pass);

      	date_default_timezone_set("America/Sao_Paulo");
  		$date = date('Y-m-d');

      	$sql="INSERT into tb_inscrito values(null, '$nm_inscrito', '$nr_cpf', '$ds_endereco', '$ds_cidade', '$nr_telefone1', '$nr_telefone2', '$tx_email', 0, 1, '$cd_login')";
		//echo $sql;

      	if($mysqli->query($sql)){
        	header("location: ../administrador/crud_inscrito.php");
  		}else{
  			redirect("Não foi possível efetuar o cadastro","../administrador/crud_inscrito.php");
  		}

    }else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_inscrito.php");
	}
