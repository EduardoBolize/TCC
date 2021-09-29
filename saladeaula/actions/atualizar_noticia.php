<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['tx_titulo']) and isset($_POST['ds_noticia']) and isset($_POST['dt_noticia']) and isset($_POST['cd_noticia'])){

		$tx_titulo = $_POST['tx_titulo'];
		$ds_noticia = $_POST['ds_noticia'];
        $dt_noticia = $_POST['dt_noticia'];
        $cd_noticia = $_POST['cd_noticia'];
        
        //Formatar data
        $dt_noticia = formatar_para_date($dt_noticia);

		//Atualização dos dados da noticia
		$sql_noticia = "UPDATE tb_noticia set ";
		$sql_noticia .= "tx_titulo = '$tx_titulo', ";
		$sql_noticia .= "ds_noticia = '$ds_noticia', ";
		$sql_noticia .= "dt_noticia = '$dt_noticia', ";
		$sql_noticia .= "id_login = ".$_SESSION['cd_login']." ";
		$sql_noticia .= "where cd_noticia = $cd_noticia";

		if($mysqli->query($sql_noticia)){
			//redirect("A noticia foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_noticia.php');
		}else{
			redirect("Não foi possível atualizar a noticia","../administrador/crud_noticia.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_noticia.php");
	}
