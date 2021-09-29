<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_GET['id_sala_materia']) and isset($_GET['id_professor'])){

		$id_sala_materia = $_GET['id_sala_materia'];
		$id_professor = $_GET['id_professor'];

		//Verifica se o código do professor é válido
		$sql_verif_d = "SELECT * from tb_professor where cd_professor = $id_professor";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){
			$row_p = $query_verif_d->fetch_object();
		}else{
			redirect("O código do professor selecionado não existe!!","../administrador/crud_professor.php");
		}
        
		//Verifica se o código da sala_materia é válido
		$sql_verif_d = "SELECT * from tb_sala_materia where cd_sala_materia = $id_sala_materia";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da sala_materia não existe!!","../administrador/editar_encargo.php?cd=".$row_p->cd_professor);
		}

		//Faz as inserção e tenta enviar
		$insert_en = "INSERT into tb_professor_sala_materia values (null, '$id_sala_materia','$id_professor',1)";
		if($mysqli->query($insert_en)){
			/*Se executar*/
			//redirect("Seu registro de encargo foi cadastrado com sucesso!","");
			header('Location:../administrador/editar_encargo.php?cd='.$row_p->cd_professor);
		}else{
			/*Se não executar*/
			redirect("Seu registro de encargo não pôde ser cadastrado","../administrador/editar_encargo.php?cd=".$row_p->cd_professor);
		}
		

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_professor.php");
	}
