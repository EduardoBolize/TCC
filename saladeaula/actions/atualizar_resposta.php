<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['tx_resposta']) and isset($_POST['dt_resposta']) and isset($_POST['id_turma_matricula']) and isset($_POST['id_questao']) and isset($_POST['cd_resposta'])){

		$tx_resposta = $_POST['tx_resposta'];
		$dt_resposta = $_POST['dt_resposta'];
		$id_turma_matricula = $_POST['id_turma_matricula'];
        $id_questao = $_POST['id_questao'];
        $cd_resposta = $_POST['cd_resposta'];

        //Formata a data enviada
        $dt_resposta = formatar_data_materialize($dt_resposta);

        //Verifica se o código da resposta é válido
        $sql_v = "SELECT * from tb_resposta where cd_resposta = $cd_resposta";
        $query_v = $mysqli->query($sql_v);

        if($query_v->num_rows > 0){
            //Caso seja válido
            
            $sql_i = "UPDATE tb_resposta set tx_resposta = $tx_resposta, dt_resposta = $dt_resposta, id_turma_matricula = $id_turma_matricula, id_questao = $id_questao where cd_resposta = $cd_resposta";
            
            if($mysqli->query($sql_i)){
                //Sucesso
                //redirect("Sua resposta foi atualizada com sucesso!","")
		    header('Location:../aluno/teste.php');
            }else{
                //Falha
                redirect("Não foi possivel atualizar a resposta!","../aluno/teste.php");
            }

        }else{
            //Caso seja inválido
            redirect("O código da resposta não é válido!","../aluno/teste.php");
        }

	}else{
        //Campos não setados
		redirect("Por favor, preencha o formulário!","../aluno/teste.php");
	}
