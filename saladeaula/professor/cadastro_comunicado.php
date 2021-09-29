<?php
	include_once("../functions/util.php");
?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Cadastro Comunicado</title>
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
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer;" onclick="window.location = 'crud_comunicado.php';">
					</div>
					<div class="col s12 center center-align">
						<h4 onclick="rodar();">Cadastrar Comunicado</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="../actions/cadastrar_comunicado.php" method="post">
							<div class="input-field">
								<i class="material-icons prefix">title</i>
								<label for="tx_titulo">Título:</label>
								<input type="text" name="tx_titulo" id="tx_titulo" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">message</i>
								<label for="ds_descricao">Descrição</label>
								<input type="text" name="ds_descricao" id="ds_descricao" required>
							</div>
							<div class="input-field">
								<h5 class="center-align">Mostrar no calendário?</h5>
							</div>
							<p>
								<label>
									<input name="tp_comunicado" type="radio" value="1" checked onchange="toggle_data(this.value)">
									<span><i class="material-icons">visibility</i></span>
								</label>

								<label>
									<input name="tp_comunicado" type="radio" value="2" onchange="toggle_data(this.value)">
									<span><i class="material-icons">visibility_off</i></span>
								</label>
							</p>
							<div class="input-field" id="date_input">
								<i class="material-icons prefix">today</i>
								<label for="dt_assunto">Data</label>
								<input type="text" class="datepicker" name="dt_assunto" id="dt_assunto">
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
		<script type="text/javascript" src="/saladeaula/js/data_comunicado.js"></script>
		<script>
			$(".sidenav").sidenav();
			$(".dropdown-trigger").dropdown();
			$(".datepicker").datepicker();
			traduzir_datepicker("#dt_assunto");

			$("p").css("display","flex");
			$("p").css("justify-content","space-around");
		</script>
	</body>
</html>
