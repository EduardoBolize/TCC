<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_professor = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_professor = "SELECT * from tb_professor where cd_professor = $cd_professor";
		$query_professor = $mysqli->query($sql_professor);

		if($query_professor->num_rows > 0){

			$row = $query_professor->fetch_object();

			if($row->st_professor == 0){
				$sql_up = "UPDATE tb_professor set st_professor = 1 where cd_professor = $cd_professor";
				$msg = "O professor foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_professor set st_professor = 0 where cd_professor = $cd_professor";
				$msg = "O professor foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../administrador/crud_professor.php ');
			}else{
				redirect("Ocorreu um problema ao inativar esse professor!","../administrador/crud_professor.php");
			}

		}else{
			redirect("Não existe esse código de professor!","../administrador/crud_professor.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_professor.php");
	}
