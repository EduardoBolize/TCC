<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_matricula_evento = $_GET['cd'];

		//Verifica se o código é válido
		$sql_matricula_evento = "SELECT * from tb_matricula_evento where cd_matricula_evento = $cd_matricula_evento";
		$query_matricula_evento = $mysqli->query($sql_matricula_evento);

		if($query_matricula_evento->num_rows > 0){

			$row = $query_matricula_evento->fetch_object();

			if($row->st_matricula_evento == 0){
				$sql_up = "UPDATE tb_matricula_evento set st_matricula_evento = 1 where cd_matricula_evento = $cd_matricula_evento";
				$msg = "A presença foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_matricula_evento set st_matricula_evento = 0 where cd_matricula_evento = $cd_matricula_evento";
				$msg = "A presença foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_matricula_evento.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa presença!","../administrador/crud_matricula_evento.php");
			}

		}else{
			redirect("Não existe o código da presença!","../administrador/crud_matricula_evento.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_matricula_evento.php");
	}
