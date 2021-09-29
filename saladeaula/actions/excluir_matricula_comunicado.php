<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['aluno']) and isset($_GET['comunicado'])){
		$aluno = $_GET['aluno'];
		$comunicado = $_GET['comunicado'];

		//Cadastro do matricula_comunicado
		$sql = "DELETE from tb_matricula_comunicado where id_matricula = $aluno and id_comunicado = $comunicado";

		if($mysqli->query($sql)){
			//caso cadastre
			header('Location:../professor/mandar_matricula_comunicado.php?cd='.$comunicado);
		}else{
			redirect("Erro ao deletar!","../professor/mandar_matricula_comunicado.php?cd=$comunicado");
		}

	}
	else{
		redirect("Por favor, forneça um aluno ou counicado!","../professor/mandar_matricula_comunicado.php");
	}