<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_sala']) and isset($_POST['id_materia'])){

		$id_sala = $_POST['id_sala'];
		$id_materia = $_POST['id_materia'];
        
		//Verifica se o código da sala é válido
		$sql_verif_d = "SELECT * from tb_sala where cd_sala = $id_sala";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da sala não existe!!","../administrador/crud_sala_materia.php");
			exit;
		}

		//Verifica se o código da materia é válido
		$sql_verif_d = "SELECT * from tb_materia where cd_materia = $id_materia";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da materia selecionada não existe!!","../administrador/editar_sala.php?cd=$id_sala");
			exit;
		}

		//Faz as alterações e tenta enviar
		$update_sm = "INSERT into tb_sala_materia values (null, '$id_sala','$id_materia',1)";
		if($mysqli->query($update_sm)){
			/*Se executar*/
			//redirect("Seu registro de sala_materia foi cadastrado com sucesso!","");
			header("Location:../administrador/editar_sala.php?cd=$id_sala");
		}else{
			/*Se não executar*/
			redirect("Seu registro de sala_materia não pôde ser cadastrado","../administrador/editar_sala.php?cd=$id_sala");
		}
		

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_sala_materia.php");
	}
