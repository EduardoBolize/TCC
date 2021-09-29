<?php 
	include_once('../functions/util.php');

	if(isset($_GET['cd']) and !empty($_GET['cd'])){
		$cd = $_GET['cd'];
	}else{
		redirect("Favor, escolha uma tarefa para editar se quiser acessar essa página!","crud_tarefa.php");
	}

	$sql = "SELECT cd_tarefa, id_atividade, nm_atividade, id_turma,nm_sala, dt_turma, dt_tarefa, dt_prazo, hr_prazo from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala where cd_tarefa = $cd";
	$query = $mysqli->query($sql);

	if($query->num_rows > 0){
		$row_princ = $query->fetch_object();
	}else{
		redirect("O código dessa tarefa não existe","crud_tarefa.php");
	}
	

?>
<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Atualizar Tarefa</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		
	</head>
	<body>
		<div class="content row">

			<?php
				include_once('../components/menu.php');
			?>

			<div class="col s12">
				<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<div class="topo_box center center-align col s10 offset-s1">
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer" onclick="window.location = 'crud_tarefa.php';">
					</div>
					<div class="col s12 center center-align">
						<h4 onclick="rodar()">Alterar Tarefa</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="../actions/atualizar_tarefa.php" method="post">
							<input type="hidden" name="cd_tarefa" value="<?php echo $row_princ->cd_tarefa; ?>">
							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<select name="id_atividade" required>
									<option disabled="disabled" selected >Selecione uma atividade</option>
									<?php
									$sql = "SELECT * FROM tb_atividade";
									$query = $mysqli->query($sql);

									while($row_ativ = $query->fetch_object()){

										$cd = $row_ativ->cd_atividade;
										$nome = $row_ativ->nm_atividade;

										echo "<option value='$cd'>$nome</option>";

									}
									?>
								<label>Atividade</label>
								
								</select>
							</div>

							<div class="input-field">
								<i class="material-icons prefix">border_color</i>
								<select name="id_turma" required>
									<option disabled="disabled" selected >Selecione uma turma</option>
									<?php

									$sql_1 = "SELECT * FROM tb_turma JOIN tb_sala ON id_sala = cd_sala";
									$query_1 = $mysqli->query($sql_1);

									while($row_1 = $query_1->fetch_object()){

										$cd = $row_1->cd_turma;
										$data = separar_data($row_1->dt_turma, 0);
										$nome = $row_1->nm_sala;

										echo "<option value='$cd'>$nome - $data</option>";

									}
									
									?>
								<label>Turma</label>
								
								</select>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">today</i>
								<label for="dt_tarefa">Data Inicial:</label>
								<input type="text" class="datepicker" name="dt_tarefa" id="dt_tarefa" required onfocus="this.blur();" value="<?php echo $row_princ->dt_tarefa; ?>">
							</div>
							<div class="input-field">
								<i class="material-icons prefix">today</i>
								<label for="dt_prazo">Data Prazo:</label>
								<input type="text" class="datepicker" name="dt_prazo" id="dt_prazo" required onfocus="this.blur();" value="<?php echo $row_princ->dt_prazo; ?>">
							</div>
							<div class="input-field">
								<i class="material-icons prefix">access_time</i>
								<label for="hr_prazo">Hora Prazo:</label>
								<input type="text" class="timepicker" name="hr_prazo" id="hr_prazo" required onfocus="this.blur();"  value="<?php echo $row_princ->hr_prazo; ?>">
							</div>
							
							<div class="input-field center center-align">
								<button type="submit" class="btn">Enviar</button>
							</div>
						</form>
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
		<script type="text/javascript" src="/saladeaula/js/traduzir_datepicker.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"/></script>
		<script type="text/javascript">
			$('select').formSelect();
			$('.timepicker').timepicker();

			$('.datepicker').datepicker();
            traduzir_datepicker("#dt_tarefa");
            traduzir_datepicker("#dt_prazo");
		</script>
	</body>
</html>