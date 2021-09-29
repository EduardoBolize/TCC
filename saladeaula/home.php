<?php
	include_once('functions/util.php');
	$nome = explode(' ',$_SESSION['nome']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Home</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
		<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<style>
			.fc-time{
				display : none;
			}
		</style>
	</head>

	<body>
		<div class="content row">
			<!-- MENU -->
			<?php 
				include_once("components/menu.php");
			?>
			<!-- FIM DO MENU -->

			<div id="div" class="body col s12 l10 offset-l1 z-depth-1">

				<div class="item_box">
					<div class="item_content">
							
						
						<!-- <div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;"> -->
						<?php

							//Exibição das funções de cada usuário
							if($_SESSION['tp_user'] == 'Administrador'){

								include_once("components/home_administrador.php");

							}else if($_SESSION['tp_user'] == 'Aluno'){

								if(isset($_GET["cd_turma"]) and !empty($_GET["cd_turma"])){

									//Verifica se a turma é válida
									include_once("functions/exibir_turmas.php");
									$turmas = exibir_turmas(5,$_GET["cd_turma"]);

									if($turmas->num_rows > 0){
										$turma = $turmas->fetch_object();

										//Verifica se o aluno está nessa turma
										if(verificar_aluno_turma($_SESSION["cd_login"],$turma->cd_turma)){
											include_once("components/home_aluno_turma.php");
										}else{
											header("Location: home.php");
										}
									}else{
										header("Location: home.php");
									}
								}else{
									include_once("components/home_aluno.php");
								}

							}else if($_SESSION['tp_user'] == 'Professor'){

								include_once("components/home_professor.php");

							}else if($_SESSION['tp_user'] == 'Inscrito'){

								include_once("components/home_inscrito.php");
								
							}

						?>
						<!-- </div> -->
					</div>
				</div>

			

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script src='/saladeaula/fullcalendar/lib/jquery.min.js'></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.js"></script>
		<script src='/saladeaula/fullcalendar/lib/moment.min.js'></script>
		<script src='/saladeaula/fullcalendar/fullcalendar.min.js'></script>
		<script src="/saladeaula/fullcalendar/locale/pt-br.js"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.tabs').tabs();
				$('.collapsible').collapsible();
			
				$('#calendar').fullCalendar({
					defaultDate: '<?php date_default_timezone_set("America/Sao_Paulo");echo date('Y-m-d'); ?>',
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
					<?php 
					include_once("functions/exibir_cronograma.php");
					exibir_cronograma(1);
					?>
					]
			
				});
			});
		</script>
		<script>
		</script>
	</body>
</html>
