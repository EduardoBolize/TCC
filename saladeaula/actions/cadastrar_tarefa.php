<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Professor' or $_SESSION['tp_user'] == 'Administrador'){
		$redirect = "../professor/";
	}

	if(isset($_POST['nm_tarefa']) and isset($_POST['id_atividade']) and isset($_POST['id_turma']) and isset($_POST['dt_tarefa']) and isset($_POST['dt_prazo']) and isset($_POST['hr_prazo']) and isset($_POST['st_tarefa']) and isset($_POST['nm_materia'])){

		$nm_tarefa = $_POST['nm_tarefa'];
		$id_atividade = $_POST['id_atividade'];
		$id_turma = $_POST['id_turma'];
		$dt_tarefa = $_POST['dt_tarefa'];
		$dt_prazo = $_POST['dt_prazo'];
		$hr_prazo = $_POST['hr_prazo'];
		$st_tarefa = $_POST['st_tarefa'];
		$nm_materia = $_POST['nm_materia'];	//String com as matérias separadas por ","

		//Formatar Data
		$dt_tarefa =  formatar_para_date($dt_tarefa);
		$dt_prazo =  formatar_para_date($dt_prazo);

		//Cadastro da tarefa
		$sql = "INSERT into tb_tarefa values (null,'$nm_tarefa','$id_atividade','$id_turma',".$_SESSION['cd_login'].",'$st_tarefa','$dt_tarefa','$dt_prazo','$hr_prazo')";
		
		//Caso seja um administrador, vincula a atividade a um professor
		if($_SESSION["tp_user"] == "Administrador"){
			if(isset($_POST["id_criador"]) and !empty($_POST["id_criador"])){
				$sql = "INSERT into tb_tarefa values (null,'$nm_tarefa','$id_atividade','$id_turma',".$_POST["id_criador"].",'$st_tarefa','$dt_tarefa','$dt_prazo','$hr_prazo')";
			}else{
				header('Location: '.$redirect.'editar_atividade.php?cd='.$id_atividade);
				exit;
			}
		}

		if($mysqli->query($sql)){
			//Caso cadastre, pega o código da tarefa
			$sql_v = "SELECT * from tb_tarefa where nm_tarefa = '$nm_tarefa' and id_atividade = '$id_atividade' and id_turma = '$id_turma' and st_tarefa = '$st_tarefa' and dt_tarefa = '$dt_tarefa' and dt_prazo = '$dt_prazo' and hr_prazo = '$hr_prazo' order by cd_tarefa desc";
			$query_v = $mysqli->query($sql_v);
	
			if($query_v->num_rows == 0){
				redirect("Não foi possivel encontrar o código da tarefa",$redirect."editar_atividade.php?cd=".$id_atividade);
				exit;
			}

			$row_v = $query_v->fetch_object();

			//Cadastra as matérias relacionadas a atividade
			$nm_materia = explode(",",$nm_materia);

			foreach ($nm_materia as $cd_materia) {
				$sql_i = "INSERT into tb_tarefa_materia values (null,$row_v->cd_tarefa,$cd_materia)";
				$mysqli->query($sql_i);
			}

			header('Location: '.$redirect.'editar_atividade.php?cd='.$id_atividade);
		}else{
			//Caso não cadastre
			redirect("Seu cadastro não pode ser efetuado!",$redirect."editar_atividade.php?cd=".$id_atividade);
		}

	}else{
		redirect("Por favor, preencha o formulário!",$redirect."crud_atividade.php");
	}
