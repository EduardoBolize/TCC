<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Administrador'){
		//caso o usuário que esteja cadastrando seja um administrador

		if(isset($_POST['st_confirma']) and isset($_POST['id_matricula']) and isset($_POST['id_evento']) and isset($_POST['cd_matricula_evento']) and !empty($_POST['st_confirma']) and !empty($_POST['id_matricula']) and !empty($_POST['id_evento']) and !empty($_POST['cd_matricula_evento'])){

			//Dados do formulário
			$st_confirma = $_POST['st_confirma'];
			$id_matricula = $_POST['id_matricula'];
			$id_evento = $_POST['id_evento'];
			$cd_matricula_evento = $_POST['cd_matricula_evento'];

			//Verifica se o código da matricula é válido
			$sql_v = "SELECT * from tb_matricula where cd_matricula = $id_matricula";
			$query_v = $mysqli->query($sql_v);

			if($query_v->num_rows == 0){
				redirect("Não foi possível verificar o código da matricula!","../aluno/crud_matricula_evento.php");
				exit;
            }
            
            //Verifica se o código do evento é válido
			$sql_v = "SELECT * from tb_evento where cd_evento = $id_evento";
			$query_v = $mysqli->query($sql_v);

			if($query_v->num_rows == 0){
				redirect("Não foi possível verificar o código do evento!","../aluno/crud_matricula_evento.php");
				exit;
			}

			//Verifica se a relação existe
			$sql_v = "SELECT * from tb_matricula_evento where cd_matricula_evento = $cd_matricula_evento";
			$query_v = $mysqli->query($sql_v);

			if($query_v->num_rows > 0){
				//Faz a atualização
                $sql_i = "UPDATE tb_matricula_evento set st_confirma = $st_confirma, id_matricula = $id_matricula, id_evento = $id_evento where cd_matricula_evento = $cd_matricula_evento";

				if($mysqli->query($sql_i)){
					header("Location: ../aluno/crud_matricula_evento.php");
				}else{
					redirect("Ocorreu um erro durante a atualização!","../aluno/crud_matricula_evento.php");
                }
			}else{
				
                header("Location: ../aluno/crud_matricula_evento.php");
			}

		}else{
			header("Location: ../aluno/crud_matricula_evento.php");
		}
		

	}else{
		//caso o usuário que esteja cadastrando seja um aluno

		if(isset($_POST['st_confirma']) and !empty($_POST['st_confirma']) and isset($_POST['cd_matricula_evento']) and !empty($_POST['cd_matricula_evento'])){

			$st_confirma = $_POST['st_confirma'];
			$cd_matricula_evento = $_POST['cd_matricula_evento'];

			//Pega o código da matricula
			$sql_m = "SELECT * from tb_matricula where id_login = ".$_SESSION['id_login'];
			$query_m = $mysqli->query($sql_m);

			if($query_m->num_rows == 0){

				redirect("O código de sua matricula não é válido","../aluno/crud_matricula_evento.php");

			}else{
				$row_m = $query_m->fetch_object();

				$id_matricula = $row_m->cd_matricula;

                //Verifica se a relação existe
                $sql_v = "SELECT * from tb_matricula_evento where cd_matricula_evento = $cd_matricula_evento";
                $query_v = $mysqli->query($sql_v);

                if($query_v->num_rows > 0){
                    //Faz a atualização
                    $sql_i = "UPDATE tb_matricula_evento set st_confirma = $st_confirma, id_matricula = $id_matricula where cd_matricula_evento = $cd_matricula_evento";

                    if($mysqli->query($sql_i)){
                        header("Location: ../aluno/crud_matricula_evento.php");
                    }else{
                        redirect("Ocorreu um erro durante a atualização!","../aluno/crud_matricula_evento.php");
                    }
                }else{
                    
                    header("Location: ../aluno/crud_matricula_evento.php");
                }
			}
	
		}else{
			redirect("Por favor, preencha o formulário!","../administrador/cadastro_evento.php");
		}

	}