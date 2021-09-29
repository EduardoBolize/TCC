<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_turma']) and isset($_POST['id_comunicado'])){
		$turma = $_POST['id_turma'];
		$comunicado = $_POST['id_comunicado'];
		
		//Cadastro do turma_comunicado
		$sql = "INSERT into tb_turma_comunicado values (null, $turma, $comunicado)";

		if($mysqli->query($sql)){
			//Caso cadastre
			header('Location:../professor/crud_turma_comunicado.php');
		}else{
			//Caso não cadastre
			redirect("Seu cadastro não pôde ser efetuado!","../professor/crud_turma_comunicado.php");
		}

	}else if(isset($_GET['turma']) and isset($_GET['comunicado'])){
		$turma = $_GET['turma'];
		$comunicado = $_GET['comunicado'];

		//Cadastro do turma_comunicado
		$sql = "INSERT into tb_turma_comunicado values (null, $turma, $comunicado)";

		if($mysqli->query($sql)){
			//caso cadastre
			header('Location:../professor/mandar_turma_comunicado.php?cd='.$comunicado);
		}else{
			redirect("Seu cadastro não pôde ser efetuado","../professor/mandar_turma_comunicado.php?cd=$comunicado");
		}

	}
	else{
		redirect("Por favor, preencha o formulário!","../professor/cadastro_turma_comunicado.php");
	}