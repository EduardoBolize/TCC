<?php 
    include_once('../functions/util.php');
    if(isset($_GET['cd']) and !empty($_GET['cd'])){
        $cd = $_GET['cd'];
    }else{
        redirect("Favor, escolha um curso para editar se quiser acessar essa página!","crud_curso.php");
    }

    $sql = "SELECT * from tb_curso  where cd_curso = $cd";
    $query = $mysqli->query($sql);

    if($query->num_rows > 0){
    	$row = $query->fetch_object();
    }else{
    	redirect("O código desse curso não existe","crud_curso.php");
    }
    

?>
<!DOCTYPE html>
<html style="user-select: none;">
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Atualizar Curso</title>
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

        	<div class="col s12">
        		<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
        			<div class="topo_box center center-align col s10 offset-s1">
                        <img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer;" onclick="window.location = 'crud_curso.php';">
                    </div>
                    <div class="col s12 center center-align">
                        <h4 onclick="rodar()">Alterar Curso</h4>
                    </div>
        			<div class="corpo_box col s10 offset-s1">
        				<form enctype="multipart/form-data" action="../actions/atualizar_curso.php" method="post">
                            <input type="hidden" name="cd_curso" value="<?php echo $row->cd_curso; ?>">
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <label for="nm_curso">Nome:</label>
                                <input type="text" name="nm_curso" id="nm_curso" required value="<?php echo $row->nm_curso; ?>">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">create</i>
                                <label for="ds_curso">Descrição:</label>
                                <textarea name="ds_curso" id="ds_curso" class="materialize-textarea" required></textarea>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Foto</span>
                                    <input type="file" name="id_arquivo">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
	        				<div class="input-field center center-align">
                                <button type="submit" class="btn" onclick="history.back();">Voltar</button>
	        					<button type="submit" class="btn">Enviar</button>
	        				</div>
	        			</form>
        			</div>
        			<div class="footer_box">

        			</div>
        		</div>
        	</div>

        </div>


        <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
        <script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
        <<script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();

                $('#ds_curso').val('<?php echo $row->ds_curso; ?>');
            });
        </script>
    </body>
</html>