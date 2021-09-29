<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_sala_materia = $_GET['cd'];

		//Verifica se o código da sala_materia é válida
		$sql_sala_materia = "SELECT * from tb_sala_materia where cd_sala_materia = $cd_sala_materia";
		$query_sala_materia = $mysqli->query($sql_sala_materia);

		if($query_sala_materia->num_rows > 0){

			$row = $query_sala_materia->fetch_object();

			$sql_del = "DELETE from tb_sala_materia where cd_sala_materia = $cd_sala_materia";

			if($query_del = $mysqli->query($sql_del)){
				//redirect("Sua resposta foi excluida com sucesso!","");
				header('Location:../administrador/editar_sala.php?cd='.$row->id_sala);
			}else{
				redirect("Ocorreu um problema ao excluir a matéria!","../administrador/editar_sala.php?cd=$row->id_sala");
			}

		}else{
			redirect("Não existe esse código de matéria!","../administrador/crud_sala.php");
        }

	}else{
		redirect("Caso deseje utilar essa página, selecione uma matéria para excluir!","../administrador/crud_sala.php");
	}
