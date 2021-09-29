<meta charset="utf-8">
<?php

	//Código da turma
	include_once("../functions/exibir_turma_matricula.php");
	if(isset($_POST["cd_turma"]) and !empty($_POST["cd_turma"])){
		$dados_matricula = exibir_turma_matricula(6,$_SESSION["cd_login"],$_POST["cd_turma"]);
	}else{
		header("Location: ../home.php");
		exit;
	}

	include_once('../functions/util.php');
	
	if(isset($_POST["cd_tarefa"]) and !empty($_POST["cd_tarefa"])){
		$cd = $_POST["cd_tarefa"];

		//Confirma se ainda está no horário de entregar a tarefa
		$sql_v = "SELECT * from tb_tarefa where cd_tarefa = $cd";
		$query_v = $mysqli->query($sql_v);
		
		if($query_v->num_rows > 0){
			//Código válido
			$row_v = $query_v->fetch_object();
			date_default_timezone_set("America/Sao_Paulo");
			$date = date("Y-m-d H:i");

			if(strtotime($row_v->dt_prazo." ".$row_v->hr_prazo) < strtotime($date)){
				redirect("Essa atividade não pode mais ser entregue! Acabou o prazo!","../home.php");
				exit;
			}
		}else{
			redirect("O código da tarefa é inválido","../home.php");
		}

		$sql = "SELECT * from tb_questao as q join tb_atividade on q.id_atividade = cd_atividade join tb_tarefa as t on t.id_atividade = cd_atividade where cd_tarefa = $cd";
		$query = $mysqli->query($sql);
		$c = 1;
		while($questao = $query->fetch_object()){
			if(isset($_POST["questao_".$questao->cd_questao])){

				//Verifica se ja tem resposta cadastrada
				include_once("../functions/exibir_resposta.php");
				$resposta = exibir_respostas(2,$cd,$questao->cd_questao);

				$resp = $_POST["questao_".$questao->cd_questao];

				//Valor resposta '-1' representa que não foi corrigido
				if($resposta != ""){
					//Tem resposta cadastrada anteriormente
					$up = "UPDATE tb_resposta set tx_resposta = '$resp', dt_resposta = '$date', vl_resposta = '-1' where cd_resposta = $resposta->cd_resposta";
					$mysqli->query($up);
				}else{
					$sql = "INSERT into tb_resposta values (null,'$resp','$date','-1',$dados_matricula->cd_turma_matricula,$questao->cd_questao)";
					$mysqli->query($sql);
				}

				redirect("Reposta enviada!","../aluno/responder_atividade.php?cd=$cd&cd_turma=".$_POST["cd_turma"]);

			}
			$c++;
		}
	}else{
		redirect("Por favor, envie uma resposta para acessar essa página!","../home.php?cd_turma=".$_POST["cd_turma"]);
	}
