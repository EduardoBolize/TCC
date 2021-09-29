<meta charset="utf-8">
<?php

    include_once('../functions/util.php');

	if(isset($_POST['tx_feedback']) and isset($_POST['id_resposta']) and isset($_POST['cd_feedback'])){

		$tx_feedback = $_POST['tx_feedback'];
        $id_resposta = $_POST['id_resposta'];
        $cd_feedback = $_POST['cd_feedback'];
        
        //Verifica o código do feedback
        $sql_f = "SELECT * from tb_feedback where cd_feedback = $cd_feedback";
        $query_f = $mysqli->query($sql_f);

        if($query_f->num_rows > 0){
            $row_f = $query_f->fetch_object();

            $cd_feedback = $row_f->cd_feedback;
        }else{
            redirect("Não foi possível verificar seu código de professor!","../professor/crud_feedback.php");
            exit;
		}
        
        //Busca o código do professor
        $sql_v = "SELECT * from tb_professor where id_login = ".$_SESSION['cd_login'];
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            $row_v = $query_v->fetch_object();

            $cd_professor = $row_v->cd_professor;
        }else{
            redirect("Não foi possível verificar seu código de professor!","../professor/crud_feedback.php");
            exit;
		}

		//Atualiza o feedback
        $sql = "UPDATE tb_feedback set ";
        $sql .= "tx_feedback = '$tx_feedback', ";
        $sql .= "id_resposta = '$id_resposta', ";
        $sql .= "id_professor = '$cd_professor' where cd_feedback = $cd_feedback ";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu feedback foi atualizado com sucesso!","");
			header('Location:../professor/crud_feedback.php');

		}else{

			redirect("Ocorreu um erro ao atualizar seu feedback!","../professor/crud_feedback.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../professor/cadastro_feedback.php");
	}
