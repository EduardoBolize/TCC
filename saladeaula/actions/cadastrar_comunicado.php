<meta charset="utf-8">
<?php

	include_once("../functions/util.php");

	if($_SESSION['tp_user'] == 'Professor'){
		$redirect = "../home.php";
	}else if($_SESSION['tp_user'] == 'Administrador'){
		$redirect = "../professor/crud_comunicado.php";
	}

	if(isset($_POST['tx_titulo']) and isset($_POST['ds_descricao']) and isset($_POST['tp_comunicado'])){

		$tx_titulo = $_POST['tx_titulo'];
		$ds_descricao = $_POST['ds_descricao'] ;
		date_default_timezone_set("America/Sao_Paulo");
		$dt_criacao = date("Y-m-d");
		$tp_comunicado = $_POST['tp_comunicado'];
		if($tp_comunicado == 1){
			$dt_assunto = formatar_para_date($_POST['dt_assunto']);			
		}else if($tp_comunicado == 2){
			$dt_assunto = '0000-00-00';
		}
		$id_login = $_SESSION['cd_login'];

		$sql = "INSERT into tb_comunicado values (null, '$tx_titulo', '$ds_descricao', '$dt_criacao', '$dt_assunto', $id_login, $tp_comunicado, 1)";

		if($mysqli->query($sql)){
			header("Location: $redirect");
		}else{
			redirect("Não foi possivel cadastrar seu comunicado!","$redirect");
		}

	}else{
		redirect("Preencha todos os campos do comunicado", "$redirect");
	}
