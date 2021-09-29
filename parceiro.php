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
		      Call To Action Section
		    ============================-->
		    <section id="Informação-Galeria" class="wow fadeIn">
		      <div class="teste">
		      	<div class="containe text-center">
		        <h3>Parcerias</h3>
		        <p> Seja um de nossos parceiros em eventos e apresentações.</p>
		    	</div>
		      </div>
		    </section><!-- #call-to-action -->

		    <!--==========================
		      Contact Section
		    ============================-->
		    <section id="contact" class="section-bg wow fadeInUp">
		      <div class="container">

		        <div class="section-header">
		          <h3>Parcerias</h3>
		          <p>Ser um parceiro é trabalhar conosco como um freelancer, um parceiro pode ser um fotógrafo em um evento, uma costureira que faça o figurino de uma apresentação ou até mesmo um uber que leve nosso time para uma cometição.</p>
		        </div>

		        

		        <div class="section-header">
		          <p>Trabalhe conosco, envie um email e um de nossos representantes te responderá com mais informações de como se tornar um parceiro.</p>
		        </div>

		        <div class="form">
		          <div id="errormessage"></div>
		          <form action="parceiro/emailenviar.php" method="post">
		            <div class="form-row">
		              <div class="form-group col-md-6">
		                <input type="text" name="nm_parceiro" class="form-control" id="nm_parceiro" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
		                <div class="validation"></div>
		              </div>
		              <div class="form-group col-md-6">
		                <input type="email" class="form-control" name="tx_email" id="tx_email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
		                <div class="validation"></div>
		              </div>
		            </div>
		            <div class="form-group">
		              <textarea class="form-control" name="ds_parceiro" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mensagem"></textarea>
		              <div class="validation"></div>
		            </div>
		            <div class="text-center"><button type="submit"> Enviar &nbsp &nbsp <span class="glyphicon glyphicon-send"></button></div>
		          </form>
		        </div>

		      </div>
		    </section><!-- #contact -->

		  </main>

		  <!--==========================
		    Footer
		  ============================-->
		  <?php 
				include_once("../components/footer.php");
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
