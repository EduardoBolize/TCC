<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_sala']) and isset($_POST['id_materia']) and isset($_POST['cd_sala_materia'])){

		$id_sala = $_POST['id_sala'];
		$id_materia = $_POST['id_materia'];
		$cd_sala_materia = $_POST['cd_sala_materia'];

		//Verifica se o código da sala_materia é válido
		$sql_verif_sm = "SELECT * from tb_sala_materia where cd_sala_materia = $cd_sala_materia";
		$query_verif_sm = $mysqli->query($sql_verif_sm);

		if($query_verif_sm->num_rows > 0){

		}else{
			redirect("O código dessa sala_materia não existe!!","../administrador/crud_sala_materia.php");
		}

		//Verifica se o código da sala é válido
		$sql_verif_d = "SELECT * from tb_sala where cd_sala = $id_sala";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da sala não existe!!","../administrador/crud_sala_materia.php");
		}

		//Verifica se o código da materia é válido
		$sql_verif_d = "SELECT * from tb_materia where cd_materia = $id_materia";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da materia selecionada não existe!!","../administrador/crud_sala_materia.php");
		}

		//Faz as alterações e tenta enviar
		$update_sm = "UPDATE tb_sala_materia set id_sala = $id_sala, id_materia = $id_materia where cd_sala_materia = $cd_sala_materia";
		if($mysqli->query($update_sm)){
			/*Se executar*/
			//redirect("Seu registro de sala_materia foi alterado com sucesso!","");
			header('Location:../administrador/crud_sala_materia.php');
		}else{
			/*Se não executar*/
			redirect("Seu registro de sala_materia não pôde ser alterado","../administrador/crud_sala_materia.php");
		}
		

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_sala_materia.php");
	}
