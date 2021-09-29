<?php include_once('../functions/util.php'); ?>
<!DOCTYPE html>
<html style="user-select: none;">
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Cadastro Inscrito</title>
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
                        <img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer;" onclick="window.location = 'crud_inscrito.php';">
                    </div>
                    <div class="col s12 center center-align">
                        <h4 onclick="rodar();">Cadastrar Inscrito</h4>
                    </div>
                    <div class="corpo_box col s10 offset-s1">
                        <form action="../actions/cadastrar_inscrito.php" method="post">
                            <div class="input-field">
                                <i class="material-icons prefix">account_box</i>
                                <label for="tx_login">Login:</label>
                                <input type="text" name="tx_login" id="tx_login" required>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <label for="tx_pass">Senha:</label>
                                <input type="password" name="tx_pass" id="tx_pass" required>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">edit</i>
                                <label for="nm_inscrito">Nome:</label>
                                <input type="text" name="nm_inscrito" id="nm_inscrito" required>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">assignment</i>
                                <label for="nr_cpf">CPF:</label>
                                <input type="text" name="nr_cpf" id="nr_cpf" required>
							</div>
							<div class="input-field">
                                <i class="material-icons prefix">place</i>
                                <label for="ds_endereco">Endereço:</label>
                                <input type="text" name="ds_endereco" id="ds_endereco" required>
							</div>
							<div class="input-field">
                                <i class="material-icons prefix">domain</i>
                                <label for="ds_cidade">Cidade:</label>
                                <input type="text" name="ds_cidade" id="ds_cidade" required>
							</div>
							<div class="input-field">
                                <i class="material-icons prefix">phone</i>
                                <label for="nr_telefone1">Telefone Principal:</label>
                                <input type="text" name="nr_telefone1" id="nr_telefone1" required pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">phone_paused</i>
                                <label for="nr_telefone2">Telefone 2:</label>
                                <input type="text" name="nr_telefone2" id="nr_telefone2" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">mail</i>
                                <label for="tx_email">E-mail:</label>
                                <input type="email" name="tx_email" id="tx_email" required>
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
        <script type="text/javascript" src="/saladeaula/js/autocomplete_inscrito.js"></script>
        <script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"></script>
        <script type="text/javascript">

            $('#nr_telefone').each(function(i, el){
               $('#'+el.id).mask("(00) 00000-0000");
            });
            $('#nr_telefone2').each(function(i, el){
               $('#'+el.id).mask("(00) 00000-0000");
            });
            function updateMask(event) {
                var $element = $('#'+this.id);
                $(this).off('blur');
                $element.unmask();
                if(this.value.replace(/\D/g, '').length > 10) {
                    $element.mask("(00) 00000-0000");
                } else {
                    $element.mask("(00) 0000-00009");
                }
                $(this).on('blur', updateMask);
            }
            $('#nr_telefone1').on('blur', updateMask);
            $('#nr_telefone1').mask("(00) 0000-00009");
            $('#nr_telefone2').on('blur', updateMask);
            $('#nr_telefone2').mask("(00) 0000-00009");

            jQuery("#nr_cpf").mask("999.999.999-99");
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
                $('.modal').modal();
            });
        </script>
       <!--  <script type="text/javascript" src="/js/autocomplete_admin.js"></script> -->
    </body>
</html>