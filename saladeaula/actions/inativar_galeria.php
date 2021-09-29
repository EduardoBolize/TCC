<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_galeria = $_GET['cd'];

		//Verifica os dados da galeria
		$sql_galeria = "SELECT * from tb_galeria where cd_galeria = $cd_galeria";
		$query_galeria = $mysqli->query($sql_galeria);

		if($query_galeria->num_rows > 0){

			$row = $query_galeria->fetch_object();

			if($row->st_galeria == 0){
				$sql_up = "UPDATE tb_galeria set st_galeria = 1 where cd_galeria = $cd_galeria";
				$msg = "A galeria foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_galeria set st_galeria = 0 where cd_galeria = $cd_galeria";
				$msg = "A galeria foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_galeria.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa galeria!","../administrador/crud_galeria.php");
			}

		}else{
			redirect("Não existe esse código de galeria!","../administrador/crud_galeria.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_galeria.php");
	}
