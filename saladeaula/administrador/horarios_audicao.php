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
		redirect("O código dessa turma não existe","crud_curso.php");
	}
	

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Audição </title>
        <link href="../css/material_icons.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    	<!-- Modal de Inativação -->
    	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Mudar Status da Audição?</h4>
				<p>Deseja realmente <span id="act_modal">Teste</span> a Audição  <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
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

        	<div class="body col s10 offset-s1 z-depth-1">

        		<div class="item_box col s12">
					<div class="item_content">
						<div class=" col s12 center center-align header">
							<div class="item_box col s12">
								<div class="item_content">
									<div class="item_top col s12 center center-align">
										<h3>Audição | Horários</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
										<table>
											<thead>
												<tr>
                                                    <th>Nome</th>
                                                    <th>Endereço</th>
													<th>Cidade</th>
													<th>E-mail</th>
													<th>Telefone</th>
													<th>Data de Encontro</th>
													<th>Hora de Encontro</th>
												</tr>
											</thead>
											<tbody>
												<?php

													include_once('../functions/exibir_inscritos.php');
                                                    $query = exibir_inscritos(4,$cd);
                                                    
                                                    if($query != "erro"){
                                                        while($row = $query->fetch_object()){
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $row->nm_inscrito; ?></td>
                                                                <td><?php echo $row->ds_endereco; ?></td>
                                                                <td><?php echo $row->ds_cidade; ?></td>
                                                                <td><?php echo $row->tx_email; ?></td>
                                                                <td><?php echo $row->nr_telefone1; ?></td>
                                                                <td><?php echo $row->dt_encontro; ?></td>
                                                                <td><?php echo $row->hr_encontro; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }else{
                                                        ?>
                                                            <tr>
                                                                <td colspan="7">Não existem horários cadastrados!</td>
                                                            </tr>
                                                            <?php
                                                    }
														
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="../js/materialize.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		    	$('.modal').modal();
		  	});
    	 	function muda_modal(nome,cd,act){
    	 		document.getElementById('nome_modal').innerHTML = nome;
    	 		document.getElementById('href_modal').href = "../actions/inativar_audicao.php?cd="+cd;
    	 		document.getElementById('act_modal').innerHTML = act;
    	 	}
        </script>
    </body>
</html>
