<?php 
	if(isset($_GET["cd"]) and !empty($_GET["cd"])){
		$cd_galeria = $_GET["cd"];

		include_once("../functions/exibir_galerias.php");
		$galerias = exibir_galerias(1,$cd_galeria);

		if(!empty($galerias)){
			$galeria = $galerias->fetch_object();
		}else{
			header("Location: ../portiforio.php");
		}
	}else{
		header("Location: ../portiforio.php");
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

		<!-- Pagina gamma -->
		<meta name="description" content="Gamma Gallery - A Responsive Image Gallery Experiment"/>
        <meta name="keywords" content="html5, responsive, image gallery, masonry, picture, images, sizes, fluid, history api, visibility api"/>
        <meta name="author" content="Codrops"/>
        <!-- /Pagina gamma -->

		<!-- Favicons -->
		<link href="../img/ballet/logo.fw.png" rel="icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

		<!-- Bootstrap CSS File -->
		<link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Libraries CSS Files -->
		<link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="../lib/animate/animate.min.css" rel="stylesheet">
		<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

		<!-- Icon of button contact -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
			<link rel="stylesheet" href="../css/bootstrap.min.css">
    	<script src="../js/jquery.min.js"></script>
    	<script src="../js/bootstrap.min.js"></script>

		<!-- style CSS -->
		<!-- Pagina padrao -->
		<link href="../css/style.css" rel="stylesheet"> 

		<!-- Pagina gamma -->
		<link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/styleE.css"/> 

		<script src="js/modernizr.custom.70736.js"></script>
		<noscript><link rel="stylesheet" type="text/css" href="css/noJS.css"/></noscript>
		<!-- /Pagina gamma -->

	</head>
	<body>
		<!--==========================
  		Header
  		============================-->
		<?php 
			include_once('../components/menu.php');
		?>

		  <main id="main">

		    <section id="Informação-Galeria" class="wow fadeIn" style="background: linear-gradient(rgba(0, 0, 0, 0.55), rgba(66, 34, 78, 0.40)), url(<?php echo $galeria->url_arquivo; ?>) fixed center center; background-size:cover;">
		      <div class="teste">
		      	<div class="containe text-center">
		        <h3><?php echo $galeria->nm_galeria; ?></h3>
		        <p> <?php echo $galeria->ds_galeria; ?></p>
		    	</div>
		      </div>
		    </section>

		    <!--==========================
		      Portfolio Section
		    ============================-->
		    <div class="main">
				
				<div class="gamma-container gamma-loading" id="gamma-container">

					<ul class="gamma-gallery">

						<!-- PHP que faz as referências das imagens -->
						<?php

							include_once("../functions/exibir_fotos.php");
							$fotos = exibir_fotos(1,$cd_galeria);

							if(!empty($fotos)){
								while($foto = $fotos->fetch_object()){
									?>
									<li>
									<div data-alt="img0" data-description="<h3><?php echo $foto->nm_midia; ?> </h3>" data-max-width="1800" data-max-height="1350">
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="1300"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="1000"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="700"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="300"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="200"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>" data-min-width="140"></div>
									<div data-src="<?php echo $foto->url_arquivo; ?>"></div>
									<noscript>
											<img src="images/xsmall/.jpg" alt="img0"/>
										</noscript>
									</div>
									</li>
									<?php
								}
							}

						?>

					</ul>

					<div class="gamma-overlay"></div>

				</div>

			</div>

		    

		    <!--==========================
		      Contact Section
		    ============================-->
		    <?php 
				include_once("../components/contato.php");
			?>

		  </main>

		  <!--==========================
		    Footer
		  ============================-->
			<?php 
				include_once("../components/footer.php");
			?>

		  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
		<script src="js/jquery.masonry.min.js"></script>
		<script src="js/jquery.history.js"></script>
		<script src="js/js-url.min.js"></script>
		<script src="js/jquerypp.custom.js"></script>
		<script src="js/gamma.js"></script>
		<script type="text/javascript">
			
			$(function() {

				var GammaSettings = {
						// order is important!
						viewport : [ {
							width : 1200,
							columns : 5
						}, {
							width : 900,
							columns : 4
						}, {
							width : 500,
							columns : 3
						}, { 
							width : 320,
							columns : 2
						}, { 
							width : 0,
							columns : 2
						} ]
				};

				Gamma.init( GammaSettings, fncallback );


				// Example how to add more items (just a dummy):

				var page = 0,
					items = ['<li><div data-alt="img03" data-description="<h3>Visualizar</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Visualizar</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Visualizar</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Visualizar</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li><li><div data-alt="img03" data-description="<h3>Visualizar</h3>" data-max-width="1800" data-max-height="1350"><div data-src="images/xxxlarge/3.jpg" data-min-width="1300"></div><div data-src="images/xxlarge/3.jpg" data-min-width="1000"></div><div data-src="images/xlarge/3.jpg" data-min-width="700"></div><div data-src="images/large/3.jpg" data-min-width="300"></div><div data-src="images/medium/3.jpg" data-min-width="200"></div><div data-src="images/small/3.jpg" data-min-width="140"></div><div data-src="images/xsmall/3.jpg"></div><noscript><img src="images/xsmall/3.jpg" alt="img03"/></noscript></div></li>']

				function fncallback() {

					$( '#loadmore' ).show().on( 'click', function() {

						++page;
						var newitems = items[page-1]
						if( page <= 1 ) {
							
							Gamma.add( $( newitems ) );

						}
						if( page === 1 ) {

							$( this ).remove();

						}

					} );

				}

			});

		</script>

	</body>
</html>
<!--
#a92279
#6d2d56
#871B61
#18d26e -->
