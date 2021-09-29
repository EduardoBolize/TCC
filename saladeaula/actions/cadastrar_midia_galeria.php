<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['cd_galeria']) and isset($_POST['id_midia'])){
		$cd_galeria = $_POST['cd_galeria'];
        $id_midia = $_POST['id_midia'];
        
        //Verifica código da midia
        $sql_m = "SELECT * from tb_midia where cd_midia = $id_midia";
        $query_m = $mysqli->query($sql_m);

        if($query_m->num_rows == 0){
            redirect("O código da midia não é válido","../administrador/crud_galeria.php");
            exit;
        }

        //Verifica código da galeria
        $sql_g = "SELECT * from tb_galeria where cd_galeria = $cd_galeria";
        $query_g = $mysqli->query($sql_g);

        if($query_g->num_rows == 0){
            redirect("O código da galeria não é válido","../administrador/crud_galeria.php");
            exit;
        }

        //Insere os dados
        
        $sql = "INSERT into tb_midia_galeria values (null, $cd_galeria, $id_midia)";

		if($mysqli->query($sql)){
			//Caso cadastre
			header('Location:../administrador/editar_galeria.php?cd='.$cd_galeria);
		}else{
			//Caso não cadastre
			redirect("Seu cadastro não pode ser efetuado!","../administrador/editar_galeria.php?cd=$cd_galeria");
		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/crud_galeria.php");
	}