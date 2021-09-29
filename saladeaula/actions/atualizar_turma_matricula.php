<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_matricula']) and isset($_POST['id_turma']) and isset($_POST['cd_turma_matricula'])){

		$id_matricula = $_POST['id_matricula'];
		$id_turma = $_POST['id_turma'];
		$cd_turma_matricula = $_POST['cd_turma_matricula'];

		//Verifica se o código da turma_matricula é válido
		$sql_verif_tm = "SELECT * from tb_turma_matricula where cd_turma_matricula = $cd_turma_matricula";
		$query_verif_tm = $mysqli->query($sql_verif_tm);

		if($query_verif_tm->num_rows > 0){

		}else{
			redirect("O código dessa turma_matricula não existe!!","../administrador/crud_turma_matricula.php");
		}

		//Verifica se o código da matricula é válido
		$sql_verif_t = "SELECT * from tb_matricula where cd_matricula = $id_matricula";
		$query_verif_t = $mysqli->query($sql_verif_t);

		if($query_verif_t->num_rows > 0){

		}else{
			redirect("O código da matricula não existe!!","../administrador/crud_turma_matricula.php");
		}

		//Verifica se o código da turma é válido
		$sql_verif_t = "SELECT * from tb_turma where cd_turma = $id_turma";
		$query_verif_t = $mysqli->query($sql_verif_t);

		if($query_verif_t->num_rows > 0){

		}else{
			redirect("O código da turma selecionada não existe!!","../administrador/crud_turma_matricula.php");
		}

		//Faz as alterações e tenta enviar
		$update_tm = "UPDATE tb_turma_matricula set id_matricula = $id_matricula, id_turma = $id_turma, st_turma_matricula = 1 where cd_turma_matricula = $cd_turma_matricula";
		if($mysqli->query($update_tm)){
			/*Se executar*/
			//redirect("Seu registro de turma_matricula foi alterado com sucesso!","");
			header('Location:../administrador/crud_turma_matricula.php');
		}else{
			/*Se não executar*/
			redirect("Seu registro de turma_matricula não pôde ser alterado","../administrador/crud_turma_matricula.php");
		}
		

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_turma_matricula.php");
	}
