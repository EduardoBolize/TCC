<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['cd_midia_galeria'])){
		$cd_midia_galeria = $_GET['cd_midia_galeria'];

		//Cadastro do matricula_comunicado
		$sql = "DELETE from tb_midia_galeria where cd_midia_galeria = $cd_midia_galeria";

		if($mysqli->query($sql)){
			//caso cadastre
			header('Location:../administrador/crud_galeria.php');
		}else{
			redirect("Erro ao deletar!","../administrador/crud_galeria.php");
		}

	}
	else{
		redirect("Forneça um dado para exclusão!","../administrador/crud_galeria.php");
	}