<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_materia']) and isset($_POST['ds_materia']) and isset($_POST['tx_cor']) and isset($_POST['cd_materia'])){

        $nm_materia = $_POST['nm_materia'];
        $ds_materia = $_POST['ds_materia'];
        $tx_cor = $_POST['tx_cor'];
        $cd_materia = $_POST['cd_materia'];

        //Verifica se o código é válido
        $sql_v = "SELECT * from tb_materia where cd_materia = $cd_materia";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            //Caso seja válido
            
            $sql_up = "UPDATE tb_materia set nm_materia = '$nm_materia', ds_materia = '$ds_materia', tx_cor = '$tx_cor' where cd_materia = $cd_materia";

            if($mysqli->query($sql_up)){
                //Atualizado com sucesso
                //redirect("A matéria foi atualizada com sucesso!","");
		    header('Location:../administrador/crud_materia.php');
            }else{
                //Falha ao atualizar
                redirect("Não foi possível atualizar a matéria!","../administrador/crud_materia.php");
            }

        }else{
            //Caso seja inválido
            redirect("O código da matéria não é válido!","../administrador/crud_materia.php");
        }

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_materia.php");
	}
