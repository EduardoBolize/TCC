<?php

    include('../functions/util.php');
    
    if($_SESSION['tp_user'] == 'Inscrito'){
		$redirect = "perfil.php";
	}else if($_SESSION['tp_user'] == 'Administrador'){
		$redirect = "administrador/crud_inscrito.php";
	}

    if(isset($_POST['nm_inscrito']) and isset($_POST['nr_cpf']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone1']) and isset($_POST['nr_telefone2']) and isset($_POST['tx_email']) and isset($_POST['cd_inscrito'])){

		$nm_inscrito= $_POST['nm_inscrito'];
		$nr_cpf = $_POST['nr_cpf'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone1= $_POST['nr_telefone1'];
		$nr_telefone2= $_POST['nr_telefone2'];
		$tx_email = $_POST['tx_email'];
		$cd_inscrito = $_POST['cd_inscrito'];
        
        //Formatar data
        $dt_encontro = formatar_data_materialize($dt_encontro);

        //Verifica se o códig é válido
        $sql_v = "SELECT * from tb_inscrito where cd_inscrito = $cd_inscrito";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            //Código é válido

            $sql = "UPDATE tb_inscrito set nm_inscrito = '$nm_inscrito'";
            $sql .= ", nr_cpf = '$nr_cpf'";
            $sql .= ", ds_endereco = '$ds_endereco'";
            $sql .= ", ds_cidade = '$ds_cidade'";
            $sql .= ", nr_telefone1 = '$nr_telefone1'";
            $sql .= ", nr_telefone2 = '$nr_telefone2'";
            $sql .= ", tx_email = '$tx_email'";
            $sql .= " where cd_inscrito = $cd_inscrito";
            
            if($mysqli->query($sql)){
                //Query efetuada com sucesso
                header("location: ../$redirect");
            }else{
                //Erro na query
                redirect("Ocorreu um erro durante a atualização de seus dados!","../$redirect");
            }

        }else{
            //Código inválido
            //redirect("O código da sua inscrição é inválido!","../$redirect");
        }

    }else{
		redirect("Por favor, preencha o formulário!","../$redirect");
	}
