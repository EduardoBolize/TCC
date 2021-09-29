<?php 
    if(isset($_GET["cd"]) and !empty($_GET["cd"])){
        $cd = $_GET["cd"];

        include_once("functions/exibir_cursos.php");
        $query_c = exibir_cursos("site",$cd);
        $row_c = $query_c->fetch_object();
    }else{
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Andorinha Escola de Ballet</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">

		<!-- Favicons -->
		<link href="img/ballet/logo.fw.png" rel="icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

		<!-- Bootstrap CSS File -->
		<link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Libraries CSS Files -->
		<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="lib/animate/animate.min.css" rel="stylesheet">
		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

		<!-- Icon of button contact -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
    	<script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>

		<!-- style CSS -->
		<link href="css/style.css" rel="stylesheet">

	</head>
	<body>
		<!--==========================
  		Header
  		============================-->
			<?php 
				include_once('components/menu.php');
			?>

		  <main id="main">

		    <!--==========================
		      Featured Services Section
		    ============================-->
		     <!-- <section id="featured-services">
		      <div class="container" >
		        <div class="row">

		          <div class="col-lg-4 box">
		            <i class="ion-ios-bookmarks-outline"></i>
		            <h4 class="title"><a href="">Lorem Ipsum Delino</a></h4>
		            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
		          </div>

		          <div class="col-lg-4 box box-bg">
		            <i class="ion-ios-stopwatch-outline"></i>
		            <h4 class="title"><a href="">Dolor Sitema</a></h4>
		            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
		          </div>

		          <div class="col-lg-4 box">
		            <i class="ion-ios-heart-outline"></i>
		            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
		            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
		          </div>

		        </div>
		      </div>
		    </section> --> <!-- #featured-services -->

		    <!--==========================
		      Call To Action Section
		    ============================-->
		    <section id="intro">
				<div class="intro-container">
					<div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

						<ol class="carousel-indicators"></ol>

						<div class="carousel-inner" role="listbox">

							<div class="carousel-item active">
								<div class="carousel-background"><img src="<?php echo "/img/cursos/".$row_c->url_arquivo; ?>" alt=""></div>
								<div class="carousel-container">
									<div class="carousel-content">
										<h2><?php echo $row_c->nm_curso; ?></h2>
										<p>Conheça melhor o curso!</p>
										<a href="#curso" class="btn-get-started scrollto"><i class="fa fa-chevron-down"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		  </section>

		    
		    <!--==========================
		      Informações do Curso Section
		    ============================-->
		    <section id="curso" class="section-bg wow fadeInUp" style="background-color:white; padding-top:30px;">
		      <div class="container">

		        <div class="section-header">
		          <h3><?php echo $row_c->nm_curso; ?></h3>
		        </div>

		        <div class="row contact-info">
		          <div class="col-md-6">
                    <div class="col-lg-12 col-md-12">
                        <p style="font-size:16pt;text-indent:2rem;text-align:left;"><?php echo $row_c->ds_curso; ?></p>
                    </div>
		          </div>

		          <div class="col-md-6">
                    <div class="col-lg-12 col-md-12">
                        <img src="<?php echo "/img/cursos/".$row_c->url_arquivo; ?>" alt="Imagem do curso" style="width:100%;height:auto;">
                    </div>
		          </div>
                </div>

                <div class="row contact-info">
                    <div class="col-md-12" style="text-align:left;">
                        <h3>Salas do Curso</h3>
                        <ul>
                        <?php
                            include_once("functions/exibir_salas.php");
                            $salas = exibir_salas(2,$cd);

                            if(!empty($salas)){
                                while($sala = $salas->fetch_object()){
                                    ?>
                                        <li><?php echo $sala->nm_sala; ?> - <?php echo $sala->sg_sala; ?></li>
                                    <?php
                                }
                            }else{
                                ?>
                                    <li>Sem salas Cadastradas!</li>
                                <?php
                            }
                        ?>
                        </ul>
		            </div>
							</div>

		      </div>
		    </section><!-- #contact -->


		    <!--==========================
		      Contact Section
		    ============================-->
		    <?php 
					include_once("components/contato.php");
				?>

		  </main>

		  <!--==========================
		    Footer
		  ============================-->
			<?php 
				include_once("components/footer.php");
			?>

		  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

		  <!-- JavaScript Libraries -->
		  <script src="lib/jquery/jquery.min.js"></script>
		  <script src="lib/jquery/jquery-migrate.min.js"></script>
		  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
		  <script src="lib/easing/easing.min.js"></script>
		  <script src="lib/superfish/hoverIntent.js"></script>
		  <script src="lib/superfish/superfish.min.js"></script>
		  <script src="lib/wow/wow.min.js"></script>
		  <script src="lib/waypoints/waypoints.min.js"></script>
		  <script src="lib/counterup/counterup.min.js"></script>
		  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
		  <script src="lib/isotope/isotope.pkgd.min.js"></script>
		  <script src="lib/lightbox/js/lightbox.min.js"></script>
		  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
		  <!-- Contact Form JavaScript File -->
		  <script src="contactform/contactform.js"></script>

		  <!-- Template Main Javascript File -->
		  <script src="js/main.js"></script>

	</body>
</html>
<!--
#a92279
#6d2d56
#871B61
#18d26e -->
