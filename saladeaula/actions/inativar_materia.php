<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_materia = $_GET['cd'];

		//Verifica se o código é válido
		$sql_materia = "SELECT * from tb_materia where cd_materia = $cd_materia";
		$query_materia = $mysqli->query($sql_materia);

		if($query_materia->num_rows > 0){

			$row = $query_materia->fetch_object();

			if($row->st_materia == 0){
				$sql_up = "UPDATE tb_materia set st_materia = 1 where cd_materia = $cd_materia";
				$msg = "A materia foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_materia set st_materia = 0 where cd_materia = $cd_materia";
				$msg = "A materia foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_materia.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa materia!","../administrador/crud_materia.php");
			}

		}else{
			redirect("Não existe o código da materia!","../administrador/crud_materia.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_materia.php");
	}
