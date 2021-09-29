<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd']) and isset($_GET['cd_professor']) and !empty($_GET['cd_professor'])){
		$cd = $_GET['cd'];
		$cd_professor = $_GET['cd_professor'];

		//Cadastro do professor_sala_materia
		$sql = "DELETE from tb_professor_sala_materia where cd_professor_sala_materia = $cd";

		echo $sql;

		if($mysqli->query($sql)){
			//caso exclua
			header('Location:../administrador/editar_encargo.php?cd='.$cd_professor);
		}else{
			redirect("Erro ao deletar!","../administrador/editar_encargo.php?cd=$cd_professor");
		}

	}
	else{
		redirect("Por favor, forneça um aluno ou counicado!","../administrador/editar_encargo.php");
	}