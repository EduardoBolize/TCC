<meta charset="utf-8">
<?php

	include_once('util.php');
	include_once('encriptar.php');	//Função de encriptar senha

	function cadastrar_login($tx_login,$tx_pass){

		$mysqli = db_connect();
		
		$pass_e = encriptar_senha($tx_pass);	//Encripta a senha digitada

		//Cadastro do Login
		$sql_login = "INSERT into tb_login values (null,'$tx_login','$pass_e')";

		//Execução do cadastro
		if($mysqli->query($sql_login)){

			//Caso executado, consulta o cd do login
			$sql = "SELECT * from tb_login where tx_login = '$tx_login' and tx_pass = '$pass_e'";
			$query = $mysqli->query($sql);

			$row = $query->fetch_object();

			//Retorna o cd_login
			return $row->cd_login;

		}else{
			//Caso não executado
			return 0;
		}

	}