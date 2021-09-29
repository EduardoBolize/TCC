<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_matricula = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_matricula = "SELECT * from tb_matricula where cd_matricula = $cd_matricula";
		$query_matricula = $mysqli->query($sql_matricula);

		if($query_matricula->num_rows > 0){

			$row = $query_matricula->fetch_object();

			if($row->st_matricula == 0){
				$sql_up = "UPDATE tb_matricula set st_matricula = 1 where cd_matricula = $cd_matricula";
				$msg = "O aluno foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_matricula set st_matricula = 0 where cd_matricula = $cd_matricula";
				$msg = "O aluno foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('Location:../administrador/crud_aluno.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse aluno!","../administrador/crud_aluno.php");
			}

		}else{
			redirect("Não existe esse código de aluno!","../administrador/crud_aluno.php");
		}

	}else{
		redirect("Caso deseje utilar essa página, selecione um aluno para inativa-lo!","../administrador/crud_aluno.php");
	}
