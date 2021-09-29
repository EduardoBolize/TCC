<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_feedback = $_GET['cd'];

		//Inativação do feedback
		$sql_feedback = "SELECT * from tb_feedback where cd_feedback = $cd_feedback";
		$query_feedback = $mysqli->query($sql_feedback);

		if($query_feedback->num_rows > 0){

			$row = $query_feedback->fetch_object();

			if($row->st_feedback == 0){
				$sql_up = "UPDATE tb_feedback set st_feedback = 1 where cd_feedback = $cd_feedback";
				$msg = "O feedback foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_feedback set st_feedback = 0 where cd_feedback = $cd_feedback";
				$msg = "O feedback foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../professor/crud_feedback.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse feedback!","../professor/crud_feedback.php");
			}

		}else{
			redirect("Não existe esse código do feedback!","../professor/crud_feedback.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../professor/crud_feedback.php");
	}
