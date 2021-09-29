<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['dt_turma']) and isset($_POST['id_sala'])){

		$dt_turma = $_POST['dt_turma'];
		$id_sala = $_POST['id_sala'];

		//Formatação da data
		$date = formatar_para_date($dt_turma);

		//Cadastra o curso
		$sql = "INSERT into tb_turma values (null,'$date','$id_sala',1)";
		//echo $sql;

		if($mysqli->query($sql)){
			/* Caso cadastre */
			//redirect("Sua turma foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_turma.php');

		}else{
			/* Caso não cadastre */
			redirect("Ocorreu um erro ao cadastrar uma nova turma!","../administrador/crud_turma.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_turma.php");
	}
