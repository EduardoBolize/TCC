<?php
    if(isset($nome) and !empty($nome)){
        $home = 1;
    }else{
        $nome = explode(' ',$_SESSION['nome']);
        $home = 0;
    }

?>
<nav>
    <div class="nav-wrapper content_topo">
        <?php if($home == 0){ ?>
            <a id="btn-back" href="/saladeaula/home.php" class="hide-on-med-and-down btn-floating" style="background-color:#871B61 !important;"><i class="small material-icons">home</i></a>
        <?php } ?>
        <a href="/saladeaula/home.php" class="brand-logo"><img src="/saladeaula/images/logo.png" style="height: 56px; width: auto;"></a>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li>
                <a href="#!" data-target='dropdown1' class='dropdown-trigger'>Bem-Vindo <?php echo $nome[0]; ?></a>
                <ul id='dropdown1' class='dropdown-content'>
                    <li><center><h6><img class="circle" src="<?php echo $_SESSION["img_login"]; ?>" style="border-radius:100%;width:80px;height:auto;"><br> <?php echo $nome[0]; ?></h6></center></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a id="home" href="/saladeaula/home.php" style="color:purple"><i class="material-icons">home</i>Home</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a id="perfil" href="/saladeaula/perfil.php" style="color:purple"><i class="material-icons">assignment</i>Perfil</a></li>
                    <li class="divider" tabindex="-1"></li>
                    <li><a href="/saladeaula/actions/logout.php" style="color:purple"><i class="material-icons">cancel</i>Sair</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
        
<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
        <div class="background">
            <img src="/saladeaula/images/ballet.jpg" style="height: auto; width: 100%;margin-top:-50px">
        </div>
        <a href="#user"><img class="circle" src="<?php echo $_SESSION["img_login"]; ?>" style="border-radius:100%;"></a>
        <a href="#name"><span class="white-text name"><?php echo $_SESSION['nome']; ?></span></a>
        <a href="#email"><span class="white-text email"><?php echo $_SESSION['tp_user']; ?></span></a>
    </div></li>
    <li><a href="/saladeaula/home.php"><i class="material-icons">home</i>Home</a></li>
    <li><a href="/saladeaula/perfil.php"><i class="material-icons">assignment</i>Perfil</a></li>
    <li><div class="divider"></div></li>
    <li><a href="/saladeaula/actions/logout.php"><i class="material-icons">cancel</i>Sair</a></li>
</ul>