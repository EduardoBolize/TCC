<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_galeria']) and isset($_POST['ds_galeria']) and isset($_POST['dt_galeria']) and isset($_POST['cd_galeria'])){

		$nm_galeria = $_POST['nm_galeria'];
		$ds_galeria = $_POST['ds_galeria'];
        $dt_galeria = $_POST['dt_galeria'];
        $cd_galeria = $_POST['cd_galeria'];
        
        //Busca o código do administrador
        $sql_v = "SELECT * from tb_admin where id_login = ".$_SESSION['cd_login'];
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            $row_v = $query_v->fetch_object();

            $cd_admin = $row_v->cd_admin;
        }else{
            redirect("Não foi possível verificar seu código de administrador!","../administrador/crud_galeria.php");
            exit;
        }

        //Verifica se o código da galeria é válido
        $sql_g = "SELECT * from tb_galeria where cd_galeria = $cd_galeria";
        $query_g = $mysqli->query($sql_g);

        if($query_g->num_rows == 0){
            //Não existe o código
            redirect("Não foi possível verificar o código da galeria!","../administrador/crud_galeria.php");
            exit;
        }

        //Formatar data
        $dt_galeria = formatar_para_date($dt_galeria);

		//Ataliza a galeria
        $sql = "UPDATE tb_galeria set ";
        $sql .= "nm_galeria = '$nm_galeria', ";
        $sql .= "ds_galeria = '$ds_galeria', ";
        $sql .= "dt_galeria = '$dt_galeria' ";
        $sql .= "where cd_galeria = $cd_galeria";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Sua galeria foi atualizada com sucesso!","");
			header('Location:../administrador/crud_galeria.php');

		}else{

			redirect("Ocorreu um erro ao atualizar essa galeria!","../administrador/crud_galeria.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_galeria.php");
	}
