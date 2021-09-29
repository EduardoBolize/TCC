<?php
	include_once('../functions/util.php');
?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Visualizar Boletim</title>
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
				<div class="col l4">

					<!-- Barra de salas -->
					<div class="item_top col white-text center center-align" style="width:98%;">
						<h3>Alunos</h3>
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
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00001 - Luiz Gustavo
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00002 - Sara de Lima
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00003 - Guilherme Balog
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00004 - Tabata Chaves
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00005 - Vitória Peniche
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00006 - Luana Gomes
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="search_item">
                                        <td class="sala_td">
                                            00007 - Eduardo Bolize
                                            <a class="btn-floating right" href="#!" onclick="cadastrar_sala_materia(<?php echo $row_m->cd_materia; ?>)">
                                                <i class="material-icons">send</i>
                                            </a>
                                        </td>
                                    </tr>
								</tbody>
							</table>
						</div>

					</div>
					<!-- Fim da Barra de salas -->

				</div>
				<!-- Fim da Lista de salas -->

				<!-- Informações da Sala -->
				<div class="item_top col l8 white-text center center-align">
					<h3>Ballet Iniciante 2 de 2018</h3>
				</div>
				<div class="item_bot col l8 white" style="overflow-y: auto;">

                    <br>
					<!-- Matérias Cadastradas -->
					<div class="item_sub col s12">
						<h4>00003 - Guilherme Balog</h4>
					</div>
					<div class="col s12">
                        <ul class="collapsible">
                            <li>
                                <div class="collapsible-header"><i class="material-icons">filter_drama</i>Nome da atividade &nbsp;<span style="color:grey">10/20</span></div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                            <li>
                                <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                            </li>
                        </ul>
                        <fieldset>
                            <legend style="font-size:15pt; text-align:center;">Teoria Musical</legend>
                            <table>
                                <thead>
                                    <tr>
                                        <th>O que é música</th>
                                        <th>Ritmo</th>
                                        <th>Tempos</th>
                                        <th>Solfejo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>9</td>
                                        <td>7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend style="font-size:15pt; text-align:center;">Dança</legend>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Passos</th>
                                        <th>Ritmos</th>
                                        <th>Estilos</th>
                                        <th>Acompanhamento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>5</td>
                                        <td>10</td>
                                        <td>9</td>
                                        <td>5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend style="font-size:15pt; text-align:center;">Canto</legend>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tom</th>
                                        <th>Altura</th>
                                        <th>Tempo</th>
                                        <th>Prática</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>9</td>
                                        <td>7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
                        <fieldset>
                            <legend style="font-size:15pt; text-align:center;">História da Dança</legend>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Atividade 1</th>
                                        <th>Atividade 2</th>
                                        <th>Atividade 3</th>
                                        <th>Atividade 4</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>10</td>
                                        <td>10</td>
                                        <td>9</td>
                                        <td>7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </fieldset>
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
                $('.collapsible').collapsible();
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