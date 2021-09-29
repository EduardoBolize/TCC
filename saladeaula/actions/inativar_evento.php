<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_evento = $_GET['cd'];

		//Verifica os dados do evento
		$sql_evento = "SELECT * from tb_evento where cd_evento = $cd_evento";
		$query_evento = $mysqli->query($sql_evento);

		if($query_evento->num_rows > 0){

			$row = $query_evento->fetch_object();

			if($row->st_evento == 0){
				$sql_up = "UPDATE tb_evento set st_evento = 1 where cd_evento = $cd_evento";
				$msg = "O evento foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_evento set st_evento = 0 where cd_evento = $cd_evento";
				$msg = "O evento foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_evento.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse evento!","../administrador/crud_evento.php");
			}

		}else{
			redirect("Não existe esse código de evento!","../administrador/crud_evento.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_evento.php");
	}
