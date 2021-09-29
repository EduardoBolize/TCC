<?php 
	include_once('../functions/util.php');
	validar_nivel("admin prof");

	//$sql = "SELECT nm_atividade, ds_atividade from tb_matricula as m join tb_turma_matricula as tm on tm.id_matricula = m.cd_matricula join tb_turma as t on tm.id_turma = t.cd_turma join tb_tarefa as ta on ta.id_turma = t.cd_turma join tb_atividade on id_atividade = cd_atividade where st_turma = 1 and cd_turma_matricula = $dados_matricula->cd_turma_matricula";

	if(isset($_GET['cd']) and isset($_GET['cd_turma_matricula'])){
        $cd = $_GET['cd'];
        $cd_turma_matricula = $_GET['cd_turma_matricula'];

        include_once("../functions/exibir_turma_matricula.php");
        $dados_matricula = exibir_turma_matricula(5,$cd_turma_matricula);

		$sql_atv = "SELECT * from tb_tarefa join tb_atividade on id_atividade = cd_atividade where cd_tarefa = $cd";
		$query_atv = $mysqli->query($sql_atv);
		if($query_atv->num_rows > 0){

			$atividade = $query_atv->fetch_object();

		}else{
			redirect('Esta atividade não existe!','../professor/crud_atividade.php');
		}
	}else{
		redirect('Forneça uma atividade para acessar essa página!','../professor/crud_atividade.php');
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Correção</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="content row">
			<?php
				include_once '../components/menu.php';
			?>

			<div class="col s12">
				<div class="col s12 l10 offset-l1 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<form class="corpo_box col s10 offset-s1" style="margin-top:10px;" action="../actions/enviar_feedback.php" method="post">
                        <span style="font-size:25pt; font-weight:500;">Aluno: </span>
                        <span style="font-size:25pt;"><?php echo $dados_matricula->nm_matricula; ?></span><br><br>
                        <center><span style="font-size:25pt; font-weight:500;">Atividade: </span>
                        <span style="font-size:25pt;"><?php echo $atividade->nm_atividade; ?></span><br>
                        <span style="font-size:20pt;"><?php echo $atividade->ds_atividade; ?></span><br></center>
						<input type="hidden" name="cd_tarefa" value="<?php echo $atividade->cd_tarefa ?>">
						<input type="hidden" name="id_turma_matricula" value="<?php echo $_GET["cd_turma_matricula"]; ?>">
                        <?php

                            $sql = "SELECT * from tb_questao where id_atividade = $atividade->cd_atividade";
                            $query = $mysqli->query($sql);
							$c = 1;
							$script_feed = "";	//Script com os valores de feedback
                            
							while($questao = $query->fetch_object()){

								//Verifica se a questão já foi respondida
								include_once("../functions/exibir_resposta.php");
								$resposta = exibir_respostas(2,$cd,$questao->cd_questao);
								$cd_resposta = 0;
								if(!empty($resposta)){
									$cd_resposta = $resposta->cd_resposta;
									if($resposta->vl_resposta != "-1"){
										$vl_resposta = $resposta->vl_resposta;
									}else{
										$vl_resposta = "";
									}
									$resposta = $resposta->tx_resposta;
								}

								//Verifica se já existe um feedback cadastrado para essa questão
								include_once("../functions/exibir_feedback.php");
								$feedback = exibir_feedbacks(4,$cd_resposta,$_SESSION["cd_login"]);
								if(!empty($feedback)){
									$feedback = $feedback->tx_feedback;
								}

								//Gerador do script
								$script_feed .= "$('#feedback_$questao->cd_questao').val('$feedback');";

								echo "<h4>$c. $questao->tx_enunciado</h4>";
								if($questao->tp_questao == 0){
									//Questão dissertativa

									// echo "<textarea name='questao_".$questao->cd_questao."'></textarea>";
									?>
									<div class="input-field">
										<i class="material-icons prefix">message</i>
										<textarea class="materialize-textarea" placeholder="Resposta..." id="questao_<?php echo $questao->cd_questao; ?>" name="questao_<?php echo $questao->cd_questao; ?>" cols="30" rows="5" max="5" readonly><?php echo $resposta; ?></textarea>
									</div>
									<?php
								}else if($questao->tp_questao == 1){
									//Questão objetiva

									$sql_alt = "SELECT sg_alternativa,cd_alternativa as cd, concat(upper(sg_alternativa),'. ',tx_alternativa) as texto, st_correta, sg_alternativa from tb_alternativa where id_questao = ".$questao->cd_questao;
									
									$query_alt = $mysqli->query($sql_alt);
									while($alternativa = $query_alt->fetch_object()){
										$alt_cor = "";
										if($resposta == $alternativa->sg_alternativa){
											if($alternativa->st_correta == 1){
												$alt_cor = "green";
												$vl_resposta = $questao->vl_pontos;
											}else{
												$alt_cor = "red";
												$vl_resposta = 0;
											}
											echo "<p style='background-color:$alt_cor;padding-top:15px;margin-top:10px;padding-bottom:15px;margin-bottom:10px'>";
											echo "<label>";
											echo "<input checked required class='with-gap' type='radio' name='questao_".$questao->cd_questao."' value='$alternativa->sg_alternativa'>";
										}else{
											echo "<p>";
											echo "<label>";
											echo "<input required class='with-gap' type='radio' name='questao_".$questao->cd_questao."' value='$alternativa->sg_alternativa'>";
										}

										echo "<span>$alternativa->texto</span>";
										echo "</label>";
										echo "</p>";
									}
								}
								?>
								<div class="input-field">
									<i class="material-icons prefix">message</i>
									<textarea class="materialize-textarea" placeholder="Seu Comentário..." id="feedback_<?php echo $questao->cd_questao; ?>" name="feedback_<?php echo $questao->cd_questao; ?>" cols="30" rows="5" max="5" required></textarea>
								</div>
								<div class="input-field">
									<i class="material-icons prefix">dialpad</i>
									<input required type="number" step="0.01" min="0" max="<?php echo $questao->vl_pontos; ?>" name="nota_<?php echo $questao->cd_questao; ?>" id="nota_<?php echo $questao->cd_questao; ?>" value="<?php echo $vl_resposta; ?>">
								</div>
								<?php
								$c++;
							}
						?>
						<div class="input-field center center-align">
							<a class="btn" onclick="window.location = 'editar_atividade.php?cd=<?php echo $atividade->cd_atividade; ?>&id_turma=<?php echo $atividade->id_turma; ?>'">Voltar</a>
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
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();
                $('.datepicker').datepicker();
                $('select').formSelect();
                $('.collapsible').collapsible();

				//Coloca os dados do feeedback
				<?php echo $script_feed; ?>
            });

		</script>
	</body>
</html>