<?php
	include_once("../functions/util.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Comunicado</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<!-- Modal de Inativação -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Inativar Comunicado?</h4>
				<p>Deseja realmente <span id="act_modal">Teste</span> o Comunicado <span id="nome_modal">Teste</span>? Você poderá reativá-lo se necessário!</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
				<a href="#!" id="href_modal" class="modal-close waves-effect waves-green btn-flat">Sim</a>
			</div>
		</div>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?>
			<div class="item_box col s12 m10 offset-m1">
				<div class="item_content">
					<div class="item_top col s12 center center-align">
						<h3>Comunicados | Funções</h3>
					</div>
					<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
						<table>
							<thead>
								<tr>
									<th><a class="btn-floating waves-effect waves-light btn-small" href="cadastro_comunicado.php"><i class="material-icons right">add</i>cadastrar</a></th>
									<th>Nome</th>
									<th>Descrição</th>
									<th>Data do Assunto</th>
									<th>Data de Envio</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
								<?php

									include_once('../functions/exibir_comunicados.php');
									exibir_comunicados(1);
										
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>                  

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.modal').modal();
			});
			function muda_modal(nome,cd,act){
    	 		document.getElementById('nome_modal').innerHTML = nome;
    	 		document.getElementById('href_modal').href = "../actions/inativar_comunicado.php?cd="+cd;
    	 		document.getElementById('act_modal').innerHTML = act;
    	 	}
		</script>
	</body>
</html>	