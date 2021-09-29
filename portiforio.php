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
		    <section id="Informação-Galeria" class="wow fadeIn">
		      <div class="teste">
		      	<div class="containe text-center">
		        <h3>Uma Grande Jornada</h3>
		        <p> Nesses últimos anos tivemos vários registros de nossas conquistas.</p>
		    	</div>
		      </div>
		    </section><!-- #call-to-action -->

		    <!--==========================
		      Portfolio Section
		    ============================-->
		    <section id="portfolio"  class="section-bg" >
		      <div class="container">

		        <header class="section-header">
		          <h3 class="section-title">Portfolio</h3>
		        </header>

		        <div class="row">
		          <div class="col-lg-12">
		            <ul id="portfolio-flters">
		              <li data-filter="*" class="filter-active">Todos</li>
									<?php
										include_once("functions/exibir_ano_galeria.php");
										
										$datas = exibir_ano_galeria(1);

										foreach ($datas as $data) {
											?>
											<li data-filter=".filter-<?php echo $data; ?>"><?php echo $data; ?></li>
											<?php
										}

									?>
		            </ul>
		          </div>
		        </div>

		        <div class="row portfolio-container">
						<?php 
							include_once("functions/exibir_galerias.php");

							$galerias = exibir_galerias(1);

							if(!empty($galerias)){
								while($galeria = $galerias->fetch_object()){
									$dt = explode('-',$galeria->dt_galeria);
									$dt = $dt[0];
									?>
									<div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $dt; ?> wow fadeInUp">
										<div class="portfolio-wrap">
											<figure>
												<img src="<?php echo $galeria->url_arquivo; ?>" class="img-fluid" alt="" style="">
												<a href="<?php echo "galeria/index-galeria.php?cd=".$galeria->cd_galeria; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
											</figure>

											<div class="portfolio-info">
												<h4><a href="<?php echo "galeria/index-galeria.php?cd=".$galeria->cd_galeria; ?>"><?php echo $galeria->nm_galeria; ?></a></h4>
												<span><?php echo $galeria->ds_galeria; ?></span>
											</div>
										</div>
									</div>
									<?php
								}
							}
						?>
						</div>
		          <!-- <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
		            <div class="portfolio-wrap">
		              <figure>
		                <img src="img/portfolio/web1.jpg" class="img-fluid" alt="">
		                <a href="img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
		                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
		              </figure>

		              <div class="portfolio-info">
		                <h4><a href="#">Web 1</a></h4>
		                <p>Web</p>
		              </div>
		            </div>
		          </div> -->

		        </div>

		      </div>
		    </section><!-- #portfolio -->

		    

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
