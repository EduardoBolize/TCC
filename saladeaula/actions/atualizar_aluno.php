<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Aluno'){
		$redirect = "perfil.php";
	}else if($_SESSION['tp_user'] == 'Administrador'){
		$redirect = "administrador/crud_aluno.php";
	}

	if(isset($_POST['nm_matricula']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone']) and isset($_POST['nr_telefone2']) and isset($_POST['nr_cpf']) and isset($_POST['dt_matricula']) and isset($_POST['tx_email']) and isset($_POST['nr_rg']) and isset($_POST['nm_sexo']) and isset($_POST['cd'])){

		$nm_matricula = $_POST['nm_matricula'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone = $_POST['nr_telefone'];
		$nr_telefone2 = $_POST['nr_telefone2'];
		$nr_cpf = $_POST['nr_cpf'];
		$dt_matricula = $_POST['dt_matricula'];
		$tx_email = $_POST['tx_email'];
		$nr_rg = $_POST['nr_rg'];
		$nm_sexo = $_POST['nr_rg'];
		$cd_matricula = $_POST['cd'];

		//Formatando data
		$date = formatar_data_materialize($dt_matricula);

		//Verificar se o código do aluno é válido
		$sql_matricula = "SELECT * from tb_matricula where cd_matricula = $cd_matricula";
		$query_matricula = $mysqli->query($sql_matricula);

		if($query_matricula->num_rows > 0){
			
			$row_matricula = $query_matricula->fetch_object();

			$up_matricula = "UPDATE tb_matricula set ";
			$up_matricula .= "nm_matricula = '$nm_matricula'";
			$up_matricula .= ", ds_endereco = '$ds_endereco'";
			$up_matricula .= ", ds_cidade = '$ds_cidade'";
			$up_matricula .= ", nr_telefone1 = '$nr_telefone'";
			$up_matricula .= ", nr_telefone2 = '$nr_telefone2'";
			$up_matricula .= ", nr_cpf = '$nr_cpf'";
			$up_matricula .= ", dt_matricula = '$date'";
			$up_matricula .= ", tx_email = '$tx_email'";
			$up_matricula .= ", nr_rg = '$nr_rg'";
			$up_matricula .= ", nm_sexo = '$nm_sexo'";
			$up_matricula .= "where cd_matricula = $cd_matricula";
			//echo $up_matricula;

			if($mysqli->query($up_matricula)){

				//redirect("Sua alteração foi enviada com sucesso!","../$redirect");
				header("Location: ../$redirect");
			}else{
				redirect("Ocorreu um erro durante o envio!!","../$redirect");
			}

		}else{
			redirect("O código da matricula é inválido!","../$redirect");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../$redirect");
	}
