<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['dt_turma']) and isset($_POST['id_sala']) and isset($_POST['cd'])){

		$dt_turma = $_POST['dt_turma'];
		$id_sala = $_POST['id_sala'];
		$cd_turma = $_POST['cd'];

		$sql_turma = "SELECT * from tb_turma where cd_turma = $cd_turma";
		$query_turma = $mysqli->query($sql_turma);

		$data = formatar_data_materialize($dt_turma);

		if($query_turma->num_rows > 0){
			$row_turma = $query_turma->fetch_object();

			$up_turma = "UPDATE tb_turma set dt_turma = '$data', id_sala = '$id_sala' where cd_turma = $cd_turma";

			if($mysqli->query($up_turma)){

				//redirect("Sua alteração foi enviada com sucesso!","");
				header('Location:../administrador/crud_turma.php');

			}else{
				redirect("Ocorreu um erro durante o envio!!","../administrador/crud_turma.php");
			}

		}else{
			redirect("Não foi possivel enviar a alteração","../administrador/crud_turma.php");
		}

	}else{
		redirect("Preencha o Formulário!","../administrador/crud_turma.php");
	}
