<header id="header">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <h1><a href="/index.php" class="scrollto"><img style="width:190px;" src="/img/ballet/opcao1.png"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class="menu-active"><a href="/index.php">Home</a></li>
                <li class="menu-has-children"><a href="#!">Escola</a>
                    <ul>
                        <li><a href="/index.php#about">Nosso trabalho</a></li>
                        <li><a href="/index.php#team">Equipe</a></li>
                    </ul>
                </li>
                <li class="menu-has-children"><a href="#!">Junte-se a nós</a>
                    <ul>
                        <li><a href="/index.php#clients">Parcerias</a></li>
                        <li><a href="/index.php#services">Patrocínios</a></li>
                    </ul>
                </li>
                <li><a href="/index.php#call-to-action">Audição</a></li>
                <li><a href="/portiforio.php">Portfólio</a></li>
                <li class="menu-has-children"><a>Cursos Oferecidos</a>
                    <ul>
                    <?php
                        include_once($_SERVER["DOCUMENT_ROOT"]."/functions/exibir_cursos.php");
                        $cursos = exibir_cursos("site");

                        if(!empty($cursos)){
                            while($curso = $cursos->fetch_object()){
                                ?>
                                <li><a href="/curso.php?cd=<?php echo $curso->cd_curso; ?>"><?php echo $curso->nm_curso; ?></a></li>
                                <?php
                            }
                        }
                    ?>
                    </ul>
                </li>
                <li><a href="#contact">Contato</a></li>
                <li><a href="/saladeaula/index.php">Login</a></li>
            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->