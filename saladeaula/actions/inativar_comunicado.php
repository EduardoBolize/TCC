<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_comunicado = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_comunicado = "SELECT * from tb_comunicado where cd_comunicado = $cd_comunicado";
		$query_comunicado = $mysqli->query($sql_comunicado);

		if($query_comunicado->num_rows > 0){

			$row = $query_comunicado->fetch_object();

			if($row->st_comunicado == 0){
				$sql_up = "UPDATE tb_comunicado set st_comunicado = 1 where cd_comunicado = $cd_comunicado";
				$msg = "O comunicado foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_comunicado set st_comunicado = 0 where cd_comunicado = $cd_comunicado";
				$msg = "O comunicado foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../professor/crud_comunicado.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse comunicado!","../professor/crud_comunicado.php");
			}

		}else{
			redirect("Não existe esse código do comunicado!","../professor/crud_comunicado.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../professor/crud_comunicado.php");
	}
