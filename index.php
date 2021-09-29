<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Andorinha Escola de Ballet</title>
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta content="" name="keywords">
		<meta content="" name="description">
		<link rel="manifest" href="/manifest.json">

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

			<!--==========================
			Intro Section
			============================-->
			<section id="intro">
				<div class="intro-container">
					<div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

						<ol class="carousel-indicators"></ol>

						<div class="carousel-inner" role="listbox">

							<div class="carousel-item active">
								<div class="carousel-background"><img src="img/carousel/mayara-magri-cisne-negro.jpg" alt=""></div>
								<div class="carousel-container">
									<div class="carousel-content">
										<h2>Zumba</h2>
										<p>Venha mexer o corpo com a zumba, a dança que você pode se divertir e ter uma boa saúde!</p>
										<a href="#featured-services" class="btn-get-started scrollto">Confira!</a>
									</div>
								</div>
							</div>

							<div class="carousel-item">
								<div class="carousel-background"><img src="img/carousel/corpodebaile.jpg" alt=""></div>
								<div class="carousel-container">
									<div class="carousel-content">
										<h2>Tecnologia para nosso alunos!</h2>
										<p>Sempre vindo com inovação para os alunos, a Escola Ballet Andorinha trás agora com o novo método de ensino usando a tecnologia para o melhor auxílio a cada um. Venha descobrir esse novo modo e invista em um futuro melhor! </p>
										<a href="#featured-services" class="btn-get-started scrollto">Confira!</a>
									</div>
								</div>
							</div>

							<div class="carousel-item">
								<div class="carousel-background"><img src="img/ballet/NateJunior.jpg" alt=""></div>
								<div class="carousel-container">
									<div class="carousel-content">
										<h2>Profissionais de alta qualidade</h2>
										<p>Venha conhecer o trabalho de nosso profissionais, o método de educação e formação.</p>
										<a href="#featured-services" class="btn-get-started scrollto">Confira!</a>
									</div>
								</div>
							</div>

							<div class="carousel-item">
								<div class="carousel-background"><img src="img/carousel/turmaapresentacao.png" alt=""></div>
								<div class="carousel-container">
									<div class="carousel-content">
										<h2>Sempre em atividade</h2>
										<p>Confira agora os eventos que a Escola vem participando e não deixe de estar junto conosco.</p>
										<a href="#featured-services" class="btn-get-started scrollto">Confira!</a>
									</div>
								</div>
							</div>

		          <div class="carousel-item">
		            <div class="carousel-background"><img src="img/carousel/Paquita.jpg" alt=""></div>
		            <div class="carousel-container">
		              <div class="carousel-content">
		                <h2>Parcerias</h2>
		                <p>A Instituição Andorinha tem se ajuntado com outros polos de ensino, assim facilitando e achegando-se mais a você! Não deixe de conferir!</p>
		                <a href="parceiro.php" class="btn-get-started scrollto">Confira!</a>
		              </div>
		            </div>
		          </div>

		        </div>

		        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
		          <span class="sr-only">Previous</span>
		        </a>

		        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
		          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
		          <span class="sr-only">Next</span>
		        </a>

		      </div>
		    </div>
		  </section><!-- #intro -->

		  <main id="main">



		    <!--==========================
		      About Us Section
		    ============================-->
		    <section id="about">
		      <div class="container">

		        <header class="section-header">
		          <h3>Conheça nosso trabalho!</h3>
		          <p>A Escola Ballet Andorinha trabalha a mais de 14 anos, trazendo capacitação para formar bailarinos com qualificação técnica e artística. Desenvolvou métodos específicos de ensino e visa em primeiro plano a prosperidade integral do aluno, sendo assim sua parte étnica, social, artística e técnica.
		          Com a mais moderna forma de tecnologia, em 2018 entrou em parceria com desenvolvedores técnicos da área de TI (Técnico em Informática), promovendo o aprimoramento do método de divulgação e ensino, deixando a Instituição informatizada.</p>
		        </header>

		        <div class="row about-cols">

		          <div class="col-md-4 wow fadeInUp">
		            <div class="about-col">
		              <div class="img">
		                <img src="img/ballet/dance.jpg" alt="" class="img-fluid" style="width:100%; height:auto;">
		                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
		              </div>
		              <h2 class="title"><a href="#">Nossa Missão</a></h2>
		              <p>"Não formamos apenas bailarinos, mas também cidadãos!".</p>
		                <p>Sabemos o quão importante é a educação e levamos isso a sério, pode-se dizer que que a disciplina é nosso forte e passamos isso cada vez mais, afinal <i id="i">" a distância entre o sonho e a realidade, é a disciplina!"</i><br/>-Bernardinho
		              </p>
		            </div>
		          </div>

		          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
		            <div class="about-col">
		              <div class="img">
		                <img src="img/ballet/bailarina-pintando.jpg" alt="" class="img-fluid" style="width:100%; height:auto;">
		                <div class="icon"><i class="ion-ios-list-outline"></i></div>
		              </div>
		              <h2 class="title"><a href="#">Currículo Diferenciado</a></h2>
		              <p>
		                A E.B.A. Cia Nathalie Castro é um membro ativo do Conselho Internacional de Dança -CID (16332-BRAZIL), o maior órgão oficial para todos os tipos de dança do mundo que   admite  como seus membros as mais importantes federações, associações, escolas, empresas e particulares em 155 países o que permite que a Escola E.B.A CIA NATHALIE CASTRO conceda aos alunos que concluem sua formação na Escola CERTIFICAÇÃO a NÍVEL INTERNACIONAL.


		              </p>
		            </div>
		          </div>

		          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
		            <div class="about-col">
		              <div class="img">
		                <img src="img/ballet/pintura2.jpg" alt="" class="img-fluid" style="width:100%; height:auto;">
		                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
		              </div>
		              <h2 class="title"><a href="#">De Olho Nos Prêmios	</a></h2>
		              <p>
		                Conheça a trajetória que trazemos de troféos em toda nossa jornada, e entenda como isso atinge nosso balirinos, tanto na parte avaliativa como para o histórico dele.
		              </p>
		            </div>
		          </div>

		        </div>

		      </div>
		    </section><!-- #about -->

		    <section id="services">
		      <div class="container">

		        <header class="section-header wow fadeInUp">
		          <h3>Patrocínios</h3>
		          <p> Confira os patrocinadores que andam Junto conosco.</p>
		        </header>

		        <div class="row">

		          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
		            <div class="icon"><img src="img/wizardlogo.png" class="imgservices" alt="Wizard"></div>
		            <h4 class="title"><a >Wizard</a></h4>
		            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
		          </div>
		          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
		            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
		            <h4 class="title"><a href="">Outro Patrocínio</a></h4>
		            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
		          </div>
		        </div>

		        <header class="section-header wow fadeInUp">
		        	<div class="container text-center">
		          <p><h4> Caso não seja um patrocinador ainda, entenda como funciona e particípe dessa ação.</h4></p>
		          <a class="cta-btn" href="patrocinador.php">Mais Informações</a>
		      </div>
		        </header>

		      </div>
		    </section><!-- #services -->
		    <!--==========================
		      Call To Action Section
		    ============================-->
		    <section id="call-to-action" class="wow fadeIn">
		      <div class="container text-center">
		        <h3>Audições</h3>
		        <p> Mande para nós seus dados e aguarde retorno para que possa vir fazer uma audição em nossa escola! Estamos sempre a sua espera. </p>
		        <a class="cta-btn" href="inscrito/cadastro_inscrito.php">Mais Informações</a>
		      </div>
		    </section><!-- #call-to-action -->

		   

		    <!--==========================
		      Clients Section
		    ============================-->
		    <section id="clients" class="wow fadeInUp">
		      <div class="container">

		        <header class="section-header">
		          <h3>Parcerias</h3>
		        </header>

		        <div class="owl-carousel clients-carousel" >
		          <img src="img/clients/valefit.jpg" alt=" ValeFit" style="width:910px; height:100px;">
		          <img src="img/clients/institutosaber.fw.png" alt="" style="width:510px; height:100px;">
		          <img src="img/clients/logo_wizard.png" alt="" style="width:510px; height:100px;">
		          <img src="img/clients/client-7.png" alt="" style="width:510px; height:100px;">
		      </div>
		      <br>
		      <header class="section-header wow fadeInUp">
		        <div class="container text-center">
		          <a class="cta-btn" href="parceiro.php">Mais Informações</a>
		      	</div>
		      </header>
		    </section><!-- #clients -->

		    <!--==========================
		      Team Section
		    ============================-->
		    <section id="team">
		      <div class="container">
		        <div class="section-header wow fadeInUp">
		          <h3>Responsáveis</h3>
		          <p>Para a movimentação da escola, temos grandes responsáveis.</p>
		        </div>

		        <div class="row">
						<?php
							include_once("functions/exibir_professores.php");
							$query_prof = exibir_professores("site");

							if(!empty($query_prof)){
								while($professores = $query_prof->fetch_object()){
									?>
									<div class="col-lg-3 col-md-6 wow fadeInUp">
										<div class="member">
											<img src="<?php echo "img/professores/$professores->url_arquivo"; ?>" class="img-fluid" alt="">
											<div class="member-info">
												<div class="member-info-content">
													<h4><?php echo $professores->nm_professor; ?></h4>
													<span><?php //echo $professores->ds_professor; ?></span>
													<!-- <div class="social">
														<a href=""><i class="fa fa-twitter"></i></a>
														<a href=""><i class="fa fa-facebook"></i></a>
														<a href=""><i class="fa fa-google-plus"></i></a>
														<a href=""><i class="fa fa-linkedin"></i></a>
													</div> -->
												</div>
											</div>
										</div>
									</div>
									<?php
								}
							}
						?>

		        </div>

		      </div>
		    </section><!-- #team -->

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
