<?php
	include_once('../functions/util.php');

	if(isset($_POST['nm_audicao']) and isset($_POST['ds_audicao']) and isset($_POST['dt_abertura']) and isset($_POST['dt_fechamento']) and isset($_POST['nr_vagas']) and isset($_POST['cd'])){
	
		$cd_audicao=$_POST['cd'];
		$nm_audicao=$_POST['nm_audicao'];
		$ds_audicao=$_POST['ds_audicao'];
		$dt_abertura=$_POST['dt_abertura'];
		$dt_fechamento=$_POST['dt_fechamento'];
		$nr_vagas=$_POST['nr_vagas'];

		$dt_fechamento = formatar_data_materialize($dt_fechamento);
		$dt_abertura = formatar_data_materialize($dt_abertura);
						
		
		$sql_audicao = "SELECT * from tb_audicao where cd_audicao = $cd_audicao";
		$query_audicao=$mysqli->query($sql_audicao);

		if($query_audicao->num_rows > 0){

			$row_audicao = $query_audicao->fetch_object();

			$up_audicao = "UPDATE tb_audicao SET nm_audicao='$nm_audicao', ds_audicao='$ds_audicao', dt_abertura='$dt_abertura', dt_fechamento='$dt_fechamento', nr_vagas='$nr_vagas' where cd_audicao='$cd_audicao'";
			//echo "$up_audicao";

			if($mysqli->query($up_audicao)){
				//redirect("Sua alteração foi enviada com sucesso", "");
				header("Location:../administrador/editar_audicao.php?cd=$cd_audicao");
			}else{
				//history_back("Ocorreu um erro durante o envio!");
				redirect("Ocorreu um erro ao efetuar o cadastro!","../administrador/crud_audicao.php");
			}

		}else{
			redirect("Não existem audições cadastradas!","../administrador/crud_audicao.php");
		}
	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_audicao.php");
	}

