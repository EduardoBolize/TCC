<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Boletim</title>
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

        	<div class="body col s10 offset-s1  z-depth-1">

        		<div class="item_box col s12">
					<div class="item_content">
						<div class=" col s12 center center-align header">
							<div class="item_box col s12">
								<div class="item_content">
									<div class="item_top col s12 center center-align">
										<h3>Boletim | Funções</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<!-- Exibir turmas cadastradas -->
										<?php
											include_once("../functions/exibir_turmas.php");
											$turmas = exibir_turmas(5);

											if(!empty($turmas)){
												while($turma = $turmas->fetch_object()){
                                                    $turma->dt_turma = formatar_para_br($turma->dt_turma);
												?>
													<div class="col s12 m6 l4">
														<div class="card blue-grey darken-1">
															<div class="card-content white-text">
																<span class="card-title"><?php echo $turma->nm_sala; ?></span>
																<span><?php echo $turma->dt_turma; ?></span><br><br>
																<div class="col s12">
																	<a href="visualizar_boletim.php?cd=<?php echo $turma->cd_turma; ?>" class="btn">Conferir</a>
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
    	 		document.getElementById('href_modal').href = "../actions/inativar_curso.php?cd="+cd;
    	 	}
        </script>
    </body>
</html>
