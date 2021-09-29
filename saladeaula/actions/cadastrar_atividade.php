<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_atividade']) and isset($_POST['ds_atividade'])){

		$nm_atividade = $_POST['nm_atividade'];
		$ds_atividade = $_POST['ds_atividade'];
        
		//Cadastro da atividade
		$sql = "INSERT into tb_atividade values (null,'$nm_atividade','$ds_atividade',1)";

		if($mysqli->query($sql)){
            //Caso cadastre
			//redirect("Sua atividade foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_atividade.php');
		}else{
            //Caso não cadastre
			redirect("Não foi possível cadastrar sua atividade!","../administrador/crud_atividade.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_atividade.php");
	}
