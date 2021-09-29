<style>
	.ati p.p_text{
		margin-top:0px;
		color:#8b8686 !important;
	}
	.tabs .tab a{
		color:rgba(119,22,104,1) !important;
		background-color: transparent !important;
	}
	.tabs .tab a:hover, .tabs .tab a:active,{
		background-color: none !important;
		color: #771668 !important;
	}
	.tabs .indicator{
		position:absolute;
		bottom:0;
		height:5px;
		will-change:left, right;
		background-color: #771668 !important; 
	}
	.ati{
		margin-top: 0.5%;
		padding: 20px !important;
	}
	.ati-title{
		font-size:20pt;
	}
	#div{
		background: rgba(20, 20, 20, 0.5) !important;
		box-shadow: none;
	}
	#test-swipe-1, #test-swipe-2, #test-swipe-3, #test-swipe-4{
		margin-top: 1%;
	}

	#test-swipe-4 .collapsible-body{
		margin-bottom:0px;
		border-bottom:0px;
	}
	#test-swipe-4 .collapsible-body div.col{
		color:black;
	}
</style>
<?php
	//Código da turma
	include_once("functions/exibir_turma_matricula.php");
	$dados_matricula = exibir_turma_matricula(6,$_SESSION["cd_login"],$_GET["cd_turma"]);
?>

<div class="col s12 abas">
  <ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">
	<li class="tab"><a href="#test-swipe-1">Atividades</a></li>
	<li class="tab"><a href="#test-swipe-2">Professores</a></li>
	<li class="tab"><a href="#test-swipe-3">Cronograma</a></li>
	<li class="tab"><a href="#test-swipe-4">Comunicados</a></li>
  </ul>
</div>

	<!-- ATIVIDADES -->

<div id="test-swipe-1" class="col s12">
	<div class="col l3 m2 s12">
		<div class="collection mat">
			<h5 class="collection-item" href="#!" style="color:black;background-color: white;font-size:16pt;">Filtrar Por:</h5>
			<a class="collection-item" href="home.php?cd_turma=<?php echo $_GET["cd_turma"]; ?>" style="text-shadow:1px 1px black; color:white;background-color: black;">Todos</a>
			<?php 
				include_once("functions/exibir_sala_materia.php");
				$materias = exibir_sala_materia(2,$dados_matricula->cd_sala);

				if(!empty($materias)){
					while($materia = $materias->fetch_object()){
					?>
						<a class="collection-item" href="home.php?cd_turma=<?php echo $_GET["cd_turma"]; ?>&filtro=<?php echo $materia->cd_materia; ?>" style="text-shadow:1px 1px black; color:white;background-color: <?php echo $materia->tx_cor; ?>;"><?php echo $materia->nm_materia; ?></a>
					<?php
					}
				}
			?>
		</div>
	</div>

	<div class="col l9 m10 s12">
		<?php
			include_once 'functions/exibir_atividade.php';
			if(isset($_GET["filtro"]) and !empty($_GET["filtro"])){
				$filtro = $_GET["filtro"];
			}else{
				$filtro = "";
			}
			exibir_atividade(3,$dados_matricula->cd_turma_matricula,$filtro);
		?>
		<!-- <div class=" col s12 ati white">
			<div class="col s4 black-text ati-title">Prova de Ballet Clássico</div>
			<div class="col s8 black-text">Atividade pra nota sobre os conteúdos aprendidos</div>
		</div>
		<div class=" col s12 ati white">
			<div class="col s4 black-text ati-title">Pesquisa de História do Ballet</div>
			<div class="col s8 black-text">Faça uma pesquisa sobre a história do Baççet no século XIX</div>
		</div> -->
	</div>
</div>


	<!-- PROFESSORES -->

<div id="test-swipe-2" class="col s12">
	<style type="text/css">
		.item_bot_prof{
			background-color: #fff !important;
			border-radius:10px 10px 10px 10px;
			margin-bottom: 20px;
			color: red !important;
		}
	</style>
					
	<div class="item_bot_prof col s12" style="padding-bottom:10px;padding-top: 10px;overflow-x:auto;">
		<table>
			<thead>
				<tr>
					<th></th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
				</tr>
			</thead>
			<tbody>
				<?php
					
					include_once('functions/exibir_professor_sala_materia.php');
					$professores = exibir_professor_sala_materia(2,$turma->id_sala);

					if(!empty($professores)){
						while($professor = $professores->fetch_object()){
							?>
							<tr>
								<td class="right-align"><img src="/img/professores/<?php echo $professor->url_arquivo; ?>" style="width:100px; height:auto; border-radius:100%;"></td>
								<td><?php echo $professor->nm_professor; ?></td>
								<td><?php echo $professor->tx_email; ?></td>
								<td><?php echo $professor->nr_telefone1; ?></td>
							</tr>
							<?php
						}
					}
						
				?>
			</tbody>
		</table>
	</div>
</div>

	<!-- CRONOGRAMA -->
<div id="test-swipe-3" class="col s12">
	<!-- <div class="content row"> -->

			<div id='calendar'></div>
			
	<!-- </div> -->

	<style>
		body {
			font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
			font-size: 14px;
		}

		#calendar {
			max-height: 1300px !important; 
			max-width: 900px !important;
			margin: 0 auto;
			color:white !important;
		}

		#calendar .fc-day-grid-event{
			background-color:#771668;
			border-color:#771668 !important;
		}

		#calendar .fc-today{
			background-color:#77166865;
		}
		#calendar th, #calendar td{
			color:white !important;
		}
		#calendar .fc-button{

		}
		#calendar .fc-button:focus{
			background-color:#771668;
			color:white;
		} 	
	</style>
</div>

<div id="test-swipe-4" class="col s12" style="overflow-x:auto;">
	<ul class="collapsible white">
		<?php

			include_once('functions/exibir_comunicados.php');
			$comunicados = exibir_comunicados(2,$_SESSION["cd_login"]);

			if(!empty($comunicados)){
				while($comunicado = $comunicados->fetch_object()){
					?>
					<li>
						<div class="collapsible-header black-text"><i class="material-icons">email</i><?php echo $comunicado->dt_criacao." - ".$comunicado->tx_titulo; ?></div>
						<div class="collapsible-body row">
							<div class="col s4 m3 l3">
								<img src="/img/professores/<?php echo $comunicado->url_arquivo; ?>" alt="Imagem do professor" style="width:100%; height:auto; border-radius:100%;">
							</div>
							<div class="col s8 m9 l9">
								<span style="font-size:16pt;"><?php echo $comunicado->nm_autor; ?></span><br>
								<span style="font-size:10pt;"><?php echo $comunicado->tp_user; ?></span>
							</div>
							<div class="col s12" style="margin-top:10px;">
								<p><b>Descrição: </b><?php echo $comunicado->ds_descricao; ?></p>
								<?php
									if($comunicado->dt_assunto != "00/00/0000"){
										echo "<p><b>Data do assunto: </b>".$comunicado->dt_assunto."</p>";
									}
								?>
							</div>
						</div>
					</li>
					<?php
				}
			}else{
				?>
					<li>
						<div class="collapsible-header black-text">Sem comunicados aqui!</div>
						<div class="collapsible-body row black-text">
							<span>Caso um professor ou administrador envie um comunicado, ele será exibido aqui.</span>
						</div>
					</li>
				<?php
			}
		
		?>
	</ul>
</div>