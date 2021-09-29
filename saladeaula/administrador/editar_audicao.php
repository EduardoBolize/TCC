<?php 
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma turma para editar se quiser acessar essa página!","crud_audicao.php");
	}

	$sql = "SELECT * from tb_audicao where cd_audicao = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();

		if($row->st_audicao == 0){
			$row->st_audicao = "Inativo";
		}else{
			$row->st_audicao = "Ativo";
		}
		
        $row->dt_abertura = formatar_para_materialize($row->dt_abertura);
        $row->dt_fechamento = formatar_para_materialize($row->dt_fechamento); 
	}else{
		redirect("O código dessa audicao não existe","crud_curso.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Atualizar Audição</title>
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

				<!-- Lista de Inscritos -->
				<div class="col l4">

					<!-- Barra de Inscritos -->
					<div class="item_top col white-text center center-align" style="width:98%;">
						<h3>Lista de Inscritos</h3>
					</div>
					<div class="item_bot col white" style="width:98%;height:83vh;margin:0;padding:0; overflow:auto;">

						<!-- Pesquisa -->
						<div class="input-field col l10 offset-l1 s12">
							<i class="material-icons prefix">search</i>
							<input type="text" name="search" id="search">
							<label for="search">Pesquisa</label>
						</div>
						<!-- Fim da Pesquisa -->

						<!-- Lista de Inscritos -->
						<div id="a_lista" class="col s12 white">
							<h5 style="margin:0px;">Sem horário</h5>
							<table>
								<thead>
									<tr>
										<th>Código - Nome</th>
									</tr>
								</thead>
								<tbody id="tbody">
                                    <?php 
                                        include_once("../functions/exibir_inscritos.php");
                                        $query_i = exibir_inscritos(5,$cd);
                                        
                                        if($query_i == "erro"){
											?>
											<tr>
												<td class="audicao_td">
													<span>Não existem inscritos sem horário</span>
												</td>
											</tr>
											<?php
                                        }else{
                                            
                                            while($row_i = $query_i->fetch_object()){
                                                $exibir = $row_i->cd_inscrito_audicao." - ".$row_i->nm_inscrito;
    
                                                ?>
                                                <tr id="<?php echo "t_tr".$row_i->cd_inscrito_audicao; ?>" class="search_item">
                                                    <td class="audicao_td">
                                                        <?php echo $exibir; ?>
                                                        <a class="btn-floating right" href="editar_audicao.php?cd=<?php echo $cd; ?>&inscricao=<?php echo $row_i->cd_inscrito_audicao; ?>">
                                                            <i class="material-icons">send</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
    
                                            }

                                        }

									?>
								</tbody>
							</table>
							<h5 style="margin:0px;margin-top:20px;">Com horário</h5>
							<table>
								<thead>
									<tr>
										<th>Código - Nome</th>
									</tr>
								</thead>
								<tbody id="tbody">
                                    <?php 
                                        include_once("../functions/exibir_inscritos.php");
                                        $query_i = exibir_inscritos(4,$cd);
                                        
                                        if($query_i == "erro"){

                                        }else{
                                            
                                            while($row_i = $query_i->fetch_object()){
                                                $exibir = $row_i->cd_inscrito_audicao." - ".$row_i->nm_inscrito;
    
                                                ?>
                                                <tr id="<?php echo "t_tr".$row_i->cd_inscrito_audicao; ?>" class="search_item">
                                                    <td class="audicao_td">
                                                        <?php echo $exibir; ?>
                                                        <a class="btn-floating right" href="editar_audicao.php?cd=<?php echo $cd; ?>&inscricao=<?php echo $row_i->cd_inscrito_audicao; ?>">
                                                            <i class="material-icons">send</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
    
                                            }

                                        }

									?>
								</tbody>
							</table>
						</div>

					</div>
					<!-- Fim da Barra de Inscritos -->

				</div>
				<!-- Fim da Lista de Inscritos -->

				<!-- Informações da Audição -->
				<div class="item_top col l8 white-text center center-align">
					<h3><?php echo $row->nm_audicao; ?></h3>
				</div>
				<div class="item_bot col l8 white" style="overflow-y: auto;">
					
					<!-- Informações da Audição -->
                    <br>
					<form method="post" action="../actions/atualizar_audicao.php" class="col s12">
                        <input type="hidden" name="cd" value="<?php echo $cd; ?>">
                        <div class="input-field col s9">
							<input type="text" name="nm_audicao" id="nm_audicao" value="<?php echo $row->nm_audicao; ?>">
							<label for="nm_audicao">Nome da Audição</label>
						</div>
                        <div class="input-field col s3">
							<input type="number" name="nr_vagas" id="nr_vagas" value="<?php echo $row->nr_vagas; ?>">
							<label for="nr_vagas">Vagas</label>
						</div>
                        <div class="input-field col s12">
                            <textarea id="ds_audicao" name="ds_audicao" id="ds_audicao" value="<?php echo $row->ds_audicao; ?>" class="materialize-textarea"></textarea>
                            <label for="ds_audicao">Descrição</label>
                        </div>
						<div class="input-field col s6">
							<input type="text" class="datepicker" name="dt_abertura" id="dt_abertura" value="<?php echo $row->dt_abertura; ?>">
							<label for="dt_abertura">Data de Abertura</label>
						</div>
						<div class="input-field col s6">
							<input type="text" class="datepicker" name="dt_fechamento" id="dt_fechamento" value="<?php echo $row->dt_fechamento; ?>">
							<label for="dt_fechamento">Data de Fechamento</label>
						</div>
                        <div class="input-field col s6 offset-s3">
							<button class="btn col s12">Enviar</button>
						</div>
					</form>
					<!-- Fim das Informações da Audição -->

					<!-- Inscritos cadastrados -->
					<div class="item_sub col s12">
						<h4>Dados do Inscrito</h4>
					</div>
					<div class="col s12">
                        <?php

                            if(isset($_GET['inscricao']) and !empty($_GET['inscricao'])){
                                $inscricao = $_GET['inscricao'];
                                $inscricao = exibir_inscritos(3,$inscricao);

                                if($inscricao == "erro"){

                                }else{
                                    $inscricao->dt_encontro = formatar_para_materialize($inscricao->dt_encontro);
                                    ?>
                                    <form method="post" action="../actions/atualizar_inscricao.php" class="col s12">
                                        <br>
                                        <input type="hidden" id="cd_audicao" name="cd_audicao" value="<?php echo $cd; ?>">
                                        <input type="hidden" id="inscricao" name="inscricao" value="<?php echo $inscricao->cd_inscrito_audicao; ?>">
                                        <div class="input-field col s12">
                                            <input type="text" name="nm_inscrito" id="nm_inscrito" value="<?php echo $inscricao->nm_inscrito; ?>" readonly>
                                            <label for="nm_inscrito">Nome do Inscrito</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input type="text" name="dt_encontro" id="dt_encontro" class="datepicker" value="<?php echo $inscricao->dt_encontro; ?>">
                                            <label for="dt_encontro">Data do Encontro</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input type="text" name="hr_encontro" id="hr_encontro" class="timepicker" value="<?php echo $inscricao->hr_encontro; ?>">
                                            <label for="hr_encontro">Hora do Encontro</label>
                                        </div>
                                        <div class="input-field col s4 offset-s3">
                                            <button class="btn col s12">Enviar</button>
                                        </div>
										<div class="input-field col s2">
                                            <a href="#!" onclick="zerar_cadastro()" class="btn red col s12">Zerar</a>
                                        </div>
                                    </form>

                                    <?php
                                }
                            }

                        ?>
					</div>
					<!-- Fim dos Inscritos Cadastrados -->
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
                $('.timepicker').timepicker();
				$('select').formSelect();
				$('.sidenav').sidenav();
				$('.dropdown-trigger').dropdown();
			});

            //Coloca o texto do textarea
            $('#ds_audicao').val('<?php echo $row->ds_audicao; ?>');

			function zerar_cadastro(){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/atualizar_inscricao.php',
					data: {
						'cd_audicao': document.getElementById("cd_audicao").value,
						'inscricao': document.getElementById("inscricao").value,
						'dt_encontro': '00 00, 0000',
						'hr_encontro': '00:00'
					}
				});

				window.location = "editar_audicao.php?cd=<?php echo $cd; 
				if(isset($_GET['inscricao'])){
					echo "&inscricao=$inscricao->cd_inscrito_audicao";
				} ?>";
			}

			$("#search").on("keyup",function(){
				if(this.value == ''){
					$(".search_item").find(":contains('')").css("display","table-cell");
				}else{
					$(".search_item").find(":contains('')").css("display","none");
					$(".search_item").find(":contains('"+this.value+"')").css("display","table-cell");
					$(".audicao_td .btn-floating").css("display","table-cell");
					$(".audicao_td .btn-floating i").css("display","table-cell");
				}
			});

		</script>
	</body>
</html>