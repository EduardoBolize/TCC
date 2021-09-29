<?php
	include_once('../saladeaula/functions/util.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Audição </title>
        <link href="../saladeaula/css/material_icons.css" rel="stylesheet">
        <link href="../saladeaula/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../saladeaula/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="content row">

			<?php
				include_once('../saladeaula/components/menu.php');
			?>
							<div class="item_box col s12 m10 offset-m1">
								<div class="item_content">
									<div class="item_top col s12 center center-align">
										<h3>Audição Abertas | Lista</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
                                                    <th>Nome</th>
													<th>Descrição</th>
													<th>Data Abertura</th>
													<th>Data Fechamento </th>
													<th>Vagas</th>
													<th>Prestar</th>
												</tr>
											</thead>
											<tbody>
												<?php

													include_once('../saladeaula/functions/exibir_audicao.php');
													$query = exibir_audicao(2);

													if(!empty($query)){
														while($row = $query->fetch_object()){

															//Verifica se já está inscrito
															$audicoes_inscrito = exibir_audicao(3);
															if(!in_array($row->cd_audicao,$audicoes_inscrito)){
																?>
																<tr>
																	<td><?php echo $row->nm_audicao; ?></td>
																	<td><?php echo $row->ds_audicao; ?></td>
																	<td><?php echo $row->dt_abertura; ?></td>
																	<td><?php echo $row->dt_fechamento; ?></td>
																	<td><?php echo $row->nr_vagas; ?></td>
																	<td>
																		<a class="btn-floating btn waves-effect waves-light" href="actions/prestar_audicao.php?cd=<?php echo $row->cd_audicao; ?>">
																			<i class='material-icons tiny'>assignment_turned_in</i>
																		</a>
																	</td>
																</tr>
																<?php
															}
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
        <script type="text/javascript" src="../saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="../saladeaula/js/materialize.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		  	});
        </script>
    </body>
</html>
