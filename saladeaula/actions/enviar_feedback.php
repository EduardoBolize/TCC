<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST["cd_tarefa"]) and isset($_POST["id_turma_matricula"])){
        $cd_tarefa = $_POST['cd_tarefa'];
        $cd_turma_matricula = $_POST['id_turma_matricula'];

        include_once("../functions/exibir_turma_matricula.php");
        $dados_matricula = exibir_turma_matricula(5,$cd_turma_matricula);

		$sql_atv = "SELECT * from tb_tarefa join tb_atividade on id_atividade = cd_atividade where cd_tarefa = $cd_tarefa";
		$query_atv = $mysqli->query($sql_atv);
		if($query_atv->num_rows > 0){

            //Pega o código do professor
            $sql_p = "SELECT * from tb_professor where id_login = ".$_SESSION["cd_login"];
            $query_p = $mysqli->query($sql_p);
            if($query_p->num_rows > 0){
                //Código encontrado 
                $cd_professor = $query_p->fetch_object()->cd_professor;
            }else{
                redirect("Seu código é inválido","../index.php");
                exit;
            }

            $atividade = $query_atv->fetch_object();
            
            $sql = "SELECT * from tb_questao where id_atividade = $atividade->cd_atividade";
            $query = $mysqli->query($sql);
            $c = 1;
            $script_feed = "";	//Script com os valores de feedback
            
            while($questao = $query->fetch_object()){

                //Verifica se a questão já foi respondida
                include_once("../functions/exibir_resposta.php");
                $resposta = exibir_respostas(2,$cd_tarefa,$questao->cd_questao);
                $cd_resposta = 0;
                if(!empty($resposta)){
                    $cd_resposta = $resposta->cd_resposta;
                    $vl_resposta = $resposta->vl_resposta;
                    $resposta = $resposta->tx_resposta;
                }

                //Verifica se já existe um feedback cadastrado para essa questão
                include_once("../functions/exibir_feedback.php");
                $feedback = exibir_feedbacks(4,$cd_resposta,$_SESSION["cd_login"]);
                if(!empty($feedback)){
                    $feedback = $feedback->tx_feedback;
                }

                //Gerador do script
                // $script_feed .= "$('#feedback_$questao->cd_questao').val('$feedback');";

                if(isset($_POST["feedback_".$questao->cd_questao]) and !empty($_POST["feedback_".$questao->cd_questao])){
                    $tx = $_POST["feedback_".$questao->cd_questao];

                    if(empty($feedback)){
                        $ins = "INSERT into tb_feedback values (null,'$tx',$cd_resposta,$cd_professor)";
                    }else{
                        $ins = "UPDATE tb_feedback set tx_feedback = '$tx' where id_resposta = $cd_resposta and id_professor = $cd_professor";
                    }
                    $mysqli->query($ins);
                }

                //Atualiza a nota da resposta
                if(isset($_POST["nota_".$questao->cd_questao]) and !empty($_POST["nota_".$questao->cd_questao])){
                    $tx = $_POST["nota_".$questao->cd_questao];
                    $up = "UPDATE tb_resposta set vl_resposta = '$tx' where cd_resposta = $cd_resposta";
                    $mysqli->query($up);
                }
            }

            header("Location: ../professor/visualizar_resposta.php?cd=$cd_tarefa&cd_turma_matricula=$cd_turma_matricula");

		}else{
			redirect('Esta atividade não existe!','../professor/crud_atividade.php');
		}
	}else{
		redirect('Forneça uma atividade para acessar essa página!','../professor/crud_atividade.php');
	}