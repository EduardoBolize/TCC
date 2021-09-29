<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_tarefa = $_GET['cd'];

		//Verifica se o código é válido
		$sql_tarefa = "SELECT * from tb_tarefa where cd_tarefa = $cd_tarefa";
		$query_tarefa = $mysqli->query($sql_tarefa);

		if($query_tarefa->num_rows > 0){

			$row = $query_tarefa->fetch_object();

			if($row->st_tarefa == 0){
				$sql_up = "UPDATE tb_tarefa set st_tarefa = 1 where cd_tarefa = $cd_tarefa";
				$msg = "A tarefa foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_tarefa set st_tarefa = 0 where cd_tarefa = $cd_tarefa";
				$msg = "A tarefa foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../professor/crud_tarefa.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa tarefa!","../professor/crud_tarefa.php");
			}

		}else{
			redirect("Não existe esse código da tarefa!","../professor/crud_tarefa.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../professor/crud_tarefa.php");
	}
