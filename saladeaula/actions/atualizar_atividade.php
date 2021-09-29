<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_atividade']) and isset($_POST['ds_atividade']) and isset($_POST['cd_atividade'])){

		$nm_atividade = $_POST['nm_atividade'];
		$ds_atividade = $_POST['ds_atividade'];
        $cd_atividade = $_POST['cd_atividade'];
        
        //Verifica se o código é válido
        $sql_v = "SELECT * from tb_atividade where cd_atividade = $cd_atividade";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            //Código é válido

            //Atualiza os dados do registro
            $sql_up = "UPDATE tb_atividade set nm_atividade = '$nm_atividade', ds_atividade = '$ds_atividade' where cd_atividade = $cd_atividade";
            
            if($mysqli->query($sql_up)){
                //Caso atualize
               // redirect("Sua atividade foi atualizada com sucesso!","");
		    header('Location: ../professor/crud_atividade.php');
            }else{
                //Caso não atualize
                redirect("Não foi possível atualizar sua atividade!","../professor/cadastro_atividade.php");
            }

        }else{
            //Código inválido
            redirect("Por favor, selecione um código válido!","../professor/crud_atividade.php");
        }

	}else{
        redirect("Por favor, preencha o formulário!","../professor/crud_atividade.php");
	}
