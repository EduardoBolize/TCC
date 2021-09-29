<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_matricula']) and isset($_POST['id_comunicado'])){
		$aluno = $_POST['id_matricula'];
		$comunicado = $_POST['id_comunicado'];

		$partes = explode(' - ',$aluno);
		$aluno = $partes[0];
		//Cadastro do aluno_comunicado
		$sql = "INSERT into tb_matricula_comunicado values (null, $aluno, $comunicado)";
		echo $sql;

		if($mysqli->query($sql)){
			//Caso cadastre
			//redirect("Seu cadastro foi feito com sucesso","");
			header('Location:../professor/crud_matricula_comunicado.php');
		}else{
			//Caso não cadastre
			redirect("Seu cadastro não pode ser efetuado!","../professor/crud_matricula_comunicado.php");
		}

	}else if(isset($_GET['aluno']) and isset($_GET['comunicado'])){
		$aluno = $_GET['aluno'];
		$comunicado = $_GET['comunicado'];

		//cadastro da matricula_comunicado
		$sql = "INSERT into tb_matricula_comunicado values(null, $aluno, $comunicado)";
		if($mysqli->query($sql)){
			//Se cadastrar
			header('Location:../professor/mandar_matricula_comunicado.php?cd='.$comunicado);
		}else{
			redirect("Seu cadastro não pôde ser efetuado","../professor/mandar_matricula_comunicado.php?cd=$comunicado");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../professor/cadastro_matricula_comunicado.php");
	}