<?php
	include_once '../functions/util.php';
	validar_nivel("admin aluno");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Comunicados </title>
		<link href="../css/material_icons.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			.collapsible li div{
				color:black !important;
			}
		</style>
	</head>
	<body>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?>

			<div class="body col s10 offset-s1 z-depth-1">

				<div class="item_box col s12">
					<div class="item_content">
						<div class=" col s12 header">
							<div class="item_box col s12">
								<div class="item_content">
									<div class="item_top center col s12">
										<h3>Comunicados</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
									<?php
										include_once '../functions/exibir_matricula_comunicado.php';
										$query = exibir_matricula_comunicados(4, $_SESSION['cd_login']);

										echo '<ul class="collapsible">';
										
										//Verifica se não retornou erro
										if($query == "sem_comunicados"){
											?>
											<li class="center center-align">
												<h5>Nenhum comunicado ainda!</h5><br>
											</li>
											<?php
										}else if($query == "nao_aluno"){
											?>
											<li class="center center-align">
												<h5>Você não é um aluno!</h5><br>
											</li>
											<?php
										}else if($query == "erro"){
											?>
											<li class="center center-align">
												<h5>Erro ao exibir comunicados!</h5><br>
											</li>
											<?php
										}else{
											
											while($row = $query->fetch_object()){
												?>
												<li>
													<div class="collapsible-header">
														<i class="material-icons">messege</i>
														<?php echo $row->tx_titulo; ?>
														<i class="material-icons right">keyboard_arrow_down</i>
													</div>
													<div class="collapsible-body">
														<h5><b>Título: </b><?php echo $row->tx_titulo; ?></h5>
														<span><b>Descrição: </b><?php echo $row->ds_descricao; ?></span><br>
														<?php 
															if($row->dt_assunto != '00/00/0000'){
																echo "<span><b>Data: </b> $row->dt_assunto </span><br>";
															}
														?>
														<span><b>Comunicado criado em: </b><?php echo $row->dt_criacao; ?></span><br>
														<span><b>Por: </b><?php echo $row->nm_autor; ?></span>
													</div>
												</li>
												<?php
											
											}
										}

										echo '</ul>';

									?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Scripts-->
		<script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="../js/materialize.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.collapsible').collapsible();
			});
		</script>
	</body>
</html>
