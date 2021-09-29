<?php

    include_once("../functions/util.php");
    
    if($_SESSION['tp_user'] == 'Professor' or $_SESSION['tp_user'] == 'Administrador'){
		$redirect = "../professor/";
	}

	if(isset($_GET['cd'])){

		$cd_questao = $_GET['cd'];

		//Verifica se o código da resposta é válido
		$sql_questao = "SELECT * from tb_questao where cd_questao = $cd_questao";
        $query_questao = $mysqli->query($sql_questao);
        echo $sql;

		if($query_questao->num_rows > 0){

            $row = $query_questao->fetch_object();
            
            $sql = "DELETE from tb_alternativa where id_questao = $cd_questao";
            $query = $mysqli->query($sql);

            echo $sql;

            $sql_del = "DELETE from tb_questao where cd_questao = $cd_questao";

			if($query_del = $mysqli->query($sql_del)){
				//redirect("Sua resposta foi excluida com sucesso!","");
				header('Location: '.$redirect.'editar_atividade.php?cd='.$row->id_atividade);
			}else{
				redirect("Ocorreu um problema ao excluir essa questao!",$redirect.'editar_atividade.php?cd='.$row->id_atividade);
			}

		}else{
			redirect("Não existe esse código de questao!",$redirect."crud_atividade.php");
		}

	}else{
		redirect("Caso deseje utilar essa página, selecione uma questao para excluir!",$redirect."crud_atividade.php");
	}
