<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Cadastro Tarefa</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?>

			<div class="col s12">
				<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<div class="topo_box center center-align col s10 offset-s1">
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer" onclick="window.location = 'crud_tarefa.php';">
					</div>
					<div class="col s12 center center-align">
						<h4 onclick="rodar();">Cadastrar Tarefa</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="../actions/cadastrar_tarefa.php" method="post">
							<div class="input-field">
								<i class="material-icons prefix">title</i>
								<label for="nm_tarefa">Nome da Tarefa:</label>
								<input type="text" name="nm_tarefa" id="nm_tarefa" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<select name="id_atividade" required>
									<option disabled="disabled" selected >Selecione uma atividade</option>
									<?php

									include('../functions/db_connect.php');

									$mysqli = db_connect();
									$sql = "SELECT * FROM tb_atividade";
									$query = $mysqli->query($sql);

									while($row = $query->fetch_object()){

										$cd = $row->cd_atividade;
										$nome = $row->nm_atividade;

										echo "<option value='$cd'>$nome</option>";

									}
									?>
								<label>Atividade</label>
								
								</select>
							</div>

							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<select name="id_turma" required>
									<option disabled="disabled" selected >Selecione uma turma</option>
									<?php

									$sql_1 = "SELECT * FROM tb_turma JOIN tb_sala ON id_sala = cd_sala";
									$query_1 = $mysqli->query($sql_1);

									while($row_1 = $query_1->fetch_object()){

										$cd = $row_1->cd_turma;
										$data = $row_1->dt_turma;
										$nome = $row_1->nm_sala;

										echo "<option value='$cd'>$nome - $data</option>";

									}
									
									?>
								<label>Turma</label>
								
								</select>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">today</i>
								<label for="dt_tarefa">Data Inicial:</label>
								<input type="text" class="datepicker" name="dt_tarefa" id="dt_tarefa" required onfocus="document.getElementById('id_atividade').focus();">
							</div>
							<div class="input-field">
								<i class="material-icons prefix">today</i>
								<label for="dt_prazo">Data Prazo:</label>
								<input type="text" class="datepicker" name="dt_prazo" id="dt_prazo" required onfocus="document.getElementById('id_atividade').focus();">
							</div>
							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<label for="hr_prazo">Hora Prazo:</label>
								<input type="text" class="timepicker" name="hr_prazo" id="hr_prazo" required onfocus="document.getElementById('id_atividade').focus();">
							</div>
							<div class="input-field center center-align">
								<button type="submit" class="btn" onclick="history.back();">Voltar</button>
								<button type="submit" class="btn">Enviar</button>
							</div>
						</form>
					</div>
					<div class="footer_box">

					</div>
				</div>
			</div>

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/traduzir_datepicker.js"></script>
		<script type="text/javascript">
			$('select').formSelect();
			$('.datepicker').datepicker();
			$('.timepicker').timepicker();
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.modal').modal();
			});
			traduzir_datepicker('#dt_tarefa');
			traduzir_datepicker('#dt_prazo');
		 </script>
	</body>
</html>