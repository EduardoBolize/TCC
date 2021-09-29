<?php
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		header("Location: crud_boletim.php");
	}

	$sql = "SELECT * from tb_turma join tb_sala on id_sala = cd_sala where cd_turma = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row_turma = $query->fetch_object();

		if($row_turma->st_turma == 0){
			$row_turma->st_turma = "Inativo";
		}else{
			$row_turma->st_turma = "Ativo";
		}
	}else{
		redirect("O código dessa turma não existe","crud_boletim.php");
	}
	
?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Visualizar Boletim</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			.row{
				margin-bottom:0 !important;
			}
			#a_lista{
				overflow:auto !important;
			}
			.item_sub{
				background-color:#771668;
				color:white;
			}
			.item_bot{
				height:83vh;
			}
			.btn:focus, .btn-large:focus, .btn-small:focus, .btn-floating:focus{background-color:#721852 !important}
		</style>
	</head>
	<body>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?><br>

			<div id="dados" class="col s12">

				<!-- Lista de salas -->
				<div class="col l4">

					<!-- Barra de salas -->
					<div class="item_top col white-text center center-align" style="width:98%;">
						<h3>Alunos</h3>
					</div>
					<div class="item_bot col white" style="width:98%;height:83vh;margin:0;padding:0; overflow:auto;">

						<!-- Pesquisa -->
						<div class="input-field col l10 offset-l1 s12">
							<i class="material-icons prefix">search</i>
							<input type="text" name="search" id="search">
							<label for="search">Pesquisa</label>
						</div>
						<!-- Fim da Pesquisa -->

						<!-- Lista de salas -->
						<div id="a_lista" class="col s12 white">
							<table>
								<thead>
									<tr>
										<th>Código - Nome</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<?php 
										include_once("../functions/exibir_turma_matricula.php");
										$turma_matriculas = exibir_turma_matricula(7,$row_turma->cd_turma);

										if(!empty($turma_matriculas)){
											while($turma_matricula = $turma_matriculas->fetch_object()){
											?>
											<tr class="search_item">
												<td class="sala_td">
													<?php echo $turma_matricula->cd_turma_matricula ?> - <?php echo $turma_matricula->nm_matricula ?>
													<a class="btn-floating right" href="visualizar_boletim.php?cd=<?php echo $row_turma->cd_turma; ?>&cd_turma_matricula=<?php echo $turma_matricula->cd_turma_matricula ?>">
														<i class="material-icons">send</i>
													</a>
												</td>
											</tr>
											<?php
											}
										}
									?>
								</tbody>
							</table>
						</div>

					</div>
					<!-- Fim da Barra de salas -->

				</div>
				<!-- Fim da Lista de salas -->

				<!-- Informações da Sala -->
				<div class="item_top col l8 white-text center center-align">
					<h3><?php echo $row_turma->nm_sala; echo " de ".explode("-",$row_turma->dt_turma)[0]; ?></h3>
				</div>
				<div class="item_bot col l8 white" style="overflow-y: auto;">

					<?php
					if(!isset($_GET["cd_turma_matricula"])){
					
						?>
						<br>
						<!-- Matérias Cadastradas -->
						<div class="item_sub col s12">
							<h4>Visualizar Notas</h4>
						</div>
						<div class="col s12">
							<p>Selecione um aluno para começar!</p>
						</div>
						<!-- Fim dos salas Cadastrados -->
					<?php
					}else{

						$cd_turma_matricula = $_GET['cd_turma_matricula'];

						include_once("../functions/exibir_turma_matricula.php");
						$dados_matricula = exibir_turma_matricula(5,$cd_turma_matricula);

						?>
						<br>
						<!-- Matérias Cadastradas -->
						<div class="item_sub col s12">
							<h4><?php echo $dados_matricula->cd_turma_matricula." - ".$dados_matricula->nm_matricula; ?></h4>
						</div>
						<div class="col s12">
							<ul class="collapsible">
								<?php
									include_once("../functions/exibir_tarefas.php");
									$tarefas = exibir_tarefas(5,$row_turma->cd_turma);

									if(!empty($tarefas)){
										while($tarefa = $tarefas->fetch_object()){

											$sql = "SELECT * from tb_questao where id_atividade = $tarefa->id_atividade";
											$query = $mysqli->query($sql);
											$nota_aluno = 0;
											$nota_total = 0;
											$percent = 0;
											$nr_questao = 0;
											
											//Pega a nota de cada questao
											while($questao = $query->fetch_object()){
												$nr_questao++;

												$nota_total += $questao->vl_pontos;

												//Verifica se a questão já foi respondida
												include_once("../functions/exibir_resposta.php");
												$resposta = exibir_respostas(2,$tarefa->cd_tarefa,$questao->cd_questao);

												if(!empty($resposta)){
													if($resposta->vl_resposta != "-1"){
														$vl_resposta = $resposta->vl_resposta;
													}else{
														$vl_resposta = 0;
													}
													$nota_aluno += $vl_resposta;
												}else{
													$nota_aluno += 0;
												}
											}

											//Calcula a porcentagem
											if($nota_total != 0){
												$percent = 100*$nota_aluno/$nota_total;
												$percent = round($percent,2);	//Arredonda para 2 casas decimais

												?>
												<li>
													<div class="collapsible-header">
														<i class="material-icons">dialpad</i><?php echo $tarefa->nm_atividade; ?> &nbsp;
														<span style="color:grey"><?php echo $nota_aluno; ?>/<?php echo $nota_total; ?> (<?php echo $percent; ?>%)</span>
													</div>
													<div class="collapsible-body">
														<p><?php echo $tarefa->nm_atividade." - ".$tarefa->dt_tarefa; ?></p>
														<p>Nº de Questões: <?php echo $nr_questao; ?></p>
													</div>
												</li>
												<?php
											}
										}
									}
								?>
							</ul>
						</div>
						<!-- Fim dos salas Cadastrados -->
						<?php
						}
					?>
				</div>
				<!-- Fim das Informações da Sala -->

			</div>

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.datepicker').datepicker();
				$('select').formSelect();
				$('.sidenav').sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();
				$('.dropdown-trigger').dropdown();
                $('.collapsible').collapsible();
			});
		</script>
		<script>
			$("#search").on("keyup",function(){
				if(this.value == ''){
					$(".search_item").find(":contains('')").css("display","table-cell");
				}else{
					$(".search_item").find(":contains('')").css("display","none");
					$(".search_item").find(":contains('"+this.value+"')").css("display","table-cell");
					$(".sala_td .btn-floating").css("display","table-cell");
					$(".sala_td .btn-floating i").css("display","table-cell");
				}
			});
		</script>
	</body>
</html>