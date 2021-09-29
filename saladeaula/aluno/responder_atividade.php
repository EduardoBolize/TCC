<?php 
	include_once('../functions/util.php');
	validar_nivel("aluno");

	include_once("../functions/exibir_turma_matricula.php");
	if(isset($_GET["cd_turma"]) and !empty($_GET["cd_turma"])){
		$dados_matricula = exibir_turma_matricula(6,$_SESSION["cd_login"],$_GET["cd_turma"]);
	}else{
		header("Location: ../home.php");
		exit;
	}

	//$sql = "SELECT nm_atividade, ds_atividade from tb_matricula as m join tb_turma_matricula as tm on tm.id_matricula = m.cd_matricula join tb_turma as t on tm.id_turma = t.cd_turma join tb_tarefa as ta on ta.id_turma = t.cd_turma join tb_atividade on id_atividade = cd_atividade where st_turma = 1 and cd_turma_matricula = $dados_matricula->cd_turma_matricula";

	if(isset($_GET['cd'])){
		$cd = $_GET['cd'];
		$sql_atv = "SELECT * from tb_tarefa join tb_atividade on id_atividade = cd_atividade where cd_tarefa = $cd";
		$query_atv = $mysqli->query($sql_atv);
		$feedback = false;
		if($query_atv->num_rows > 0){
			$atividade = $query_atv->fetch_object();

			date_default_timezone_set("America/Sao_Paulo");
			$date = date("Y-m-d H:i");

			//Verifica se já acabou o prazo
			if(strtotime($atividade->dt_prazo." ".$atividade->hr_prazo) < strtotime($date)){

				//Verifica se a atividade já recebeu um feedback
				$sql_f = "SELECT * from tb_feedback join tb_resposta on id_resposta = cd_resposta join tb_questao as q on id_questao = cd_questao join tb_atividade on q.id_atividade = cd_atividade join tb_tarefa as t on t.id_atividade = cd_atividade join tb_turma_matricula on id_turma_matricula = cd_turma_matricula where id_turma_matricula = $dados_matricula->cd_turma_matricula and cd_tarefa = $cd";
				$query_f = $mysqli->query($sql_f);

				if($query_f->num_rows > 0){
					//Tem, pelo menos, 1 feedback cadastrado
					$feedback = true;
				}else{
					redirect("Essa atividade não pode mais ser entregue! Acabou o prazo! Aguarde o professor avaliar sua resposta","../home.php?cd_turma=".$_GET["cd_turma"]);
					exit;
				}
			}

		}else{
			redirect('Esta atividade não existe!','../home.php');
		}
	}else{
		redirect('Forneça uma atividade para acessar essa página!','../home.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Responder Atividade</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="content row">
			<?php
				include '../components/menu.php';
			?>

			<div class="col s12">
				<?php 
					$sql = "SELECT tx_cor from tb_tarefa_materia as tm join tb_materia on tm.id_materia = cd_materia where id_tarefa = $atividade->cd_tarefa";
					$cats = $mysqli->query($sql);

					if($cats->num_rows > 0){
						$cat = $cats->fetch_object();
						$cor = $cat->tx_cor;
					}else{
						$cor = "black";
					}

					$sql = "SELECT nm_professor as nome,url_arquivo as url_a from tb_tarefa join tb_professor on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa UNION ";
					$sql .= "SELECT nm_admin as nome,url_arquivo as url_a from tb_tarefa join tb_admin on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa";
					$cats = $mysqli->query($sql);

					if($cats->num_rows > 0){
						$cat = $cats->fetch_object();
					}
				?>
				<a class="col s12 l10 offset-l1 z-depth-2" style="border-radius: 10px 10px 0px 0px;padding:0px;margin-top:50px;margin-bottom:0px !important; background-color:<?php echo $cor; ?>; padding-top:5px;">
					<div class="col s12 m9 l9">
						<div class="col s3 m2 l2">
							<img style="width:100%; height:auto; border-radius:100%;" src="../../img/professores/<?php echo $cat->url_a; ?>">
						</div>
						<div class="col s9 m10 l10 white-text" style="text-shadow:1px 1px black;">
							<h5 style="font-size:20pt;"><u><?php echo "$atividade->nm_atividade"; ?></u></h5>
							<p style="padding:0; margin:0;font-size:15pt;"><?php echo $cat->nome; ?></p>
							<p style="padding:0; margin:0;">&nbsp;Postado em <?php echo $atividade->dt_tarefa; ?></p>
						</div>
						<div class="col s12">
							<p class="white-text" style="text-shadow:1px 1px black;"><u>Descrição:</u> <?php echo $atividade->ds_atividade; ?></p>
						</div>
					</div>
					<!-- Nota -->
					<div id="display_nota" class="col s12 m3 l3 center-align" style="display:none;">
						<div class="col white-text s6 m12 l12">
							<h5>Sua Nota:</h5>
						</div>
						<div class="col s6 l12 white-text">
							<span style="font-weight:bolder; font-size:20pt;" id="porcentagem_nota">100%</span><br>
							<span style="font-size:15pt;" id="pontos_nota">10/10</span>
						</div>
					</div>
					<!-- Fim do "display" da nota -->
				</a>
				<div class="col s12 l10 offset-l1 z-depth-2" style="background-color:white;padding-bottom:20px;">
					<form method="post" action="../actions/cadastrar_resposta.php" class="corpo_box col s10 offset-s1">
						<input type="hidden" name="cd_tarefa" value="<?php echo $cd; ?>">
						<input type="hidden" name="cd_turma" value="<?php echo $_GET["cd_turma"]; ?>">
						<?php
							$total_questao = 0;
							$total_resposta = 0;
							$percent = 0;
							$sql = "SELECT * from tb_questao where id_atividade = $atividade->cd_atividade";
							$query = $mysqli->query($sql);
							$c = 1;
							while($questao = $query->fetch_object()){
								$total_questao += $questao->vl_pontos;

								//Verifica se a questão já foi respondida
								include_once("../functions/exibir_resposta.php");
								$resposta = exibir_respostas(2,$cd,$questao->cd_questao);
								if(!empty($resposta)){
									$cd_resposta = $resposta->cd_resposta;
									$nota_resposta = $resposta->vl_resposta;
									$resposta = $resposta->tx_resposta;

									$total_resposta += $nota_resposta;
								}

								echo "<h4>$c. $questao->tx_enunciado</h4>";
								if($questao->tp_questao == 0){
									//Questão dissertativa

									// echo "<textarea name='questao_".$questao->cd_questao."'></textarea>";
									?>
									<div class="input-field">
										<i class="material-icons prefix">message</i>
										<textarea class="materialize-textarea" placeholder="Resposta..." id="questao_<?php echo $questao->cd_questao; ?>" name="questao_<?php echo $questao->cd_questao; ?>" cols="30" rows="5" name="ds_audicao" max="5" required><?php echo $resposta; ?></textarea>
									</div>
									<?php
								}else if($questao->tp_questao == 1){
									//Questão objetiva

									$sql_alt = "SELECT sg_alternativa,cd_alternativa as cd, concat(upper(sg_alternativa),'. ',tx_alternativa) as texto, st_correta, sg_alternativa from tb_alternativa where id_questao = ".$questao->cd_questao;
									
									$query_alt = $mysqli->query($sql_alt);
									while($alternativa = $query_alt->fetch_object()){
										echo "<p>";
										echo "<label>";
										if($resposta == $alternativa->sg_alternativa){
											echo "<input checked required class='with-gap' type='radio' name='questao_".$questao->cd_questao."' value='$alternativa->sg_alternativa'>";
										}else{
											echo "<input required class='with-gap' type='radio' name='questao_".$questao->cd_questao."' value='$alternativa->sg_alternativa'>";
										}

										echo "<span>$alternativa->texto</span>";
										echo "</label>";
										echo "</p>";
									}
								}

								if($feedback == true){
									$sql_feed = "SELECT * from tb_feedback where id_resposta = $cd_resposta";
									$query_feed = $mysqli->query($sql_feed);

									if($query_feed->num_rows > 0){
										//Tem Feedback
										$row_feed = $query_feed->fetch_object();
										?>
										<div class="input-field">
											<label for="feedback_<?php echo $questao->cd_questao; ?>">Feedback:</label>
											<i class="material-icons prefix">message</i>
											<textarea class="materialize-textarea" readonly placeholder="Feedback..." id="feedback_<?php echo $questao->cd_questao; ?>" cols="30" rows="5" max="5" required><?php echo $row_feed->tx_feedback; ?></textarea>
										</div>
										<?php
									}
								}

								if(isset($nota_resposta) and $nota_resposta != "-1"){
									?>
									<div class="input-field">
										<label for="nota_<?php echo $questao->cd_questao; ?>">Nota</label>
										<i class="material-icons prefix">dialpad</i>
										<input readonly type="number" name="nota_<?php echo $questao->cd_questao; ?>" id="nota_<?php echo $questao->cd_questao; ?>" value="<?php echo $nota_resposta; ?>">
									</div>
									<?php
								}
								$c++;
							}

							if($total_questao != 0){
								$percent = 100*$total_resposta/$total_questao;
							}else{
								$percent = 0;
							}
						?>
						<div class="input-field center center-align">
							<a class="btn" onclick="window.location = '../home.php?cd_turma=<?php echo $_GET['cd_turma']; ?>'">Voltar</a>
							<button type="submit" class="btn">Enviar</button>
						</div>
					</form>
					<div class="footer_box">

					</div>
				</div>
			</div>

		</div>


		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(".sidenav").sidenav();
			$('.dropdown-trigger').dropdown();
			$('.modal').modal();
			$('.datepicker').datepicker();
			$('select').formSelect();

			//Exibir nota
			<?php
				
				if($feedback == true){
					?>
					document.getElementById("display_nota").style = '';
					document.getElementById('porcentagem_nota').innerHTML = '<?php echo round($percent,2)."%"; ?>';
					document.getElementById('pontos_nota').innerHTML = '<?php echo $total_resposta."/".$total_questao; ?>';
					<?php
				}
			?>

		</script>
	</body>
</html>