<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_sala']) and isset($_POST['sg_sala']) and isset($_POST['id_curso']) and isset($_POST['cd_sala'])){

		$nm_sala = $_POST['nm_sala'];
		$sg_sala = $_POST['sg_sala'];
		$id_curso = $_POST['id_curso'];
		$cd_sala = $_POST['cd_sala'];

		//Verificar se o código da sala é válido
		$sql_sala = "SELECT * from tb_sala where cd_sala = $cd_sala";
		$query_sala = $mysqli->query($sql_sala);

		if($query_sala->num_rows > 0){
			$row_sala = $query_sala->fetch_object();

			$up_sala = "UPDATE tb_sala set nm_sala = '$nm_sala', sg_sala = '$sg_sala', id_curso = $id_curso where cd_sala = $cd_sala";
			echo $up_sala;

			if($mysqli->query($up_sala)){

				//redirect("Sua alteração foi enviada com sucesso!","");
				header('Location:../administrador/crud_sala.php');

			}else{
				redirect("Ocorreu um erro durante o envio!!","../administrador/crud_sala.php");
			}

		}else{
			redirect("O código da sala não é válido","../administrador/crud_sala.php");
		}

	}else{
		redirect("Preencha o Formulário!","../administrador/crud_sala.php");
	}
