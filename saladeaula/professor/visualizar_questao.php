<?php 
    include_once('../functions/util.php');

    if(isset($_GET['cd']) and !empty($_GET['cd'])){
        $cd = $_GET['cd'];
    }else{
        redirect("Favor, escolha uma questão para visualizar se quiser acessar essa página!","crud_atividade.php");
    }

    $sql = "SELECT * from tb_questao where cd_questao = $cd";
    $query = $mysqli->query($sql);

    if($query->num_rows > 0){
        $row = $query->fetch_object();

        if($row->tp_questao == 0){
            $row->tp_questao = "Dissertativa";
        }else if($row->tp_questao == 1){
            $row->tp_questao = "Alternativa";
        }
    }else{
        redirect("O código dessa questão é inválido!","crud_atividade.php");
    }
?>
<!DOCTYPE html>
<html style="user-select: none;">
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Visualizar Questão</title>
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
        		<div class="col s12 m10 l6 offset-m1 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:20px;padding-bottom:20px;">
        			<div class="topo_box center center-align col s10 offset-s1 hide-on-med-and-down">
                        <img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor:pointer;" onclick="history.back();">
                    </div>
                    <div class="col s12 center center-align">
                        <h3 onclick="rodar()">Visualizar Questão</h3>
                    </div>
        			<div class="corpo_box col s10 offset-s1">
                        <input type="hidden" name="cd_questao" value="<?php echo $row->cd_questao; ?>">
                        <div class="input-field">
                            <i class="material-icons prefix">create</i>
                            <label for="tx_enunciado">Enunciado:</label>
                            <textarea id="tx_enunciado" name="tx_enunciado" class="materialize-textarea" readonly></textarea>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">assignment</i>
                            <label for="vl_pontos">Valor em Pontos:</label>
                            <input type="text" name="vl_pontos" id="vl_pontos" required value="<?php echo $row->vl_pontos; ?>" readonly>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix">assignment</i>
                            <label for="tp_questao">Tipo de Questão:</label>
                            <input type="text" name="tp_questao" id="tp_questao" required value="<?php echo $row->tp_questao; ?>" readonly>
                        </div>
                        <?php 
                            if($row->tp_questao == "Alternativa"){
                                $sql_alt = "SELECT * from tb_alternativa where id_questao = $row->cd_questao";
                                $alternativas = $mysqli->query($sql_alt);
                                ?>
                                <div class="input-field center-align">
                                    <h5>Alternativas</h5>
                                </div>
                                <ul class="collapsible">
                                <?php

                                while($alternativa = $alternativas->fetch_object()){
                                    if($alternativa->st_correta == 0){
                                        $div_cor = "red";
                                    }else if($alternativa->st_correta == 1){
                                        $div_cor = "green";
                                    }
                                    ?>
                                    <li>
                                        <div class="collapsible-header <?php echo $div_cor; ?> white-text darken-2"><b><?php echo $alternativa->sg_alternativa; ?></b>&nbsp; - <?php echo $alternativa->tx_alternativa; ?></div>
                                        <div class="collapsible-body"><span></span></div>
                                    </li>
                                    <?php
                                }
                            }
                        ?>
                        </ul>
                        <div class="input-field center center-align">
                            <button type="submit" class="btn" onclick="history.back();">Voltar</button>
                        </div>
        			</div>
        			<div class="footer_box">

        			</div>
        		</div>
        	</div>

        </div>

        <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.datepicker').datepicker();
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();

                $('#tx_enunciado').val('<?php echo $row->tx_enunciado; ?>');
            });
        </script>
    </body>
</html>