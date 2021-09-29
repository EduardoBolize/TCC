<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_galeria']) and isset($_POST['ds_galeria']) and isset($_POST['dt_galeria'])){

		$nm_galeria = $_POST['nm_galeria'];
		$ds_galeria = $_POST['ds_galeria'];
        $dt_galeria = $_POST['dt_galeria'];
        
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
		
		//Formatar data
        $dt_galeria = formatar_para_date($dt_galeria);

		//Cadastra a galeria
		$sql = "INSERT into tb_galeria values (null,'$nm_galeria','$ds_galeria','$dt_galeria',$cd_admin,1)";
		echo $sql;

		if($mysqli->query($sql)){

			//redirect("Sua galeria foi cadastrada com sucesso!","");
			header('Location:../administrador/crud_galeria.php');

		}else{

			redirect("Ocorreu um erro ao cadastrar uma nova galeria!","../administrador/crud_galeria.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_galeria.php");
	}
