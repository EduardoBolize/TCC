<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_turma_matricula = $_GET['cd'];

		//Verifica se o código da turma_matricula é válido
		$sql_turma_matricula = "SELECT * from tb_turma_matricula where cd_turma_matricula = $cd_turma_matricula";
		$query_turma_matricula = $mysqli->query($sql_turma_matricula);

		if($query_turma_matricula->num_rows > 0){

			$row = $query_turma_matricula->fetch_object();

			$sql_del = "DELETE from tb_turma_matricula where cd_turma_matricula = $cd_turma_matricula";

			if($query_del = $mysqli->query($sql_del)){
				//redirect("Sua resposta foi excluida com sucesso!","");
				header('Location:../administrador/editar_turma.php?cd='.$row->id_turma);
			}else{
				redirect("Ocorreu um problema ao excluir o aluno!","../administrador/editar_turma.php?cd=$row->id_turma");
			}

		}else{
			redirect("Não existe esse código de aluno!","../administrador/crud_turma.php");
        }

	}else{
		redirect("Caso deseje utilar essa página, selecione um aluno para excluir!","../administrador/crud_turma.php");
	}
