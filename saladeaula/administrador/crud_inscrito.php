<?php include_once('../functions/util.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Inscrito </title>
        <link href="/saladeaula/css/material_icons.css" rel="stylesheet">        
        <link rel="stylesheet" type="text/css" href="/saladeaula/css/style.css">
        <link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
		<!-- Modal de Inativação -->
    	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Inativar Inscrito?</h4>
				<p>Deseja realmente <span id="status">Teste</span> o inscrito <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
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
										<h3> Inscritos </h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
													<th><a class="btn-floating waves-effect waves-light btn-small" href="cadastro_inscrito.php"><i class="material-icons right">add</i>cadastrar</a></th>
													<th>Nome</th>
													<th>CPF</th>
													<th>Cidade</th>
													<th>Telefone</th>
													<th>E-mail</th>
													<th>Status</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<?php
													include_once('../functions/exibir_inscritos.php');
													
													exibir_inscritos(1);
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
			function muda_modal(nome,cd,status){
    	 		document.getElementById('nome_modal').innerHTML = nome;
    	 		document.getElementById('status').innerHTML = status;
    	 		document.getElementById('href_modal').href = "../actions/inativar_inscrito.php?cd="+cd;
    	 	}
        </script>
    </body>
</html>
