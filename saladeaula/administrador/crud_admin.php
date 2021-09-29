<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Administrador</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
	</head>
	<body>
		<!-- Modal de Inativação -->
		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Inativar Administrador?</h4>
				<p>Deseja realmente <span id="act_modal">Teste</span> o administrador <span id="nome_modal">Teste</span>? Você poderá reativá-lo se necessário!</p>
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

			
							<div class="item_box col s12">
								<div class="item_content">
									<?php
										if(primeira_vez('first_time.txt')){
											?>
											<div class="item_top col s12 center center-align" style="background: red !important">
											<?php
										}else{
											?>
											<div class="item_top col s12 center center-align" >
											<?php
										}?>

									<!-- <div class="item_top col s12 center center-align" > -->
										<h3 id="table_title">
											<?php 
												if(primeira_vez('first_time.txt')){
													echo "Altere sua Senha";
												}else{
													echo "Administradores Ativos";
												}
											?>
										</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
													<th><a class="btn-floating waves-effect waves-light btn-small" href="cadastro_admin.php"><i class="material-icons right">add</i></a></th>
													<th>Nome</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>Nome</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<?php

													include_once('../functions/exibir_administradores.php');
													exibir_administradores(1,'1');
														
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="item_box col s12">
								<div class="item_content">
									<div class="item_top col s12 center center-align">
										<h3 id="table_title">Administradores Inativos</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
													<th>&nbsp;</th>
													<th>Nome</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
													<th>Nome</th>
													<th>&nbsp;</th>
													<th>&nbsp;</th>
												</tr>
											</thead>
											<tbody>
												<?php

													include_once('../functions/exibir_administradores.php');
													$admins_i = exibir_administradores(1,'0');

													if(!empty($admins_i)){
														while($admin_i = $admins_i->fetch_object()){
															?>
															<tr>
																<td><?php echo $admin_i->cd_admin; ?></td>
																<td><?php echo $admin_i->nm_admin; ?></td>
															</tr>
															<?php
														}
													}
														
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
		<script type="text/javascript" src="/saladeaula/js/editar_admin.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.modal').modal();
			});
			function muda_modal(nome,cd,act){
				document.getElementById('nome_modal').innerHTML = nome;
				document.getElementById('href_modal').href = "../actions/inativar_admin.php?cd="+cd;
				document.getElementById('act_modal').innerHTML = act;
			}
		</script>
	</body>
</html>
