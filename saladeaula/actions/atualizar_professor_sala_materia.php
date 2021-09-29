<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['id_sala_materia']) and isset($_POST['id_professor']) and isset($_POST['cd_professor_sala_materia'])){

		$id_sala_materia = $_POST['id_sala_materia'];
        $id_professor = $_POST['id_professor'];
        $cd_professor_sala_materia = $_POST['cd_professor_sala_materia'];

        //Verifica se o código do encargo é válido
        $sql_v = "SELECT * from tb_professor_sala_materia where cd_professor_sala_materia = $cd_professor_sala_materia";
        $query_v = $mysqli->query($sql_v);
        if($query_v->num_rows > 0){
            
        }else{
            redirect("O código do encargo não é válido!","../administrador/crud_encargo.php");
        }
        
		//Verifica se o código da sala_materia é válido
		$sql_verif_d = "SELECT * from tb_sala_materia where cd_sala_materia = $id_sala_materia";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código da sala_materia não existe!!","../administrador/crud_encargo.php");
		}

		//Verifica se o código do professor é válido
		$sql_verif_d = "SELECT * from tb_professor where cd_professor = $id_professor";
		$query_verif_d = $mysqli->query($sql_verif_d);

		if($query_verif_d->num_rows > 0){

		}else{
			redirect("O código do professor selecionado não existe!!","../administrador/crud_encargo.php");
		}

		//Faz a atualização e tenta enviar
		$insert_en = "UPDATE tb_professor_sala_materia set id_professor = '$id_professor', id_sala_materia = '$id_sala_materia' where cd_professor_sala_materia = $cd_professor_sala_materia";
		if($mysqli->query($insert_en)){
			/*Se executar*/
			//redirect("Seu registro de encargo foi atualizado com sucesso!","");
			header('Location:../administrador/crud_encargo.php');
		}else{
			/*Se não executar*/
			redirect("Seu registro de encargo não pôde ser atualizado","../administrador/crud_encargo.php");
		}
		

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_encargo.php");
	}
