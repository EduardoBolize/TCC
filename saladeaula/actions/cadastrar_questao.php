<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Professor' or $_SESSION['tp_user'] == 'Administrador'){
		$redirect = "../professor/";
	}

	if(isset($_POST['tx_enunciado']) and isset($_POST['tp_questao']) and isset($_POST['vl_pontos'])  and isset($_POST['id_atividade'])){

		$tx_enunciado = $_POST['tx_enunciado'];
		$tp_questao = $_POST['tp_questao'];
		$vl_pontos = $_POST['vl_pontos'];
		$id_atividade = $_POST['id_atividade'];

		//Verifica se já existe uma sala para a qual essa atividade foi passada
		$sql_v = "SELECT * from tb_atividade join tb_tarefa on id_atividade = cd_atividade where cd_atividade = $id_atividade";
		$query_v = $mysqli->query($sql_v);
		if($query_v->num_rows > 0){
			redirect("Já existem turmas que tem essa tarefa aplicada!",$redirect."editar_atividade.php?cd=$id_atividade");
			exit;
		}

		//Tira possiveis ","'s do valor de pontos
		$ponto = explode(",",$vl_pontos);
		if(count($ponto) > 1){
			$ponto = $ponto[0].".".$ponto[1];
			$vl_pontos = $ponto;
		}

		//Cadastra uma questão
		$sql = "INSERT into tb_questao values (null,'$tx_enunciado','$tp_questao','$vl_pontos',$id_atividade,1)";
		//echo $sql;

		if($mysqli->query($sql)){

		}else{
			redirect("Ocorreu um erro ao cadastrar uma nova questão!",$redirect."crud_atividade.php");
			exit;
		}

		//Pega o código da questão
		$sql_q = "SELECT * from tb_questao where tx_enunciado = '$tx_enunciado' and tp_questao = '$tp_questao' and vl_pontos = '$vl_pontos' and id_atividade = '$id_atividade' and st_questao = 1";
		$query_q = $mysqli->query($sql_q);

		if($query_q->num_rows > 0){
			$row_q = $query_q->fetch_object();
		}else{
			redirect("Ocorreu um erro ao encontrar sua questão!",$redirect."crud_atividade.php");
			exit;
		}
		
		if($tp_questao == 0){
			//Discertativa
			header("Location: ".$redirect."editar_atividade.php?cd=$id_atividade");
		}else if($tp_questao == 1){
			//Objetiva
			$letras = ['','A','B','C','D','E','F','G'];
			$st_correta = $_POST["st_correta"];
			$c = 0;
			foreach ($_POST["tx_alternativa"] as $alt) {
				$c++;
				if($st_correta == $c){
					$st_c = 1;
				}else{
					$st_c = 0;
				}
				$ins = "INSERT INTO tb_alternativa values (null,'".$letras[$c]."','$alt',$row_q->cd_questao,$st_c,null)";
				if($mysqli->query($ins)){
					header("Location: ".$redirect."editar_atividade.php?cd=$id_atividade");
				}else{
					header("Location: ".$redirect."editar_atividade.php?cd=$id_atividade");
				}
			}
		}

	}else{
		redirect("Por favor, preencha o formulário!",$redirect."crud_atividade.php");
	}
