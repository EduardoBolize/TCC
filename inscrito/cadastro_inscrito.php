<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Andorinha Escola de Ballet</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">

		<!-- Favicons -->
		<link href="/img/ballet/logo.fw.png" rel="icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

		<!-- Bootstrap CSS File -->
		<link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Libraries CSS Files -->
		<link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="/lib/animate/animate.min.css" rel="stylesheet">
		<link href="/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
		<link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

		<!-- Icon of button contact -->
		<link rel="stylesheet" href="/css/bootstrap.min.css">
    	<script src="/js/jquery.min.js"></script>
    	<script src="/js/bootstrap.min.js"></script>

		<!-- style CSS -->
		<link href="/css/style.css" rel="stylesheet">

	</head>
	<body>
		<!--==========================
  		Header
  		============================-->
			<?php 
				include_once('../components/menu.php');
			?>

		  <main id="main">
	
	    <!--==========================
		      Call To Action Section
		    ============================-->
		    <section id="Informação-Galeria" class="wow fadeIn">
		      <div class="teste">
		      	<div class="containe text-center">
		        <h3>Inscreva-se para uma audição</h3>
		        <p> Seja nosso aluno, faça parte do nosso time.</p>
		        <a href="#contact" class="btn-get-started scrollto"><i class="fa fa-chevron-down"></i></a>
		    	</div>
		      </div>
		    </section><!-- #call-to-action -->

		    <!--==========================
		      Contact Section
		    ============================-->
		    <section id="contact" class="section-bg wow fadeInUp">
		      <div class="container">

		        <div class="section-header">
		          <h3>Inscrição</h3>
		          <p>Inscreva-se para fazer uma audição.</p>
		        </div>


		        <div class="form">
		          <div id="errormessage"></div>
                    <form action="actions/cadastrar_inscrito.php" method="post">
                    	<div class="form-group col-md-6">
                    		<input type="text" name="tx_login" class="form-control" id="tx_login" placeholder="Login" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
	                    </div>
	                    <div class="form-group col-md-6">
	                    	<input type="password" name="tx_pass" class="form-control" id="tx_pass" placeholder="Senha" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
	                    </div>
	                    <div class="form-group col-md-6">
	                    	<input type="text" name="nm_inscrito" class="form-control" id="nm_inscrito" placeholder="Nome" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
                        </div>
                        <div class="form-group col-md-6">
                        	<input type="text" name="nr_cpf" class="form-control" id="nr_cpf" placeholder="CPF" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="ds_endereco" class="form-control" id="ds_endereco" placeholder="Endereço" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
						</div>
						<div class="form-group col-md-6">
							<input type="text" name="ds_cidade" class="form-control" id="ds_cidade" placeholder="Cidade" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
						</div>
						<div class="form-group col-md-4">
							<input type="text" name="nr_telefone1" class="form-control" id="nr_telefone1" placeholder="Telefone Principal" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"/>
	                    </div>
	                    <div class="form-group col-md-4">
	                    	<input type="text" name="nr_telefone2" class="form-control" id="nr_telefone2" placeholder="Telefone 2" data-rule="minlen:4" data-msg="Please enter at least 4 chars" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}"/>
	                    </div>
	                    <div class="form-group col-md-4">
	                    	<input type="text" name="tx_email" class="form-control" id="tx_email" placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required />
	                    </div>
	                    <div class="form-group col-md-2 col-md-offset-5">
	                        <div class="input-field center center-align">
	                            <button type="submit" class="btn">Enviar</button>
	                        </div>
	                    </div>
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
		  <script src="/lib/jquery/jquery.min.js"></script>
		  <script src="/lib/jquery/jquery-migrate.min.js"></script>
		  <script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
		  <script src="/lib/easing/easing.min.js"></script>
		  <script src="/lib/superfish/hoverIntent.js"></script>
		  <script src="/lib/superfish/superfish.min.js"></script>
		  <script src="/lib/wow/wow.min.js"></script>
		  <script src="/lib/waypoints/waypoints.min.js"></script>
		  <script src="/lib/counterup/counterup.min.js"></script>
		  <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
		  <script src="/lib/isotope/isotope.pkgd.min.js"></script>
		  <script src="/lib/lightbox/js/lightbox.min.js"></script>
		  <script src="/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
		  <!-- Contact Form JavaScript File -->
		  <script src="/contactform/contactform.js"></script>

		  <!-- Template Main Javascript File -->
		  <script src="../js/main.js"></script>

		  <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/autocomplete_inscrito.js"></script>
        <script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"/></script>
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

	</body>
</html>
<!--
#a92279
#6d2d56
#871B61
#18d26e -->
