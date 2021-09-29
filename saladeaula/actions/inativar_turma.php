<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_turma = $_GET['cd'];

		//Verifica se o código é válido
		$sql_turma = "SELECT * from tb_turma where cd_turma = $cd_turma";
		$query_turma = $mysqli->query($sql_turma);

		if($query_turma->num_rows > 0){

			$row = $query_turma->fetch_object();

			if($row->st_turma == 0){
				$sql_up = "UPDATE tb_turma set st_turma = 1 where cd_turma = $cd_turma";
				$msg = "A turma foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_turma set st_turma = 0 where cd_turma = $cd_turma";
				$msg = "A turma foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../administrador/crud_turma.php ');
			}else{
				redirect("Ocorreu um problema ao inativar essa turma!","../administrador/crud_turma.php");
			}

		}else{
			redirect("Não existe esse código da turma!","../administrador/crud_turma.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_turma.php");
	}
