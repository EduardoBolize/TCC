<?php 

	//Verifica as salas que o aluno pertence
	include_once("functions/exibir_turma_matricula.php");
	$turmas = exibir_turma_matricula(4,$_SESSION["cd_login"]);

	if(!empty($turmas)){
		while($turma = $turmas->fetch_object()){
			$turma->dt_turma = explode("-",$turma->dt_turma);
			?>
			<a href="home.php?cd_turma=<?php echo $turma->cd_turma; ?>">
				<div class="col s12 m6 l4">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title center-align"><?php echo $turma->sg_sala." - ".$turma->dt_turma[0]; ?></span>
							<p class="center-align"><?php echo $turma->nm_sala; ?></p>
						</div>
						<div class="card-action center-align">
							<a href="home.php?cd_turma=<?php echo $turma->cd_turma; ?>">Conferir</a>
						</div>
					</div>
				</div>
			</a>
			<?php
		}
	}else{
		echo "Você não está cadastrado em nenhuma turma!";
	}

?>