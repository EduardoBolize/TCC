<?php
    include_once('../functions/util.php');
    include_once("../functions/exibir_galerias.php");
    
    if(isset($_GET["cd"]) and !empty($_GET["cd"])){
        $cd = $_GET["cd"];

        $galerias = exibir_galeria(2,$cd);

        if(!empty($galerias)){
            $galeria = $galerias->fetch_object();
        }else{
            header("Location: crud_galeria.php");
        }
    }else{
        header("Location: crud_galeria.php");
    }
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
        <style>
            .item_bot i.material-icons{
                color:black;
            }
        </style>
        <script>
            function adicionar_foto(id_midia){
                var cd_galeria = document.getElementById("cd_galeria");

                console.log(id_midia);

                $.ajax({
					type: 'POST',
					dataType: 'json',
					url: '../actions/cadastrar_midia_galeria.php',
					data: {
						'cd_galeria': cd_galeria.value,
						'id_midia': id_midia
					}
				});

                setInterval(function(){
                    window.location = "editar_galeria.php?cd=<?php echo $cd; ?>";
                },150);
            }

            function excluir_imagem(cd_midia_galeria){

                console.log(cd_midia_galeria);

                $.ajax({
					type: 'GET',
					dataType: 'json',
					url: '../actions/excluir_midia_galeria.php',
					data: {
						'cd_midia_galeria': cd_midia_galeria
					}
				});

				setInterval(function(){
                    window.location = "editar_galeria.php?cd=<?php echo $cd; ?>";
                },150);
            }
        </script>
    </head>
    <body>
        <div class="content row">

            <!-- Modal das Fotos -->
            <div id="select_fotos" class="modal modal-fixed-footer">
                <div class="modal-content">
                    <section id="fotos_cadastradas">
                        <h4>Fotos Cadastradas</h4>
                        <div class="lista_fotos" style="display:flex;flex-wrap: wrap;flex-direction: row;align-content: center;"><br>&nbsp;
                            <?php
                                include_once("../functions/exibir_fotos.php");
                                $fotos = exibir_fotos(1,$galeria->cd_galeria);

                                foreach ($fotos as $foto) {
                                    ?>
                                    <div style="flex: 1;">
                                        <img class="materialboxed" ondragend="adicionar_foto(this.id);" src="<?php echo $foto["url_arquivo"]; ?>" id="<?php echo $foto["cd_midia"]; ?>" alt="<?php echo $foto["nm_midia"]; ?>" style="width:auto; width:150px;">
                                    </div>
                                    <?php
                                }
                            ?>
                        </div><br><br>&nbsp;
                    </section>
                    <section id="upload_fotos">
                        <h4>Upload de Fotos</h4>
                        <form enctype="multipart/form-data" action="../actions/upload_foto_galeria.php" method="post">
                            <input type="hidden" name="cd_galeria" id="cd_galeria" value="<?php echo $galeria->cd_galeria; ?>">
                            <div class="input-field">
                                <i class="material-icons prefix">edit</i>
                                <input type="text" name="nm_midia" id="nm_midia">
                                <label for="nm_midia">Nome das Fotos</label>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Fotos</span>
                                    <input type="file" name="arquivo[]" multiple>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <div class="col s12">
                                <button type="submit" class="btn col s6 offset-s3">Enviar</button>
                            </div>
                        </form>
                    </section>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-close waves-effect waves-red btn-flat">Cancelar</a>
                </div>
            </div>
         

			<?php
				include_once('../components/menu.php');
			?>
            <br>
            <div class="item_box col s12">
                <div class="item_content">
                    <div class=" col s12 center center-align header">
                        <div class="item_box col s12">
                            <div class="item_content">
                                <div class="item_top col s12 center center-align">
                                    <h3><?php echo $galeria->nm_galeria; ?></h3>
                                </div>
                                <div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
                                    <div class="col s12">
                                        <!-- Edição dos dados -->
                                        <form action="../actions/atualizar_galeria.php" method="post">
                                            <input type="hidden" name="cd_galeria" value="<?php echo $cd; ?>">
                                            <div class="input-field col s6">
                                                <i class="material-icons prefix">edit</i>
                                                <input type="text" name="nm_galeria" id="nm_galeria" value="<?php echo $galeria->nm_galeria; ?>" required>
                                                <label for="nm_galeria">Nome</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <i class="material-icons prefix">calendar_today</i>
                                                <input type="text" class="datepicker" name="dt_galeria" id="dt_galeria" value="<?php echo $galeria->dt_galeria; ?>" required>
                                                <label for="dt_galeria">Data</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">assignment</i>
                                                <!-- Texto no javascript -->
                                                <textarea id="ds_galeria" name="ds_galeria" class="materialize-textarea" required>      
                                                </textarea>
                                                <label for="ds_galeria">Descrição</label>
                                            </div>
                                            <div class="col s12 center-align">
                                                <button class="btn col s6 offset-s3" type="submit">Enviar</button>
                                            </div>
                                        </form>
                                        <!-- Fim da Edição dos dados -->

                                        <!-- Fotos -->
                                        <div class="col s12" style="background-color:#871B61;margin-top:15px;">
                                            <h4>Fotos <a href="#select_fotos" class="btn-floating red waves-effect waves-light modal-trigger"><i class="material-icons white-text">add</i></a></h4>
                                        </div>
                                        <!-- SELECT * from tb_arquivo where url_arquivo like "/galeria/%" and (url_arquivo like "%.jpg" or url_arquivo like "%.png" or url_arquivo like "%.jpeg") -->
                                        <!-- Caminho para pasta: \galeria\images\src\ -->
                                        <div class="col s12"><br>
                                            <div style="display:flex;flex-wrap: wrap;flex-direction: row;align-content: center;">
                                                <?php 
                                                    $imgs = exibir_fotos(2,$galeria->cd_galeria);

                                                    if(!empty($imgs)){
                                                        while($img = $imgs->fetch_object()){
                                                            ?>
                                                            <div style="flex: 1;">
                                                                <img ondragend="excluir_imagem(this.id)" class="materialboxed" style="width:auto; width:300px;" id="<?php echo $img->cd_midia_galeria; ?>" src="<?php echo $img->url_arquivo; ?>" alt="<?php echo $img->nm_midia; ?>">
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <!-- Fim das Fotos -->
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
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy'    
                });
                $('.materialboxed').materialbox();
                
                //Coloca o valor do textarea
                $('#ds_galeria').val('<?php echo $galeria->ds_galeria; ?>');

		  	});
        </script>
    </body>
</html>
