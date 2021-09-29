<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['turma']) and isset($_GET['comunicado'])){
		$turma = $_GET['turma'];
		$comunicado = $_GET['comunicado'];

		//Cadastro do turma_comunicado
		$sql = "DELETE from tb_turma_comunicado where id_turma = $turma and id_comunicado = $comunicado";

		if($mysqli->query($sql)){
			//caso cadastre
			header('Location:../professor/mandar_turma_comunicado.php?cd='.$comunicado);
		}else{
			redirect("Erro ao deletar!","../professor/mandar_turma_comunicado.php");
		}

	}
	else{
		redirect("Por favor, forneça uma turma ou counicado!","../professor/mandar_turma_comunicado.php");
	}