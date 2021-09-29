<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_matricula']) and isset($_POST['id_turma'])){

		$id_matricula = $_POST['id_matricula'];
		$id_turma = $_POST['id_turma'];

		//Verifica se o código da matricula é valido
		$sql_verif_m = "SELECT * from tb_matricula where cd_matricula = $cd_matricula";
		$query_verif_m = $mysqli->query($sql_verif_m);

		if($query_verif_m->num_rows > 0){

		}else{
			redirect("Essa matricula não existe!!");
		}

		//Verifica se o código da turma é válido
		$sql_verif_t = "SELECT * from tb_turma where cd_turma = $id_turma";
		$query_verif_t = $mysqli->query($sql_verif_t);

		if($query_verif_t->num_rows > 0){

		}else{
			redirect("O código da turma selecionada não existe!!");
		}

		//Inserir a matricula na turma
		$insert_tm = "INSERT into tb_turma_matricula values (null,'0000-00-00',1,$id_matricula, $id_turma)";

		if($mysqli->query($insert_tm)){
			/*Caso cadastre*/
			//redirect("O cadastro da matricula foi efetuado com sucesso","");
			header("Location:../administrador/editar_turma.php?cd=$id_turma");
		}else{
			/*Caso não cadastre*/
			redirect("Não foi possível efetar este cadastro!","../administrador/crud_turma.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_turma.php");
	}
