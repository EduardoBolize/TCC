<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_admin = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_admin = "SELECT * from tb_admin where cd_admin = $cd_admin";
		$query_admin = $mysqli->query($sql_admin);

		if($query_admin->num_rows > 0){

			$row = $query_admin->fetch_object();

			if($row->st_admin == 0){
				$sql_up = "UPDATE tb_admin set st_admin = 1 where cd_admin = $cd_admin";
				$msg = "O administrador foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_admin set st_admin = 0 where cd_admin = $cd_admin";
				$msg = "O administrador foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('Location:../administrador/crud_admin.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse administrador!","../administrador/crud_admin.php");
			}

		}else{
			redirect("Não existe esse código de administrador!","../administrador/crud_admin.php");
		}

	}else{
		redirect("Caso deseje utilar essa página, selecione um administrador para inativa-lo!","../administrador/crud_admin.php");
	}
