<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_professor_sala_materia = $_GET['cd'];

		//Verifica se o código é válido
		$sql_encargo = "SELECT * from tb_professor_sala_materia where cd_professor_sala_materia = $cd_professor_sala_materia";
		$query_encargo = $mysqli->query($sql_encargo);

		if($query_encargo->num_rows > 0){

			$row = $query_encargo->fetch_object();

			if($row->st_professor_sala_materia == 0){
				$sql_up = "UPDATE tb_professor_sala_materia set st_professor_sala_materia = 1 where cd_professor_sala_materia = $cd_professor_sala_materia";
				$msg = "A questão foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_professor_sala_materia set st_professor_sala_materia = 0 where cd_professor_sala_materia = $cd_professor_sala_materia";
				$msg = "A questão foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../administrador/crud_encargo.php ');
			}else{
				redirect("Ocorreu um problema ao inativar esse encargo!","../administrador/crud_encargo.php");
			}

		}else{
			redirect("Não existe esse código do encargo!","../administrador/crud_encargo.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilizar essa página!","../administrador/crud_encargo.php");
	}
