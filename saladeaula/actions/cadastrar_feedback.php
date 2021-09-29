<meta charset="utf-8">
<?php

    include_once('../functions/util.php');

	if(isset($_POST['tx_feedback']) and isset($_POST['id_resposta'])){

		$tx_feedback = $_POST['tx_feedback'];
		$id_resposta = $_POST['id_resposta'];
        
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

		//Cadastra o feedback
		$sql = "INSERT into tb_feedback values (null,'$tx_feedback','$id_resposta',$cd_professor)";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu feedback foi cadastrado com sucesso!","");
			header('Location:../professor/crud_feedback.php');

		}else{

			redirect("Ocorreu um erro ao cadastrar um novo feedback!","../professor/crud_feedback.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../professor/cadastro_feedback.php");
	}
