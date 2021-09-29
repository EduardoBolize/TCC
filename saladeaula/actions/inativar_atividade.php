<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_atividade = $_GET['cd'];

		//Verifica se o código é válido
		$sql_atividade = "SELECT * from tb_atividade where cd_atividade = $cd_atividade";
		$query_atividade = $mysqli->query($sql_atividade);

		if($query_atividade->num_rows > 0){

			$row = $query_atividade->fetch_object();

			if($row->st_atividade == 0){
				$sql_up = "UPDATE tb_atividade set st_atividade = 1 where cd_atividade = $cd_atividade";
				$msg = "A atividade foi ativado com sucesso!";
			}else{
				$sql_up = "UPDATE tb_atividade set st_atividade = 0 where cd_atividade = $cd_atividade";
				$msg = "A atividade foi inativado com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('Location:../administrador/crud_atividade.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa atividade!","../administrador/crud_atividade.php");
			}

		}else{
			redirect("Não existe esse código da atividade!","../administrador/crud_atividade.php");
		}

	}else{
        redirect("Para acessar essa página é necessária a escolha de uma atividade!","../administrador/crud_atividade.php");
    }
