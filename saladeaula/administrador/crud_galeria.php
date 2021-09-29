<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Galeria</title>
        <link href="/saladeaula/css/material_icons.css" rel="stylesheet">
        <link href="/saladeaula/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    	<!-- Modal de Inativação -->
    	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Inativar Galeria?</h4>
				<p>Deseja realmente <span id="status">Teste</span> a galeria <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
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
										<h3>Galerias</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">

										<a href="cadastro_galeria.php" class="col s12 m6 l4">
											<div class="card red darken-2">
												<div class="card-content white-text center-align">
													<span class="card-title" style="font-size:2.3rem;">Criar Galeria</span><br>
													<i class="material-icons" style="font-size:4rem;">add</i><br><br>
												</div>
											</div>
										</a>

										<!-- Exibir galerias cadastradas -->
										<?php
											include_once("../functions/exibir_galerias.php");
											$galerias = exibir_galeria(2);

											if(!empty($galerias)){
												while($galeria = $galerias->fetch_object()){
												?>
													<div class="col s12 m6 l4">
														<div class="card blue-grey darken-1">
															<div class="card-content white-text center-align">
																<span class="card-title"><?php echo $galeria->nm_galeria; ?></span>
																<span><?php echo $galeria->ds_galeria; ?></span><br>
																<span><?php echo $galeria->dt_galeria; ?></span><br><br>
																<div class="col s12">
																	<a href="editar_galeria.php?cd=<?php echo $galeria->cd_galeria; ?>" class="btn">Conferir</a>
																</div><br><br>
															</div>
														</div>
													</div>
												<?php
												}
											}
										?>
										

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
    	 		document.getElementById('href_modal').href = "../actions/inativar_audicao.php?cd="+cd;
    	 	}
        </script>
    </body>
</html>
