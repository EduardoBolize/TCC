<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_turma_matricula = $_GET['cd'];

		//Validar se o código existe
		$sql_valid_tm = "SELECT * from tb_turma_matricula where cd_turma_matricula = $cd_turma_matricula";
		$query_valid_tm = $mysqli->query($sql_valid_tm);

		if($query_valid_tm->num_rows > 0){

			/*Caso for um código válido*/

			$row_valid = $query_valid_tm->fetch_object();

			//Verifica o status atual
			if($row_valid_tm->st_turma_matricula == '0'){
				$update_tm = "UPDATE tb_turma_matricula set st_turma_matricula = 1 where cd_turma_matricula = $cd_turma_matricula";
			}else if($row_valid_tm->st_turma_matricula == '1'){
				$update_tm = "UPDATE tb_turma_matricula set st_turma_matricula = 0 where cd_turma_matricula = $cd_turma_matricula";
			}

			//Faz a alteração
			if($mysqli->query($update_tm)){
				/*Se ele alterar*/
				//redirect("O status dessa 'turma_matricula' foi alterado","");
				header('location:../administrador/editar_turma.php?cd='.$row_valid->id_turma);
			}else{
				/*Se ele não alterar*/
				redirect("Não foi possivel alterar o status do aluno!","../administrador/editar_turma.php?cd=$row_valid->id_turma");
			}

		}else{
			/*Caso for um código inválido*/
			redirect("O código desse aluno não existe!!","../administrador/crud_turma.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_turma.php");
	}
