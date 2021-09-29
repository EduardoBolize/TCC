<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_sala_materia = $_GET['cd'];

		//Verifica se o código é válido
		$sql_sala_materia = "SELECT * from tb_sala_materia where cd_sala_materia = $cd_sala_materia";
		$query_sala_materia = $mysqli->query($sql_sala_materia);

		if($query_sala_materia->num_rows > 0){

			$row = $query_sala_materia->fetch_object();

			if($row->st_sala_materia == 0){
				$sql_up = "UPDATE tb_sala_materia set st_sala_materia = 1 where cd_sala_materia = $cd_sala_materia";
				$msg = "A sala_materia foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_sala_materia set st_sala_materia = 0 where cd_sala_materia = $cd_sala_materia";
				$msg = "A sala_materia foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header("location:../administrador/editar_sala.php?cd=$row->id_sala");
			}else{
				redirect("Ocorreu um problema ao inativar essa sala_materia!","../administrador/editar_sala.php?cd=$row->id_sala");
			}

		}else{
			redirect("Não existe esse código da sala_materia!","../administrador/crud_sala_materia.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_sala.php");
	}
