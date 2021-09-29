<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_materia']) and !empty($_POST['nm_materia']) and isset($_POST['ds_materia']) and !empty($_POST['ds_materia']) and isset($_POST['tx_cor']) and !empty($_POST['tx_cor'])){

		$nm_materia = $_POST['nm_materia'];
		$ds_materia = $_POST['ds_materia'];
		$tx_cor = $_POST['tx_cor'];

		//Cadastra a materia
		$sql = "INSERT into tb_materia values (null,'$nm_materia','$ds_materia','$tx_cor',1)";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Sua materia foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_materia.php');

		}else{

			redirect("Ocorreu um erro ao cadastrar uma nova materia!","../administrador/crud_materia.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_materia.php");
	}
