<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['tx_enunciado']) and isset($_POST['tp_questao']) and isset($_POST['tx_alternativas']) and isset($_POST['tx_resposta']) and isset($_POST['vl_pontos']) and isset($_POST['cd_questao'])){

		$tx_enunciado = $_POST['tx_enunciado'];
		$tp_questao = $_POST['tp_questao'];
		$tx_alternativas = $_POST['tx_alternativas'];
		$tx_resposta = $_POST['tx_resposta'];
		$vl_pontos = $_POST['vl_pontos'];
		$cd_questao = $_POST['cd_questao'];

		//Verificar se o código da questão é válido
		$sql_questao = "SELECT * from tb_questao where cd_questao = $cd_questao";
		$query_questao = $mysqli->query($sql_questao);

		if($query_questao->num_rows > 0){
			
			$row_questao = $query_questao->fetch_object();

			$up_questao = "UPDATE tb_questao set tx_enunciado = '$tx_enunciado', tp_questao = '$tp_questao', tx_alternativas = '$tx_alternativas', tx_resposta = '$tx_resposta', vl_pontos = '$vl_pontos' where cd_questao = $cd_questao";
			//echo $up_questao;

			if($mysqli->query($up_questao)){

				//redirect("Sua alteração foi enviada com sucesso!","");
				header('Location:../professor/crud_questao.php');

			}else{
				redirect("Ocorreu um erro durante o envio!!","../professor/crud_questao.php");
			}

		}else{
			redirect("O código da questão é inválido!!","../professor/crud_questao.php");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../professor/crud_questao.php");
	}
