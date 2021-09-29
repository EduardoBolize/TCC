<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_questao = $_GET['cd'];

		//Verifica se o código é válido
		$sql_questao = "SELECT * from tb_questao where cd_questao = $cd_questao";
		$query_questao = $mysqli->query($sql_questao);

		if($query_questao->num_rows > 0){

			$row = $query_questao->fetch_object();

			if($row->st_questao == 0){
				$sql_up = "UPDATE tb_questao set st_questao = 1 where cd_questao = $cd_questao";
				$msg = "A questão foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_questao set st_questao = 0 where cd_questao = $cd_questao";
				$msg = "A questão foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location:../professor/crud_questao.php ');
			}else{
				redirect("Ocorreu um problema ao inativar essa questão!","../professor/crud_questao.php");
			}

		}else{
			redirect("Não existe esse código da questão!","../professor/crud_questao.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../professor/crud_questao.php");
	}
