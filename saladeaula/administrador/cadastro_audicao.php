<?php include_once('../functions/util.php'); ?>
<!DOCTYPE html>
<html style="user-select: none;">
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Cadastro Audição</title>
        <link href="../css/material_icons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
        <link rel="stylesheet" href="../css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>
            html{
                 /*background-color:#771668;*/
                background-image: url(../images/teste.jpg);
                background-size: cover;
                background-position: center;
                background-repeat:  no-repeat;
                background-attachment: fixed;
            }
            form .input-field .btn{
                background-color: #871B61 !important;
            }
            .topo_box img{
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="content row">

            <?php
				include_once('../components/menu.php');
			?>

        	<div class="col s12">
        		<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
        			<div class="topo_box center center-align col s10 offset-s1">
                        <img src="../images/logo2.png" style="width: 100%; height: auto;" onclick="window.history.back();">
                    </div>
                    <div class="col s12 center center-align">
                        <h4 onclick="rodar()">Cadastrar Audição</h4>
                    </div>
        			<div class="corpo_box col s10 offset-s1">
        				<form action="../actions/cadastrar_audicao.php" method="post">
							<div class="input-field">
                                <i class="material-icons prefix">title</i>
                                <label for="nm_audicao">Nome:</label>
                                <input type="text" name="nm_audicao" id="nm_audicao" required>
								</div>
	        				<div class="input-field">
	        					<i class="material-icons prefix">edit</i>
	        					<label for="ds_audicao">Descrição:</label>
	        					<textarea class="materialize-textarea" id="ds_audicao" cols="30" rows="5" name="ds_audicao" max="5" required> </textarea>
	        				</div>
	        				<div class="input-field">
	        					<i class="material-icons prefix">today</i>
	        					<label for="dt_abertura">Data de abertura:</label>
	        					<input type="text" onchange="validar_datepicker(this.value, '#dt_fechamento', 'min')" class="datepicker" name="dt_abertura" id="dt_abertura" required>
	        				</div>
                            <div class="input-field">
                                <i class="material-icons prefix">today</i>
                                <label for="dt_fechamento">Data de Fechamento:</label>
                                <input type="text" onchange="validar_datepicker(this.value, '#dt_abertura', 'max')" class="datepicker" name="dt_fechamento" id="dt_fechamento" required>
                            </div>
							<div class="input-field">
                                <i class="material-icons prefix">people</i>
                                <label for="nr_vagas">Número de vagas:</label>
                                <input type="number" name="nr_vagas" id="nr_vagas" required>
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
        <script type="text/javascript" src="../js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="../js/materialize.min.js"></script>
        <script type="text/javascript" src="../js/traduzir_datepicker.js"></script>
        <script type="text/javascript" src="../js/validar_datepicker.js"></script>
        <script type="text/javascript">
            $('.datepicker').datepicker();

            traduzir_datepicker("#dt_abertura");
            traduzir_datepicker("#dt_fechamento");
			
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