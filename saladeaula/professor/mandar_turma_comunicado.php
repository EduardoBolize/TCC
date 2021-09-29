<?php 
	include_once('../functions/util.php');
	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha um comunicado para enviar se quiser acessar essa página!","crud_comunicado.php");
	}

	$sql = "SELECT * from tb_comunicado  where cd_comunicado = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();
		
		$row->dt_assunto = formatar_para_br($row->dt_assunto);
	}else{
		redirect("O código desse comunicado não existe","crud_comunicado.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Mandar Comunicado para Turma</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="content row">
			<?php
				include '../components/menu.php';
			?>

			<div class="col s12">
				<div class="col s10 offset-s1 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<div class="corpo_box col s10 offset-s1">
						<?PHP
						if($_SESSION['tp_user'] == 'Administrador'){
							$redirect = "../professor/crud_comunicado.php";
						}else if($_SESSION['tp_user'] == 'Professor'){
							$redirect = "/saladeaula/home.php#test-swipe-3";
						}
						?>
						<h6> <a href="<?php echo $redirect ?>"> <i class="material-icons"> arrow_back </i> Voltar</a></h6>
						
						<h3><?php echo "$row->tx_titulo em $row->dt_assunto"; ?></h3>
						<p><?php echo $row->ds_descricao; ?></p>
						<div class="col s12 l6">
							<?php
								include '../functions/exibir_turma_comunicados.php';
								//exibir as turmas com o comunicado
								exibir_turma_comunicados(2,$cd);
							?>
						</div>
						<div class="col s12 l6">
							<?php
								//exibir as turmas sem  comunicado
								exibir_turma_comunicados(3,$cd);
							?>
						</div>
							
					</div>
					<div class="footer_box">

					</div>
				</div>
			</div>

		</div>


		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"/></script>
		<script type="text/javascript">
			$(".sidenav").sidenav();
			$('.dropdown-trigger').dropdown();
			$('.modal').modal();
			$('.datepicker').datepicker();
			$('select').formSelect();

		</script>
	</body>
</html>
