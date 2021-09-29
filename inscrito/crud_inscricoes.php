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
        <style>
            .collapsible li div{
                color:black !important;
            }
        </style>
    </head>
    <body>
        <div class="content row">

			<?php
				include_once('../saladeaula/components/menu.php');
			?>
							<div class="item_box col s12 m10 offset-m1">
								<div class="item_content">
									<div class="item_top center col s12">
										<h3>Inscrições</h3>
									</div>
									<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
                                    <?php
                                        include_once('../saladeaula/functions/exibir_audicao.php');
                                        $query_a = exibir_audicao(4);

                                        echo '<ul class="collapsible">';
                                        
                                        //Verifica se não retornou erro
                                        if($query_a == "Erro ao exibir as audições"){
                                            ?>
                                            <li>
                                                <h5>Não existem audições em que você está inscrito!</h5><br>
                                            </li>
                                            <?php
                                        }else{
                                            
                                            while($row_a = $query_a->fetch_object()){
                                                ?>
                                                <li>
                                                    <div class="collapsible-header">
                                                        <i class="material-icons">filter_drama</i>
                                                        <?php echo $row_a->nm_audicao; ?>
                                                        <i class="material-icons right">keyboard_arrow_down</i>
                                                    </div>
                                                    <div class="collapsible-body">
                                                        <h5><b>Nome: </b><?php echo $row_a->nm_audicao; ?></h5>
                                                        <span><b>Descrição: </b><?php echo $row_a->ds_audicao; ?></span><br>
                                                        <span><b>Nº de Vagas: </b><?php echo $row_a->nr_vagas; ?></span><br>
                                                        <span><b>Data de Encontro: </b>
                                                        <?php 
                                                            if($row_a->dt_encontro == '00/00/0000'){
                                                                echo "Não definida";
                                                            }else{
                                                                echo $row_a->dt_encontro;
                                                            }
                                                        ?></span><br>
                                                        <span><b>Hora do Encontro: </b>
                                                        <?php 
                                                            if($row_a->hr_encontro == '00:00'){
                                                                echo "Não definida";
                                                            }else{
                                                                echo $row_a->hr_encontro;
                                                            }
                                                        ?></span><br><br>
                                                        <a href="/saladeaula/actions/excluir_inscricao.php?inscricao=<?php echo $row_a->cd_inscrito_audicao; ?>" class="btn red">&nbsp;&nbsp;&nbsp;<i class="material-icons">close</i>&nbsp;&nbsp;&nbsp;</a>
                                                    </div>
                                                </li>
                                                <?php
                                            }

                                        }

                                        echo '</ul>';

                                    ?>
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
                $('.collapsible').collapsible();
		  	});
        </script>
    </body>
</html>
