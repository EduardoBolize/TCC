<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_sala']) and isset($_POST['sg_sala']) and isset($_POST['id_curso'])){

		$nm_sala = $_POST['nm_sala'];
		$sg_sala = $_POST['sg_sala'];
		$id_curso = $_POST['id_curso'];

		//Cadastra a sala
		$sql = "INSERT into tb_sala values (null,'$nm_sala','$sg_sala','$id_curso',1)";
		//echo $sql;

		if($mysqli->query($sql)){
			//redirect("Sua sala foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_sala.php');
		}else{
			redirect("Ocorreu um erro ao cadastrar uma nova sala!","../administrador/crud_sala.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_sala.php");
	}
