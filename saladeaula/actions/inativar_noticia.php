<?php

	include_once("../functions/util.php");

	if(isset($_GET['cd'])){

		$cd_noticia = $_GET['cd'];

		//Verifica se o código é válido
		$sql_noticia = "SELECT st_noticia from tb_noticia where cd_noticia = $cd_noticia";
		$query_noticia = $mysqli->query($sql_noticia);

		if($query_noticia->num_rows > 0){

			$row = $query_noticia->fetch_object();

			if($row->st_noticia == 0){
				$sql_up = "UPDATE tb_noticia set st_noticia = 1 where cd_noticia = $cd_noticia";
				$msg = "A noticia foi ativada com sucesso!";
			}else{
				$sql_up = "UPDATE tb_noticia set st_noticia = 0 where cd_noticia = $cd_noticia";
				$msg = "A noticia foi inativada com sucesso!";
			}

			if($query_up = $mysqli->query($sql_up)){
				//redirect($msg,"");
				header('location: ../administrador/crud_noticia.php');
			}else{
				redirect("Ocorreu um problema ao inativar essa noticia!","../administrador/crud_noticia.php");
			}

		}else{
			redirect("Não existe o código da noticia!","../administrador/crud_noticia.php");
		}

	}else{
		redirect("Por favor, envie o formulário caso deseje utilar essa página!","../administrador/crud_noticia.php");
	}
