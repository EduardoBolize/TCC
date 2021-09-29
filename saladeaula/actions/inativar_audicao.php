<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_audicao = $_GET['cd'];

		//Cadastro dos dados do admin
		$sql_audicao = "SELECT * from tb_audicao where cd_audicao = $cd_audicao";
		$query_audicao = $mysqli->query($sql_audicao);

		if($query_audicao->num_rows > 0){

			$row = $query_audicao->fetch_object();

			if($row->st_audicao == 0){
				$sql_up = "UPDATE tb_audicao set st_audicao = 1 where cd_audicao = $cd_audicao";
				$msg = "A audição foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_audicao set st_audicao = 0 where cd_audicao = $cd_audicao";
				$msg = "A audição foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//history_back($msg);
				header('location: ../administrador/crud_audicao.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa audição","../administrador/crud_audicao.php");
			}

		}else{
			redirect("Não existe esse código de audição!","../administrador/crud_audicao.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_audicao.php");
	}
