<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Professor' or $_SESSION['tp_user'] == 'Administrador'){
		$redirect = "../professor/";
	}

	if(isset($_POST['nm_tarefa']) and isset($_POST['id_atividade']) and isset($_POST['id_turma']) and isset($_POST['dt_tarefa']) and isset($_POST['dt_prazo']) and isset($_POST['hr_prazo']) and isset($_POST['st_tarefa']) and isset($_POST['nm_materia']) and isset($_POST['cd_tarefa'])){

		$nm_tarefa = $_POST['nm_tarefa'];
		$id_atividade = $_POST['id_atividade'];
		$id_turma = $_POST['id_turma'];
		$dt_tarefa = $_POST['dt_tarefa'];
		$dt_prazo = $_POST['dt_prazo'];
        $hr_prazo = $_POST['hr_prazo'];
        $st_tarefa = $_POST['st_tarefa'];
        $nm_materia = $_POST['nm_materia'];	//String com as matérias separadas por ","
        $cd_tarefa = $_POST['cd_tarefa'];
        
        //Verifica se o código é válido
        $sql_v = "SELECT * from tb_tarefa where cd_tarefa = $cd_tarefa";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows == 0){
            //Código não é válido
            redirect("O código da tarefa não é válido",$redirect."editar_atividade.php?cd=".$id_atividade);
        }

		//Formatar Data
		$dt_tarefa =  formatar_para_date($dt_tarefa);
		$dt_prazo =  formatar_para_date($dt_prazo);

		//Atualiza as matérias relacionadas a atividade
		$nm_materia = explode(",",$nm_materia);
		$nm_materia_back = $nm_materia;	//Guarda o array para a deleção

		foreach ($nm_materia as $cd_materia) {
			if(!empty($cd_materia)){
				$sql_v = "SELECT * from tb_tarefa_materia where id_tarefa = $cd_tarefa and id_materia = $cd_materia";
				$query_v = $mysqli->query($sql_v);
				//echo $sql_v;

				if($query_v->num_rows == 0){
					//Não está cadastrado
					$sql_i = "INSERT into tb_tarefa_materia values (null,$cd_tarefa,$cd_materia)";
					$mysqli->query($sql_i);
				}
			}
		}

		//Deleta as matérias que deixaram de estar relacionadas
		$del = "DELETE from tb_tarefa_materia where id_tarefa = $cd_tarefa";
		foreach ($nm_materia_back as $cd_materia) {
			if(!empty($cd_materia)){
				$del .= " and id_materia != $cd_materia";
			}
		}
		$mysqli->query($del);
        
		//Cadastro da tarefa
		$sql = "UPDATE tb_tarefa set nm_tarefa = '$nm_tarefa', id_atividade = '$id_atividade', id_turma = '$id_turma', dt_tarefa = '$dt_tarefa', dt_prazo = '$dt_prazo', hr_prazo = '$hr_prazo', st_tarefa = '$st_tarefa'";
		if($_SESSION["tp_user"] == "Administrador"){
			if(isset($_POST["id_criador"]) and !empty($_POST["id_criador"])){
				$sql .= ", id_criador = ".$_POST["id_criador"];
			}else{
				header('Location: '.$redirect."editar_atividade.php?cd=".$id_atividade."&id_turma=".$id_turma);
				exit;
			}
		}
		$sql .= " where cd_tarefa = $cd_tarefa";

		if($mysqli->query($sql)){
            //Caso cadastre
			//redirect("Seu cadastro foi feito com sucesso","");
			header('Location: '.$redirect."editar_atividade.php?cd=".$id_atividade."&id_turma=".$id_turma);
		}else{
            //Caso não cadastre
			redirect("Seu cadastro não pode ser efetuado!",$redirect."editar_atividade.php?cd=".$id_atividade."&id_turma=".$id_turma);
		}

	}else{
		redirect("Por favor, preencha o formulário!",$redirect."crud_atividade.php");
	}
