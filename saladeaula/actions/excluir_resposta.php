<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_resposta = $_GET['cd'];

		//Verifica se o código da resposta é válido
		$sql_resposta = "SELECT * from tb_resposta where cd_resposta = $cd";
		$query_resposta = $mysqli->query($sql_resposta);

		if($query_resposta->num_rows > 0){

			$row = $query_resposta->fetch_object();

			$sql_del = "DELETE from tb_resposta where cd_resposta = $cd";

			if($query_del = $mysqli->query($sql_del)){
				//redirect("Sua resposta foi excluida com sucesso!","");
				header('Location:../administrador/crud_aluno.php');
			}else{
				redirect("Ocorreu um problema ao inativar esse aluno!","../administrador/crud_aluno.php");
			}

		}else{
			redirect("Não existe esse código de aluno!","../administrador/crud_aluno.php");
		}

	}else{
		redirect("Caso deseje utilar essa página, selecione um aluno para inativa-lo!","../administrador/crud_aluno.php");
	}
