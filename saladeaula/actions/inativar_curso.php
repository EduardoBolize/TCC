<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_curso = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_curso = "SELECT * from tb_curso where cd_curso = $cd_curso";
		$query_curso = $mysqli->query($sql_curso);

		if($query_curso->num_rows > 0){

			$row = $query_curso->fetch_object();

			if($row->st_curso == 0){
				$sql_up = "UPDATE tb_curso set st_curso = 1 where cd_curso = $cd_curso";
				$msg = "O curso foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_curso set st_curso = 0 where cd_curso = $cd_curso";
				$msg = "O curso foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_curso.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse curso!","../administrador/crud_curso.php");
			}

		}else{
			redirect("Não existe esse código do curso!","../administrador/crud_curso.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_curso.php");
	}
