<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_evento']) and isset($_POST['dt_evento']) and isset($_POST['st_publico']) and isset($_POST['ds_evento']) and isset($_POST['cd_evento'])){

		$nm_evento = $_POST['nm_evento'];
		$dt_evento = $_POST['dt_evento'];
        $st_publico = $_POST['st_publico'];
        $ds_evento = $_POST['ds_evento'];
        $cd_evento = $_POST['cd_evento'];
        
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
        
        //Busca o código do evento
        $sql_e = "SELECT * from tb_evento where cd_evento = $cd_evento";
        $query_e = $mysqli->query($sql_e);

        if($query_e->num_rows > 0){
            $row_e = $query_e->fetch_object();

            $cd_admin = $row_e->cd_admin;
        }else{
            redirect("Não foi possível verificar o código do evento!","../administrador/crud_evento.php");
            exit;
        }
		
		//Formatar data
        $dt_evento = formatar_data_materialize($dt_evento);

		//Atualiza o evento
        $sql = "UPDATE tb_evento set ";
        $sql .= "nm_evento = '$nm_evento', ";
        $sql .= "dt_evento = '$dt_evento', ";
        $sql .= "st_publico = '$st_publico', ";
        $sql .= "ds_evento = '$ds_evento', ";
        $sql .= "id_admin = '$cd_admin' where cd_evento = $cd_evento";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu evento foi atualizado com sucesso!","");
			header('Location:../administrador/crud_evento.php');

		}else{

			redirect("Ocorreu um erro ao atualizar seu evento!","../administrador/crud_evento.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_evento.php");
	}
