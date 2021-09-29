<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_sala = $_GET['cd'];

		//Valida se o código da sala é válido
		$sql_sala = "SELECT * from tb_sala where cd_sala = $cd_sala";
		$query_sala = $mysqli->query($sql_sala);

		if($query_sala->num_rows > 0){

			$row = $query_sala->fetch_object();

			if($row->st_sala == 0){
				$sql_up = "UPDATE tb_sala set st_sala = 1 where cd_sala = $cd_sala";
				$msg = "A sala foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_sala set st_sala = 0 where cd_sala = $cd_sala";
				$msg = "A sala foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../administrador/crud_sala.php ');
			}else{
				redirect("Ocorreu um problema ao inativar essa sala!","../administrador/crud_sala.php");
			}

		}else{
			redirect("Não existe esse código da sala!","../administrador/crud_sala.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_sala.php");
	}
