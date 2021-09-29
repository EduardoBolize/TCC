<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_inscrito = $_GET['cd'];

		//Cadastro dos dados do inscrito
		$sql_inscrito = "SELECT * from tb_inscrito where cd_inscrito = $cd_inscrito";
		$query_inscrito = $mysqli->query($sql_inscrito);

		if($query_inscrito->num_rows > 0){

			$row = $query_inscrito->fetch_object();

			if($row->st_inscrito == 0){
				$sql_up = "UPDATE tb_inscrito set st_inscrito = 1 where cd_inscrito = $cd_inscrito";
				$msg = "O inscrito foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_inscrito set st_inscrito = 0 where cd_inscrito = $cd_inscrito";
				$msg = "O inscrito foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_inscrito.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse inscrito!","../administrador/crud_inscrito.php");
			}

		}else{
			redirect("Não existe esse código do inscrito!","../administrador/crud_inscrito.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_inscrito.php");
	}
