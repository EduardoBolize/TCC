<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Cadastro Turma</title>
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
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor:pointer;" onclick="window.location = 'crud_turma.php';">
					</div>
					<div class="col s12 center center-align">
						<h4 onclick="rodar();">Cadastrar turma</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="../actions/cadastrar_turma.php" method="post">
							<div class="input-field">
								<i class="material-icons prefix">today</i>
								<label for="dt_turma">Data de Inicio:</label>
								<input type="text" class="datepicker" name="dt_turma" id="dt_turma" required onfocus="document.getElementById('id_sala').focus();">
							</div>
							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<select id="id_sala" name="id_sala" required>
									<option disabled="disabled" selected >Selecione uma sala</option>
									<?php

									$sql = "SELECT * FROM tb_sala";
									$query = $mysqli->query($sql);

									while($row = $query->fetch_object()){

										$cd = $row->cd_sala;
										$nome = $row->nm_sala;

										echo "<option value='$cd'>$nome</option>";

									}
									?>
								<label>Sala</label>
								
								</select>
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
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.modal').modal();
			});
			function muda_modal(nome,cd,act){
				document.getElementById('nome_modal').innerHTML = nome;
				document.getElementById('href_modal').href = "../actions/inativar_aluno.php?cd="+cd;
				document.getElementById('act_modal').innerHTML = act;
			}
			traduzir_datepicker('#dt_turma');
		</script>
	</body>
</html>