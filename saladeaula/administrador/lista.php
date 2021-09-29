<?php
    include_once("../functions/util.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="/css/material_icons.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        
    </head>
    <body>
        <div class="content row">

            <?php
                include_once('../components/menu.php');
            ?>

            <div class="body col s10 offset-s1  z-depth-1">

                <div class="item_box col s12">
                    <div class="item_content">
                        <div class="item_top col s12 center center-align">
                            <h3>Usuários</h3>
                        </div>
                        <div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
                            <table>
                                <thead>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Usuário</th>
                                </thead>
                                <tbody>
                                    <?php
                                        include('../functions/exibir_todos_usuarios.php');
                                        exibir_todos_usuarios();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>

        <!--Scripts-->
        <script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/js/materialize.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".sidenav").sidenav();
                $('.dropdown-trigger').dropdown();
            });
        </script>
    </body>
</html>