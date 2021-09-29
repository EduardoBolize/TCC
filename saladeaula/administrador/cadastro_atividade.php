<?php include_once('../functions/util.php'); ?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Cadastro Atividade</title>
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
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer;" onclick="window.location = 'crud_atividade.php';">
					</div>
					<div class="col s12 center center-align">
						<h4 onclick="rodar();">Cadastrar Atividade</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="../actions/cadastrar_atividade.php" method="post">
							<div class="input-field">
								<i class="material-icons prefix">note_add</i>
								<label for="nm_atividade">Nome:</label>
								<input type="text" name="nm_atividade" id="nm_atividade" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<label for="ds_atividade">Descrição:</label>
								<input type="text" name="ds_atividade" id="ds_atividade" required>
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
		<script type="text/javascript" src="/saladeaula/js/autocomplete_atividade.js"></script>
		<script type="text/javascript">
			$('select').formSelect();
			$('.datepicker').datepicker();
			$('.timepicker').timepicker();
		</script>
		<script type="text/javascript" src="../js/autocomplete_atividade.js"></script>
		<script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		    	$('.modal').modal();
		  	});
    	 </script>
	</body>
</html>