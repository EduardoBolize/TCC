<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_evento']) and isset($_POST['dt_evento']) and isset($_POST['st_publico']) and isset($_POST['ds_evento'])){

		$nm_evento = $_POST['nm_evento'];
		$dt_evento = $_POST['dt_evento'];
        $st_publico = $_POST['st_publico'];
        $ds_evento = $_POST['ds_evento'];
        
        //Busca o código do administrador
        $sql_v = "SELECT * from tb_admin where id_login = ".$_SESSION['cd_login'];
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            $row_v = $query_v->fetch_object();

            $cd_admin = $row_v->cd_admin;
        }else{
            redirect("Não foi possível verificar seu código de administrador!","../administrador/crud_evento.php");
            exit;
		}
		
		//Formatar data
        $dt_evento = formatar_data_materialize($dt_evento);

		//Cadastra o evento
		$sql = "INSERT into tb_evento values (null,'$nm_evento','$dt_evento','$st_publico','$ds_evento',$cd_admin,1)";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu evento foi cadastrado com sucesso!","");
			header('Location:../administrador/crud_evento.php');

		}else{

			redirect("Ocorreu um erro ao cadastrar um novo evento!","../administrador/crud_evento.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_evento.php");
	}
