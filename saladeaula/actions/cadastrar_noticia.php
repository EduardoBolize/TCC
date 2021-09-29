<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['tx_titulo']) and isset($_POST['ds_noticia']) and isset($_POST['dt_noticia'])){

		$tx_titulo = $_POST['tx_titulo'];
		$ds_noticia = $_POST['ds_noticia'];
        $dt_noticia = $_POST['dt_noticia'];
        
        //Formatar data
        $dt_noticia = formatar_para_date($dt_noticia);

		//Cadastro dos dados da noticia
		$sql_noticia = "INSERT into tb_noticia values (null,'$tx_titulo','$ds_noticia','$dt_noticia',".$_SESSION['cd_login'].",1)";

		if($mysqli->query($sql_noticia)){
			//redirect("A noticia foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_noticia.php');
		}else{
			redirect("Não foi possível cadastrar a noticia","../administrador/crud_noticia.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_noticia.php");
	}
