<?php 
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma turma para editar se quiser acessar essa página!","crud_turma.php");
	}

	$sql = "SELECT * from tb_turma join tb_sala on id_sala = cd_sala join tb_curso on id_curso = cd_curso where cd_turma = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();

		if($row->st_turma == 0){
			$row->st_turma = "Inativo";
		}else{
			$row->st_turma = "Ativo";
		}
		
		$row->dt_turma = formatar_para_materialize($row->dt_turma); 
	}else{
		redirect("O código dessa turma não existe","crud_curso.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Atualizar Turma</title>
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

				<!-- Lista de Alunos -->
				<div class="col l4 s12" style="padding-right:0px;">

					<!-- Barra de Alunos -->
					<div class="item_top col white-text center center-align" style="width:98%;">
						<h3>Lista de Alunos</h3>
					</div>
					<div class="item_bot col white" style="width:98%;height:83vh;margin:0;padding:0; overflow:auto;">

						<!-- Pesquisa -->
						<div class="input-field col l10 offset-l1 s12">
							<i class="material-icons prefix">search</i>
							<input type="text" name="search" id="search">
							<label for="search">Pesquisa</label>
						</div>
						<!-- Fim da Pesquisa -->

						<!-- Lista de Alunos -->
						<div id="a_lista" class="col s12 white">
							<table>
								<thead>
									<tr>
										<th>Código - Nome</th>
									</tr>
								</thead>
								<tbody id="tbody">
									<?php include_once("../functions/exibir_alunos.php");
										include_once("../functions/exibir_turma_matricula.php");
										$query_a = exibir_alunos(2);
										$array_alunos = exibir_turma_matricula(3,$row->cd_turma);

										if(!empty($query_a)){
											while($row_a = $query_a->fetch_object()){
												$exibir = $row_a->cd_matricula." - ".$row_a->nm_matricula;
												if(in_array($exibir,$array_alunos)){

												}else{

													?>
													<tr id="<?php echo "t_tr".$row_a->cd_matricula; ?>" class="search_item">
														<td class="aluno_td">
															<?php echo $exibir; ?>
															<a class="btn-floating right" href="#!" onclick="cadastrar_aluno(<?php echo $row_a->cd_matricula; ?>)">
																<i class="material-icons">send</i>
															</a>
														</td>
														<!-- Botão que adiciona os alunos a turma -->
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
					<!-- Fim da Barra de Alunos -->

				</div>
				<!-- Fim da Lista de Alunos -->

				<!-- Informações da Turma -->
				<div class="item_top col l8 s12 white-text center center-align">
					<h3><?php echo $row->nm_sala; ?> de <?php $a = explode(',',$row->dt_turma); echo $a[1]; ?></h3>
				</div>
				<div class="item_bot col l8 s12 white" style="overflow-y: auto;">
					
					<!-- Informações da Turma -->
					<div class="col s12">
						<!-- <b>Nome:</b> <?php echo $row->nm_sala; ?><br>
						<b>Sigla:</b> <?php echo $row->sg_sala; ?><br>
						<b>Curso:</b> <?php echo $row->nm_curso; ?><br>
						<b>Ano:</b> <?php echo $row->dt_turma; ?><br>
						<b>Status:</b> <?php echo $row->st_turma; ?><br> -->

						<!-- <div class="input-field col s8">
							<input type="text" name="nm_sala" id="nm_sala" value="<?php echo $row->nm_sala; ?>">
							<label for="nm_sala">Nome da Sala</label>
						</div> -->
						<div class="input-field col s8">
							<i class="material-icons prefix">border_color</i>
							<select id="id_sala" name="id_sala" required onchange="atualizar_turma()">
								<?php

								echo "<option value='$row->id_sala'>$row->nm_sala</option>";

								$sql_1 = "SELECT * FROM tb_sala where cd_sala != $row->id_sala";
								$query_1 = $mysqli->query($sql_1);

								while($row_1 = $query_1->fetch_object()){

									$cd = $row_1->cd_sala;
									$nome = $row_1->nm_sala;

									echo "<option value='$cd'>$nome</option>";

								}
								
								?>
							
							</select>
							<label for="id_sala">Sala</label>
						</div>
						<div class="input-field col s4">
							<input type="text" class="datepicker" name="dt_turma" id="dt_turma" value="<?php echo $row->dt_turma; ?>" onchange="atualizar_turma()">
							<label for="dt_turma">Data da Turma</label>
						</div>
						<div class="input-field col s4">
							<input type="text" name="sg_sala" id="sg_sala" readonly value="<?php echo $row->sg_sala; ?>">
							<label for="sg_sala">Sigla da Sala</label>
						</div>
						<div class="input-field col s8">
							<input type="text" name="nm_curso" id="nm_curso" readonly value="<?php echo $row->nm_curso; ?>">
							<label for="nm_curso">Curso</label>
						</div>
						<div class="input-field col s12">
							<input type="text" name="st_turma" id="st_turma" readonly value="<?php echo $row->st_turma; ?>">
							<label for="st_turma">Status da Turma</label>
						</div>
					</div>
					<!-- Fim das Informações da Turma -->

					<!-- Alunos cadastrados -->
					<div class="item_sub col s12">
						<h4>Alunos Cadastrados</h4>
					</div>
					<div class="col s12">
						<table>
							<thead>
								<tr>
									<th>Código</th>
									<th>Nome</th>
									<th>E-mail</th>
									<th>Cidade</th>
									<th>Excluir</th>
									<th>Inativar</th>
								</tr>
							</thead>
							<tbody>
								<?php

									include_once("../functions/exibir_turma_matricula.php");
									$query = exibir_turma_matricula(2,$row->cd_turma);
									
									//Verifica qual foi o retorno
									if($query == "erro"){
										echo "<tr>";
										echo "<td colspan='6'>Não existem registros cadastrados!</td>";
										echo "</tr>";
									}else{

										while($row_a = $query->fetch_object()){
											echo "<tr>";
											echo "<td>$row_a->cd_matricula</td>";
											echo "<td>$row_a->nm_matricula</td>";
											echo "<td>$row_a->tx_email</td>";
											echo "<td>$row_a->ds_cidade</td>";
											echo "<td><a class='btn-floating' href='../actions/excluir_turma_matricula.php?cd=$row_a->cd_turma_matricula'><i class='material-icons'>delete</i></a></td>";
											echo "<td><a class='btn-floating' href='../actions/inativar_turma_matricula.php?cd=$row_a->cd_turma_matricula'><i class='material-icons'>close</i></a></td>";
										}

									}

								?>
							</tbody>
						</table>
					</div>
					<!-- Fim dos Alunos Cadastrados -->
				</div>
				<!-- Fim das Informações da Turma -->

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
					$(".aluno_td .btn-floating").css("display","table-cell");
					$(".aluno_td .btn-floating i").css("display","table-cell");
				}
			});

			//Função que cadastra os alunos
			function cadastrar_aluno(cd_aluno){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/cadastrar_turma_matricula.php',
					data: {
						'id_matricula': cd_aluno,
						'id_turma': <?php echo $row->cd_turma; ?>
					}
				});

				setInterval(function(){
                    window.location = "editar_turma.php?cd=<?php echo $row->cd_turma; ?>";
                },150);
			}

			function atualizar_turma(){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/atualizar_turma.php',
					data: {
						'dt_turma': document.getElementById("dt_turma").value,
						'id_sala': document.getElementById("id_sala").value,
						'cd': <?php echo $row->cd_turma; ?>
					}
				});

				setInterval(function(){
                    window.location = "editar_turma.php?cd=<?php echo $row->cd_turma; ?>";
                },150);
			}
		</script>
		<script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
            });
        </script>
	</body>
</html>