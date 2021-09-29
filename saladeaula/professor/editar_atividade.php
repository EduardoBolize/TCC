<?php 
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma atividade para editar se quiser acessar essa página!","crud_atividade.php");
	}

	$sql = "SELECT * from tb_atividade where cd_atividade = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();

		if($row->st_atividade == 0){
			$row->st_atividade = "Inativo";
		}else{
			$row->st_atividade = "Ativo";
		}
	}else{
		redirect("O código dessa atividade não existe","crud_atividade.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Atualizar Atividade</title>
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

            <div id="cadastro_questao" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <h4>Cadastro de Questão</h4>
                    <form action="../actions/cadastrar_questao.php" method="post">
                        <input type="hidden" name="id_atividade" value="<?php echo $cd; ?>">
                        <input type="hidden" name="nr_alternativas" id="nr_alternativas" value="0">
                        <div class="input-field col s12" style="">
                            <i class="material-icons prefix">edit</i>
                            <textarea id="tx_enunciado" name="tx_enunciado" class="materialize-textarea" required></textarea>
                            <label for="tx_enunciado">Enunciado</label>
                        </div>
                        <div class="input-field col s12" style="margin-top:0px;">
                            <i class="material-icons prefix">edit</i>
                            <input type="number" step="0.01" min="0" name="vl_pontos" id="vl_pontos" required>
                            <label for="vl_pontos">Pontos</label>
                        </div>
                        <div class="input-field col s12" style="margin-top:0px;">
                            <i class="material-icons prefix">edit</i>
                            <label>Tipo de Questão</label><br>
                            <p id="tp_questao" style="margin-left:25px;">
                                <label>
                                    <input name="tp_questao" type="radio" value="0" checked onchange="esconde_alt(0);" />
                                    <span style="padding-left:10px;">Dissertativa</span>
                                </label>
                                <label style="padding-left:30px;">
                                    <input name="tp_questao" type="radio" value="1" onchange="esconde_alt(1);" />
                                    <span style="padding-left:10px;">Alternativa</span>
                                </label>
                            </p>
                        </div>
                        <div id="div_alternativas" style="display:none;">
                            <h5>Alternativas <a href="#!" onclick="adicionar_alternativa();" class="btn-floating red white-text"><i class="material-icons">add</i></a></h5>
                        </div>
                        <div class="input-field col s12" style="margin-top:0px;">
                            <button type="submit" class="btn waves-effect waves-light col s6 offset-s3">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
                </div>
            </div>

			<?php
				include_once('../components/menu.php');
			?><br>

			<div id="dados" class="col s12">

                <a href="#" data-target="lista_sala" class="sidenav-trigger hide-on-large-only col s12 center-align white-text" style="background-color:#771668; margin-bottom:10px;border-radius:10px;padding:5px;">
                    <h5 style="margin:0;">Lista de salas</h5>
                    <i class="material-icons">keyboard_arrow_right</i>
                </a>

				<!-- Lista de salas Desktop -->
				<div class="col l4 hide-on-med-and-down">
                    <div class="item_top col white-text center center-align" style="width:98%;">
                        <h3>Lista de Salas</h3>
                    </div>
					<?php include("includes/lista_sala.php"); ?>
                </div>
                <!-- Lista de salas Mobille -->
                <div id="lista_sala" class="sidenav col l4">
					<?php include("includes/lista_sala.php"); ?>
                </div>

				<!-- Informações da atividade -->
				<div class="item_top col l8 s12 white-text center center-align">
					<h3><?php echo $row->nm_atividade; ?></h3>
				</div>
				<div class="item_bot col l8 s12 white" style="overflow-y: auto;">
					
					<!-- Informações da atividade -->
					<div class="col s12"><br>

						<div class="input-field col s12">
                            <i class="material-icons prefix">edit</i>
                            <input type="text" name="nm_atividade" id="nm_atividade" value="<?php echo $row->nm_atividade; ?>">
                            <label for="nm_atividade">Nome da Atividade</label>
						</div>
						<div class="input-field col s12">
                            <textarea name="ds_atividade" id="ds_atividade" class="materialize-textarea"></textarea>
                            <label for="ds_atividade">Descrição</label>
						</div>
                        <div class="input-field col s12">
                            <button class="col s6 offset-s3 btn" onclick="atualizar_atividade()">Enviar</button>
                        </div>
					</div>
                    <!-- Fim das Informações da turma -->
                    
                    <!-- Cadastro/Edição de tarefa -->
                    <?php 

                        if(isset($_GET["id_turma"])){
                            include_once("../functions/exibir_turmas.php");
                            $turmas = exibir_turmas(4,$_GET["id_turma"]);
                            if(!empty($turmas)){
                                $turma = $turmas->fetch_object();
                                $dt = explode('-',$turma->dt_turma);
                                $turma->dt_turma = $dt[0];

                                $tarefa = $turma->sg_sala." de ".$turma->dt_turma;

                                //Confirmação
                                $sql_v = "SELECT * from tb_tarefa where id_atividade = $cd and id_turma = $turma->cd_turma";
                                $query_v = $mysqli->query($sql_v);

                                if($query_v->num_rows > 0){
                                    $row_v = $query_v->fetch_assoc();
                                    $row_v["dt_tarefa"] = formatar_para_br($row_v["dt_tarefa"]);
                                    $row_v["dt_prazo"] = formatar_para_br($row_v["dt_prazo"]);
                                    $act = "../actions/atualizar_tarefa.php";
                                }else{
                                    $act = "../actions/cadastrar_tarefa.php";
                                    $row_v = Array();
                                    $row_v["cd_tarefa"] = "";
                                    $row_v["nm_tarefa"] = "";
                                    $row_v["dt_tarefa"] = "";
                                    $row_v["dt_prazo"] = "";
                                    $row_v["hr_prazo"] = "";
                                    $row_v["st_tarefa"] = 1;
                                    $row_v["id_criador"] = 0;
                                }

                                ?>
                                <div class="item_sub col s12">
                                    <h4>Tarefa para <?php echo $tarefa; ?></h4>
                                </div>
                                <form action="<?php echo $act; ?>" method="post" class="col s12"><br>
                                    <input type="hidden" name="id_turma" value="<?php echo $turma->cd_turma; ?>">
                                    <input type="hidden" name="id_atividade" value="<?php echo $cd; ?>">
                                    <input type="hidden" name="cd_tarefa" value="<?php echo $row_v["cd_tarefa"]; ?>">
                                    <div id="chips" class="input-field col s12">
                                        <!-- Aqui ficam as matérias da atividade -->
                                        <?php 
                                            //Exibir as matérias que já estejam cadastradas
                                            if($row_v["cd_tarefa"] != ""){
                                                $sql_o = "SELECT * from tb_tarefa_materia join tb_materia on id_materia = cd_materia where id_tarefa = ".$row_v["cd_tarefa"];
                                                $query_o = $mysqli->query($sql_o);
                                                $nm_m = '';

                                                if($query_o->num_rows > 0){
                                                    while($row_o = $query_o->fetch_object()){
                                                        if($nm_m == ''){
                                                            $nm_m .= $row_o->cd_materia;
                                                        }else{
                                                            $nm_m .= ",".$row_o->cd_materia;
                                                        }
                                                    ?>
                                                        <div class="chip">
                                                            <?php echo $row_o->nm_materia; ?>
                                                            <i class="close material-icons" onclick="remover_materia(<?php echo $row_o->cd_materia; ?>)">close</i>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <input type="hidden" name="nm_materia" id="nm_materia" value="<?php echo $nm_m; ?>">
                                    <div class="input-field col s10">
                                        <select name="id_materia" id="id_materia">
                                            <?php 
                                                include_once("../functions/exibir_sala_materia.php");
                                                $materias = exibir_sala_materia(2,$turma->cd_sala);

                                                if(!empty($materias)){
                                                    while($materia = $materias->fetch_object()){
                                                    ?>
                                                        <option id="o<?php echo $materia->cd_materia; ?>" value="<?php echo $materia->cd_materia; ?>"><?php echo $materia->nm_materia; ?></option>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                        <label for="id_materia">Matérias</label>
                                    </div>
                                    <div class="col s2">
                                        <a class="btn" onclick="adicionar_materia()"><i class="material-icons">send</i></a>
                                    </div>
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix">edit</i>
                                        <input type="text" name="nm_tarefa" id="nm_tarefa" value="<?php echo $row_v["nm_tarefa"]; ?>">
                                        <label for="nm_tarefa">Nome da Tarefa</label>
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">border_color</i>
                                        <label for="dt_tarefa">Data de Inicio:</label>
                                        <input type="text" class="datepicker" name="dt_tarefa" id="dt_tarefa" required onfocus="document.getElementById('nm_tarefa').focus();" value="<?php echo $row_v["dt_tarefa"]; ?>">
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">border_color</i>
                                        <label for="dt_prazo">Data de Prazo:</label>
                                        <input type="text" class="datepicker" name="dt_prazo" id="dt_prazo" required onfocus="document.getElementById('nm_tarefa').focus();"  value="<?php echo $row_v["dt_prazo"]; ?>">
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <i class="material-icons prefix">border_color</i>
                                        <label for="hr_prazo">Hora de Prazo:</label>
                                        <input type="text" class="timepicker" name="hr_prazo" id="hr_prazo" required onfocus="document.getElementById('nm_tarefa').focus();" value="<?php echo $row_v["hr_prazo"]; ?>">
                                    </div>
                                    <div class="input-field col s12 l6">
                                        <select name="st_tarefa" id="st_tarefa">
                                            <?php 
                                                if($row_v["st_tarefa"] == 0){
                                                    ?>
                                                    <option value="0">Inativa</option>
                                                    <option value="1">Ativa</option>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <option value="1">Ativa</option>
                                                    <option value="0">Inativa</option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <label for="st_tarefa">Status</label>
                                    </div>
                                    <?php 
                                        
                                        $professores_fe = exibir_professor_sala_materia(2,$turma->id_sala);
                                        if(!empty($professores_fe)){
                                            ?>
                                            <div class="input-field col s12 l6">
                                                <select name="id_criador" id="id_criador">
                                                    <?php

                                                        if($row_v["id_criador"] != 0){
                                                            //Pega o criador da tarefa
                                                            $sql_c = "SELECT nm_professor as nome,tx_login,cd_login from tb_tarefa join tb_professor on id_criador = id_login join tb_login on id_login = cd_login where id_login = ".$row_v['id_criador']." UNION ";
							                                $sql_c .= "SELECT nm_admin as nome,tx_login,cd_login from tb_tarefa join tb_admin on id_criador = id_login join tb_login on id_login = cd_login where id_login = ".$row_v['id_criador'];
                                                            //echo $sql_c;
                                                            $query_c = $mysqli->query($sql_c);
                                                            $row_c = $query_c->fetch_object();

                                                            ?>
                                                            <option value="<?php echo $row_c->cd_login; ?>"><?php echo $row_c->tx_login." - ".$row_c->nome; ?></option>
                                                            <?php
                                                        }

                                                        while($professor_fe = $professores_fe->fetch_object()){
                                                            ?>
                                                            <option value="<?php echo $professor_fe->cd_login; ?>"><?php echo $professor_fe->tx_login." - ".$professor_fe->nm_professor; ?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <label for="id_criador">Criador</label>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                    <div class="input-field col s12">
                                        <button class="col s6 offset-s3 btn" onclick="atualizar_atividade()">Enviar</button>
                                    </div>
                                </form>
                                <?php
                            }
                        }

                    ?>
                    <!-- Fim do Cadastro/Edição de tarefa -->

					<!-- Questões Cadastradas -->
					<div class="item_sub col s12">
						<h4>Questões Cadastradas <a href="#cadastro_questao" class="btn-floating red waves-effect waves-light modal-trigger"><i class="material-icons">add</i></a></h4>
					</div>
					<div class="col s12">
						<table>
							<thead>
								<tr>
									<th>Número</th>
									<th>Enunciado</th>
									<th>Pontos</th>
									<th>Excluir</th>
									<th>Visualizar</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
                                    include_once("../functions/exibir_questao.php");
                                    $questoes = exibir_questoes(2,$cd);

                                    if(!empty($questoes)){
                                        $cont = 0;
                                        while($questao = $questoes->fetch_object()){
                                            $cont++;
                                            ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo $questao->tx_enunciado; ?></td>
                                                <td><?php echo $questao->vl_pontos; ?></td>
                                                <td><a class='btn-floating' href='../actions/excluir_questao.php?cd=<?php echo $questao->cd_questao; ?>'><i class='material-icons'>delete</i></a></td>
                                                <td><a class='btn-floating' href='visualizar_questao.php?cd=<?php echo $questao->cd_questao; ?>'><i class='material-icons'>visibility</i></a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
							</tbody>
						</table>
					</div>
					<!-- Fim das questões cadastradas -->

                    <?php 
                        if(isset($row_v["cd_tarefa"]) and !empty($row_v["cd_tarefa"])){

                        ?>
                        <!-- Respostas Cadastradas -->
                        <div class="item_sub col s12">
                            <h4>Respostas Cadastradas</h4>
                        </div>
                        <div class="col s12">
                            <table>
                                <thead>
                                    <tr>
                                        <!-- <th>Número</th> -->
                                        <th>Aluno</th>
                                        <th>Respostas</th>
                                        <th>Visualizar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include_once("../functions/exibir_resposta.php");
                                        
                                        $respostas = exibir_respostas(3,$row_v["cd_tarefa"],$_GET["id_turma"]);

                                        if(!empty($respostas)){
                                            $cont = 0;
                                            while($resposta = $respostas->fetch_object()){
                                                $cont++;
                                                ?>
                                                <tr>
                                                    <!-- <td><?php echo $cont; ?></td> -->
                                                    <td><?php echo $resposta->nm_matricula; ?></td>
                                                    <td><?php echo $resposta->qt_questao; ?></td>
                                                    <td><a class='btn-floating' href='visualizar_resposta.php?cd=<?php echo $resposta->cd_tarefa; ?>&cd_turma_matricula=<?php echo $resposta->cd_turma_matricula; ?>'><i class='material-icons'>visibility</i></a></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php
                        
                        }
                    ?>
					<!-- Fim das Respostas cadastradas -->
				</div>
				<!-- Fim das Informações da turma -->

			</div>

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
        <script type="text/javascript" src="../js/traduzir_datepicker.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.datepicker').datepicker({
                    format: 'dd/mm/yyyy'    
                });
                $('.timepicker').timepicker();
				$('select').formSelect();
				$('.sidenav').sidenav();
				$('.dropdown-trigger').dropdown();
                $('.chips').chips();
                $('.modal').modal();

                //Coloca a descrição da atividade
                $('#ds_atividade').val("<?php echo $row->ds_atividade; ?>");

                $('.datepicker').datepicker();
                traduzir_datepicker("#dt_tarefa");
                traduzir_datepicker("#dt_prazo");
			});
		</script>
		<script>
			$("#search").on("keyup",function(){
				if(this.value == ''){
					$(".search_item").find(":contains('')").css("display","table-cell");
				}else{
					$(".search_item").find(":contains('')").css("display","none");
					$(".search_item").find(":contains('"+this.value+"')").css("display","table-cell");
					$(".turma_td .btn-floating").css("display","table-cell");
					$(".turma_td .btn-floating i").css("display","table-cell");
				}
			});

			//Função que cadastra os turmas
			function cadastrar_atividade_materia(cd_materia){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/cadastrar_atividade_materia.php',
					data: {
						'id_materia': cd_materia,
						'id_atividade': <?php echo $row->cd_atividade; ?>
					}
				});

                setInterval(function(){
                    window.location = "editar_atividade.php?cd=<?php echo $row->cd_atividade; ?>";
                },150);
				
			}

			function atualizar_atividade(){
				$.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/atualizar_atividade.php',
					data: {
						'nm_atividade': document.getElementById("nm_atividade").value,
						'ds_atividade': document.getElementById("ds_atividade").value,
						'cd_atividade': <?php echo $row->cd_atividade; ?>
					}
				});

				setInterval(function(){
                    window.location = "editar_atividade.php?cd=<?php echo $row->cd_atividade; ?>";
                },150);
			}

            function esconde_alt(st){
                var div_alt = document.getElementById("div_alternativas");
                if(st == 0){
                    //Esconda
                    div_alt.style = "display:none";
                }else if(st == 1){
                    //Mostre
                    div_alt.style = "";
                }
            }

            function remover_alternativa(alt){

            }

            function adicionar_alternativa(){
                var letras = ['','A','B','C','D','E','F','G'];
                var qt_alt = parseInt(document.getElementById("nr_alternativas").value);
                if(qt_alt == 6){
                    alert("O limite de alternativas é 6!");
                    exit;
                }
                qt_alt++;
                document.getElementById("nr_alternativas").value = qt_alt;

                //Div envelope
                var new_a = document.createElement("div");
                new_a.setAttribute("id","da_"+qt_alt);
                new_a.setAttribute("class","col s12");

                //Abriu
                var field1 = document.createElement("div");
                field1.setAttribute("class","input-field col s1");

                var label1 = document.createElement("label");
                
                var input1 = document.createElement("input");
                input1.setAttribute("name","st_correta");
                input1.setAttribute("type","radio");
                if(qt_alt == 1){
                    input1.setAttribute("checked","");
                }
                input1.setAttribute("value",qt_alt);
                label1.appendChild(input1);

                var span1 = document.createElement("span");
                label1.appendChild(span1);
                
                field1.appendChild(label1);
                
                new_a.appendChild(field1);
                //Fechou

                var field2 = document.createElement("div");
                field2.setAttribute("class","input-field col s10");
                
                var input = document.createElement("input");
                input.setAttribute("id","a"+qt_alt);
                input.setAttribute("name","tx_alternativa[]");
                input.setAttribute("type","text");
                field2.appendChild(input);

                var label = document.createElement("label");
                label.setAttribute("for","a"+qt_alt);
                label.innerHTML = "Alternativa "+letras[qt_alt];

                field2.appendChild(label);
                
                new_a.appendChild(field2);

                var field3 = document.createElement("div");
                field3.setAttribute("class","input-field col s1");
                
                var i = document.createElement("i");
                i.setAttribute("onclick","remover_alternativa('da"+qt_alt+"')");
                i.setAttribute("class","material-icons red-text");
                i.setAttribute("style","cursor:pointer;");
                i.innerHTML = "close";
                field3.appendChild(i);
                
                new_a.appendChild(field3);

                document.getElementById("div_alternativas").appendChild(new_a);
            }

            //Array com todas as matérias
            var at_materias = Array();

            <?php
                //Inicialização da variavel JS "at_materias"
                if(isset($row_v)){
                    if($row_v["cd_tarefa"] != ""){
                        $sql_o = "SELECT * from tb_tarefa_materia join tb_materia on id_materia = cd_materia where id_tarefa = ".$row_v["cd_tarefa"];
                        $query_o = $mysqli->query($sql_o);

                        while($row_o = $query_o->fetch_object()){
                            ?>
                            at_materias[at_materias.length] = "<?php echo $row_o->cd_materia; ?>";
                            <?php
                        }
                    }
                }
            ?>
            document.getElementById("id_materia").value = at_materias;

            //Adição de matérias
            function adicionar_materia(){
                var mat = document.getElementById("id_materia").value;
                var o = at_materias.indexOf(mat);

                if(o == -1){
                    //Não tem no array
                    at_materias[at_materias.length] = mat;
                    document.getElementById("nm_materia").value = at_materias;

                    //Adiciona o chip
                    var chip = '<div class="chip">'+document.getElementById("o"+mat).innerHTML+'<i class="close material-icons" onclick="remover_materia('+mat+')">close</i></div>';

                    document.getElementById("chips").innerHTML += chip;
                }

            }

            function remover_materia(mat){
                mat = mat.toString();
                
                var index = at_materias.indexOf(mat);
                console.log(index);
                if(index != -1){
                    //Tem no array
                    at_materias.splice(index,1);  //Retira do array
                    document.getElementById("nm_materia").value = at_materias;
                }
            }

		</script>
		<script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();

                //Adiciona as alternativas
                for(var alts = 1; alts <= 4; alts++){
                    adicionar_alternativa();
                }
            });
        </script>
	</body>
</html>