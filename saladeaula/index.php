<?php session_start(); session_unset(); session_destroy();?>
<!DOCTYPE html>
<html style="user-select: none;">
    <head>
        <meta charset="utf-8">
        <title>Login | Andorinha</title>
        <link href="css/material_icons.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
            html{
                height:100vh;
                background-image: url(images/pontas.jpg) !important;
                background-size: cover;
                background-position: center;
                background-repeat:  no-repeat;
                background-attachment: fixed;
            }

            /* Cores do Form */
            .input-field .prefix {
                color: #D0CCCC;
            }
            .input-field input{
                color:white;
            }
            label {
                color: white !important;
            }
            .body{
                display:flex;
                align-items: center;
            }
            .caixa_preta{
                height:auto;
            }
        </style>
    </head>
    <body>
        <div class="content row" style="margin:0px;">
            <div class="col s12 m8 l6 offset-m2 offset-l3 z-depth-2 body" style="background-color:white; border-radius: 10px;margin-top:0px;padding-bottom:0px;height:100vh;">
                <div class="caixa_preta">
                    <div class="topo_box center center-align col s10 offset-s1">
                        <img src="images/logo.png" style="width: 100%; height: auto; cursor: pointer;" onclick="window.location = '/index.php';">
                    </div>
                    <div class="corpo_box col s12 l10 m10 offset-l1 offset-m1">
                        <form action="actions/logar.php" method="post">
                            <div class="input-field">
                                <i class="material-icons prefix">account_box</i>
                                <label for="tx_login">Login:</label>
                                <input type="text" name="tx_login" id="tx_login" required autocomplete="off">
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <label for="tx_pass">Senha:</label>
                                <input type="password" name="tx_pass" id="tx_pass" required>
                            </div>
                            <br>
                            <div class="input-field col s12 center center-align">
                                <button type="submit" class="btn-large col s8 offset-s2">Enviar</button>
                            </div>
                            <div class="input-field col s12 center center-align">
                                <a href="esqueci_minha_senha.php" style="background: none !important;">Esqueceu sua senha?</a>
                            </div><br><br><br>
                            <!-- <div class="col s6">
                                <a class="btn col s12 waves-effect" href="cadastro_matricula.php">Cadastrar Aluno</a>
                            </div>
                            <div class="col s6">
                                <a class="btn col s12 waves-effect" href="cadastro_admin.php">Cadastrar Admin</a>
                            </div><br><br>
                            <div class="col s8 offset-s2 center-align">
                                <a class="btn col s12 waves-effect" href="cadastro_professor.php">Cadastrar Professor</a>
                            </div> -->
                        </form>
                    </div>
                    <div class="footer_box">

                    </div>
                </div>
            </div>

        </div>

        <!--Scripts-->
        <script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
