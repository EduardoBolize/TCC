<?php 
	include_once('../functions/util.php');
	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd_professor = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma matéria que o professor aplica a aula!","crud_professor.php");
	}

	$sql = "SELECT * from tb_professor  where cd_professor = $cd_professor";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row = $query->fetch_object();
	}else{
		redirect("O código desse professor não existe","crud_professor.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Matérias do Professor</title>
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
						<h3><?php echo "$row->nm_professor"; ?></h3>
						<p><?php echo $row->tx_email; ?></p>
						<div class="col s12 l6">
							<?php
								include_once '../functions/exibir_materia.php';
								//exibir as matriculas com o comunicado
								exibir_materia(2,$cd_professor);
							?>
						</div>
						<div class="col s12 l6">
							<?php
								//exibir as matriculas sem o comunicado
								exibir_materia(3,$cd_professor);
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

			$("#search").on("keyup",function(){
				console.log(this.value);
				if(this.value == ''){
					$(".search_item").find(":contains('')").css("display","list-item");
				}else{
					$(".search_item").find(":contains('')").css("display","none");
					$(".search_item").find(":contains('"+this.value+"')").css("display","list-item");
					$(".search_item i").css("display","inline-block");
				}
			});
		</script>
	</body>
</html>
