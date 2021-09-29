<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Administrador'){
		//caso o usuário que esteja cadastrando seja um administrador

		if(isset($_POST['id_matricula']) and isset($_POST['id_evento']) and !empty($_POST['id_matricula']) and !empty($_POST['id_evento'])){

			//Dados do formulário
			$id_matricula = $_POST['id_matricula'];
			$id_evento = $_POST['id_evento'];

			//Verifica se o código da matricula é válido
			$sql_v = "SELECT * from tb_matricula where cd_matricula = $id_matricula";
			$query_v = $mysqli->query($sql_v);

			if($query_v->num_rows == 0){
				redirect("Não foi possível verificar o código da matricula!","../aluno/crud_matricula_evento.php");
				exit;
			}

			//Verifica se a relação já existe
			$sql_v = "SELECT * from tb_matricula_evento where id_matricula = $id_matricula and id_evento = $id_evento";
			$query_v = $mysqli->query($sql_v);

			if($query_v->num_rows > 0){
				//Já possui cadastro efetuado
				header("Location: ../aluno/crud_matricula_evento.php");
			}else{
				//Faz o cadastro
				$sql_i = "INSERT into tb_matricula_evento values (null,0,'$id_matricula','$id_evento')";

				if($mysqli->query($sql_i)){
					header("Location: ../aluno/crud_matricula_evento.php");
				}else{
					redirect("Ocorreu um erro durante o cadastro!","../aluno/crud_matricula_evento.php");
				}
			}

		}else{
			header("Location: ../aluno/crud_matricula_evento.php");
		}
		

	}else{
		//caso o usuário que esteja cadastrando seja um aluno

		if(isset($_POST['st_confirma']) and isset($_POST['id_evento'])){

			$st_confirma = $_POST['st_confirma'];
			$id_evento = $_POST['id_evento'];

			//Pega o código da matricula
			$sql_m = "SELECT * from tb_matricula where id_login = ".$_SESSION['id_login'];
			$query_m = $mysqli->query($sql_m);

			if($query_m->num_rows == 0){

				redirect("O código de sua matricula não é válido","../aluno/crud_matricula_evento.php");

			}else{
				$row_m = $query_m->fetch_object();

				$id_matricula = $row_m->cd_matricula;

				//Faz o cadastro
				$sql_i = "INSERT into tb_matricula_evento values (null,0,'$id_matricula','$id_evento')";

				if($mysqli->query($sql_i)){
					header("Location: ../aluno/crud_matricula_evento.php");
				}else{
					redirect("Ocorreu um erro durante o cadastro!","../aluno/crud_matricula_evento.php");
				}
			}
	
		}else{
			redirect("Por favor, preencha o formulário!","../administrador/cadastro_evento.php");
		}

	}