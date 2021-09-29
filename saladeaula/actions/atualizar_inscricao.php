<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['cd_audicao']) and isset($_POST['inscricao']) and isset($_POST['dt_encontro']) and isset($_POST['hr_encontro'])){

		$cd_audicao = $_POST['cd_audicao'];
		$inscricao = $_POST['inscricao'];
        $dt_encontro = $_POST['dt_encontro'];
        $hr_encontro = $_POST['hr_encontro'];
        
        //Busca o código da inscrição
        $sql_v = "SELECT * from tb_inscrito_audicao where cd_inscrito_audicao = $inscricao";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            $row_v = $query_v->fetch_object();

            $cd_inscricao = $row_v->cd_inscricao;
        }else{
            redirect("Não foi possível verificar o código da inscrição!","../administrador/editar_audicao.php?cd=$cd_audicao");
            exit;
        }
		
        //Formatar data
        if($dt_encontro == '00 00, 0000'){
            $dt_encontro = '0000-00-00';
        }else{
            $dt_encontro = formatar_data_materialize($dt_encontro);
        }

		//Atualiza o evento
        $sql = "UPDATE tb_inscrito_audicao set ";
        $sql .= "dt_encontro = '$dt_encontro', ";
        $sql .= "hr_encontro = '$hr_encontro' where cd_inscrito_audicao = $inscricao";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu evento foi atualizado com sucesso!","");
			header("Location:../administrador/editar_audicao.php?cd=$cd_audicao&inscricao=$inscricao");

		}else{

			redirect("Ocorreu um erro ao atualizar a inscrição!","../administrador/editar_audicao.php?cd=$cd_audicao&inscricao=$inscricao");

		}

	}else{
        redirect("Por favor, preencha o formulário!","../administrador/crud_audicao.php");
	}
