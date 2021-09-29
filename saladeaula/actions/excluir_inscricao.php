<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['inscricao']) and !empty($_GET['inscricao'])){
		$inscricao = $_GET['inscricao'];

		//Cadastro do inscrito_audicao
		$sql = "DELETE from tb_inscrito_audicao where cd_inscrito_audicao = $inscricao";

		if($mysqli->query($sql)){
			//caso cadastre
			header('Location:../../inscrito/crud_inscricoes.php');
		}else{
			redirect("Erro ao deletar!","../../inscrito/crud_inscricoes.php");
		}

	}
	else{
		redirect("Por favor, forneça um inscricao ou counicado!","../../inscrito/crud_inscricoes.php");
	}