<?php 
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma sala para editar se quiser acessar essa página!","crud_sala.php");
	}

	$sql = "SELECT * from tb_sala join tb_curso on id_curso = cd_curso where cd_sala = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();

		if($row->st_sala == 0){
			$row->st_sala = "Inativo";
		}else{
			$row->st_sala = "Ativo";
		}
	}else{
		redirect("O código dessa Sala não existe","crud_curso.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Atualizar Sala</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			.row{
				margin-bottom:0 !important;
			}
			#a_lista{
				overflow:auto !important;
			}
			.item_sub{
				background-color:#771668;
				color:white;
			}
			.item_bot{
				height:83vh;
			}
			.btn:focus, .btn-large:focus, .btn-small:focus, .btn-floating:focus{background-color:#721852 !important}
		</style>
	</head>
	<body>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?><br>

			<div id="dados" class="col s12">

				<!-- Lista de salas -->
				<div class="col l4 s12" style="padding-right:0px;">

					<!-- Barra de salas -->
					<div class="item_top col white-text center center-align" style="width:98%;">
						<h3>Lista de Matérias</h3>
					</div>
					<div class="item_bot col white" style="width:98%;height:83vh;margin:0;padding:0; overflow:auto;">

						<!-- Pesquisa -->
						<div class="input-field col l10 offset-l1 s12">
							<i class="material-icons prefix">search</i>
							<input type="text" name="search" id="search">
							<label for="search">Pesquisa</label>
						</div>
						<!-- Fim da Pesquisa -->

						<!-- Lista de salas -->
						<div id="a_lista" class="col s12 white">
							<table>
								<thead>
									<tr>
										<th>Código - Nome</th>
									</tr>
								</thead>
								<tbody id="tbody">
                                    <?php 
                                        include_once("../functions/exibir_materia.php");
										include_once("../functions/exibir_sala_materia.php");
										$query_m = exibir_materia(1);
										$array_salas = exibir_sala_materia(3,$row->cd_sala);

										if(!empty($query_m)){
											while($row_m = $query_m->fetch_object()){
                                                $exibir = $row_m->cd_materia." - ".$row_m->nm_materia;
												if(in_array($exibir,$array_salas)){

												}else{

													?>
													<tr id="<?php echo "t_tr".$row_m->cd_materia; ?>" class="search_item">
														<td class="sala_td">
															<?php echo $exibir; ?>
															<a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
																<i class="material-icons">send</i>
															</a>
														</td>
														<!-- Botão que adiciona os salas a Sala -->
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
					<!-- Fim da Barra de salas -->

				</div>
				<!-- Fim da Lista de salas -->

				<!-- Informações da Sala -->
				<div class="item_top col l8 s12 white-text center center-align">
					<h3><?php echo $row->nm_sala; ?></h3>
				</div>
				<div class="item_bot col l8 s12 white" style="overflow-y: auto;">
					
					<!-- Informações da Sala -->
					<div class="col s12">

						<!-- <div class="input-field col s8">
							<input type="text" name="nm_sala" id="nm_sala" value="<?php echo $row->nm_sala; ?>">
							<label for="nm_sala">Nome da Sala</label>
						</div> -->
						<div class="input-field col s8">
                            <i class="material-icons prefix">edit</i>
                            <input type="text" name="nm_sala" id="nm_sala" value="<?php echo $row->nm_sala; ?>">
                            <label for="nm_sala">Nome da Sala</label>
						</div>
						<div class="input-field col s4">
							<input type="text" name="sg_sala" id="sg_sala" value="<?php echo $row->sg_sala; ?>">
							<label for="sg_sala">Sigla da Sala</label>
						</div>
						<div class="input-field col s12">
                            <select id="id_curso" name="id_curso" required onchange="atualizar_sala()">
								<?php

								echo "<option value='$row->id_curso'>$row->nm_curso</option>";

								$sql_1 = "SELECT * FROM tb_curso where cd_curso != $row->id_curso";
								$query_1 = $mysqli->query($sql_1);

								while($row_1 = $query_1->fetch_object()){

									$cd = $row_1->cd_curso;
									$nome = $row_1->nm_curso;

									echo "<option value='$cd'>$nome</option>";

								}
								
								?>
							</select>
							<label for="id_curso">Curso</label>
						</div>
                        <div class="input-field col s12">
                            <button class="col s6 offset-s3 btn" onclick="atualizar_sala()">Enviar</button>
                        </div>
					</div>
					<!-- Fim das Informações da Sala -->

					<!-- Matérias Cadastradas -->
					<div class="item_sub col s12">
						<h4>Matérias Cadastradas</h4>
					</div>
					<div class="col s12">
						<table>
							<thead>
								<tr>
									<th>Código</th>
									<th>Nome</th>
									<th>Descrição</th>
									<th>Excluir</th>
									<th>Inativar</th>
								</tr>
							</thead>
							<tbody>
								<?php

									include_once("../functions/exibir_sala_materia.php");
									$query = exibir_sala_materia(2,$row->cd_sala);
									
									//Verifica qual foi o retorno
									if(!empty($query)){
										while($mat = $query->fetch_object()){
											echo "<tr>";
											echo "<td>$mat->cd_sala_materia</td>";
											echo "<td>$mat->nm_materia</td>";
											echo "<td>$mat->ds_materia</td>";
											echo "<td><a class='btn-floating' href='../actions/excluir_sala_materia.php?cd=$mat->cd_sala_materia'><i class='material-icons'>delete</i></a></td>";
											echo "<td><a class='btn-floating' href='../actions/inativar_sala_materia.php?cd=$mat->cd_sala_materia'><i class='material-icons'>close</i></a></td>";
										}
									}

								?>
							</tbody>
						</table>
					</div>
					<!-- Fim dos salas Cadastrados -->
				</div>
				<!-- Fim das Informações da Sala -->

			</div>

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.datepicker').datepicker();
				$('select').formSelect();
				$('.sidenav').sidenav();
				$('.dropdown-trigger').dropdown();
			});
		</script>
		<script>
			$("#search").on("keyup",function(){
				if(this.value == ''){
					$(".search_item").find(":contains('')").css("display","table-cell");
				}else{
					$(".search_item").find(":contains('')").css("display","none");
					$(".search_item").find(":contains('"+this.value+"')").css("display","table-cell");
					$(".sala_td .btn-floating").css("display","table-cell");
					$(".sala_td .btn-floating i").css("display","table-cell");
				}
			});

			//Função que cadastra os salas
			function cadastrar_sala_materia(cd_materia){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/cadastrar_sala_materia.php',
					data: {
						'id_materia': cd_materia,
						'id_sala': <?php echo $row->cd_sala; ?>
					}
				});

                setInterval(function(){
                    window.location = "editar_sala.php?cd=<?php echo $row->cd_sala; ?>";
                },150);
				
			}

			function atualizar_sala(){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/atualizar_sala.php',
					data: {
						'nm_sala': document.getElementById("nm_sala").value,
						'sg_sala': document.getElementById("sg_sala").value,
						'id_curso': document.getElementById("id_curso").value,
						'cd_sala': <?php echo $row->cd_sala; ?>
					}
				});

				setInterval(function(){
                    window.location = "editar_sala.php?cd=<?php echo $row->cd_sala; ?>";
                },150);
			}
		</script>
		<script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();
            });
        </script>
	</body>
</html>