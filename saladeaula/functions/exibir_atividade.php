<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_atividade($filtro, $cd='a',$materia=""){

		$mysqli = db_connect();

		if($filtro == 1){
			
			$sql = "SELECT * from tb_atividade";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_atividade == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_atividade;
					$nome = $row->nm_atividade;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->ds_atividade."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='/saladeaula/professor/editar_atividade.php?cd=".$row->cd_atividade."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='6'>Não existem atividades cadastradas!</td>";
				echo "</tr>";
			}
				
		}else if($filtro == 2){	//Todas as atividades de um professor
			
			//$sql = "SELECT cd_atividade, nm_atividade, ds_atividade, dt_atividade, dt_prazo, hr_prazo, st_atividade from tb_atividade where id_login = $_SESSION['id_login']";
			$sql = "SELECT cd_atividade, nm_atividade, ds_atividade, st_atividade from tb_atividade";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_atividade == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_atividade;
					$nome = $row->nm_atividade;
					$ds = $row->ds_atividade;
					$st = $row->st_atividade;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->ds_atividade."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_atividade.php?cd=".$row->cd_atividade."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem atividades cadastradas!</td>";
				echo "</tr>";
			}
				
		}else if($filtro == 3){ //todas as atividades de um aluno 

			//$date = "2018-11-01 22:30";
			date_default_timezone_set("America/Sao_Paulo");
			$now = date("Y-m-d H:i");

			// if(strtotime($now) > strtotime($date)){
			// 	echo "<script>";
			// 	echo "console.log('Data agora: $now');";
			// 	echo "console.log('Data: $date');";
			// 	echo "console.log('Maior');";
			// 	echo "</script>";
			// }else{
			// 	echo "<script>";
			// 	echo "console.log('Data agora: $now');";
			// 	echo "console.log('Data: $date');";
			// 	echo "console.log('Menor');";
			// 	echo "</script>";
			// }

			$sql = "SELECT cd_atividade, nm_atividade, ds_atividade,cd_tarefa,DATE_FORMAT(dt_prazo,'%d/%m/%Y') as dt_prazo,hr_prazo,DATE_FORMAT(dt_tarefa,'%d/%m/%Y') as dt_tarefa from tb_matricula as m join tb_turma_matricula as tm on tm.id_matricula = m.cd_matricula join tb_turma as t on tm.id_turma = t.cd_turma join tb_tarefa as ta on ta.id_turma = t.cd_turma join tb_atividade on id_atividade = cd_atividade where st_turma = 1 and st_atividade = 1 and st_tarefa = 1 and dt_tarefa <= NOW() and cd_turma_matricula = $cd";
			$sql .= " order by dt_tarefa DESC";
			if($query = $mysqli->query($sql)){
				if($query->num_rows > 0){
					while($atividade = $query->fetch_object()){

						$at_materias = Array();

						$lo = "SELECT * from tb_tarefa_materia join tb_materia on id_materia = cd_materia where id_tarefa = $atividade->cd_tarefa";
						$mats = $mysqli->query($lo);

						while($mat = $mats->fetch_object()){
							$at_materias[] = $mat->cd_materia;
						}

						if($materia != ""){
							if(in_array($materia,$at_materias)){
								//Pegador de cor de materia
								$sql_c = "SELECT * from tb_materia where cd_materia = $materia LIMIT 1";
								$cores = $mysqli->query($sql_c);

								if($cores->num_rows > 0){
									$cor = $cores->fetch_object()->tx_cor;
								}else{
									$cor = "black";
								}

								$sql = "SELECT nm_professor as nome,url_arquivo as url_a from tb_tarefa join tb_professor on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa UNION ";
								$sql .= "SELECT nm_admin as nome,url_arquivo as url_a from tb_tarefa join tb_admin on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa";
								$cats = $mysqli->query($sql);

								if($cats->num_rows > 0){
									$cat = $cats->fetch_object();
								}
								?>
								<a class="col s12" style="padding:0px;margin-bottom:10px !important; background-color:<?php echo $cor; ?>; padding-top:5px;" href="aluno/responder_atividade.php?cd=<?php echo $atividade->cd_tarefa; ?>&cd_turma=<?php echo $_GET["cd_turma"]; ?>">
									<div class="col s12">
										<div class="col s3 m2 l2">
											<img style="width:100%; height:auto; border-radius:100%;" src="../../img/professores/<?php echo $cat->url_a; ?>">
										</div>
										<div class="col s9 m10 l10 white-text" style="text-shadow:1px 1px black;">
											<h5 style="font-size:16pt;"><?php echo $cat->nome; ?></h5>
											<p style="padding:0; margin:0;">Postado em <?php echo $atividade->dt_tarefa; ?></p>
										</div>
									</div>
									<div class="col s12 ati white">
										<p class="p_text">Prazo até <?php echo $atividade->dt_prazo; ?> as <?php echo $atividade->hr_prazo; ?></p>
										<div class="col s12">
											<?php
												$sql = "SELECT * from tb_tarefa_materia join tb_materia on id_materia = cd_materia where id_tarefa = $atividade->cd_tarefa";
												$cats = $mysqli->query($sql);

												if($cats->num_rows > 0){
													while($cat = $cats->fetch_object()){
													?>
														<div class="chip" style="background-color: <?php echo $cat->tx_cor; ?>; text-shadow:1px 1px black;">
															<?php echo $cat->nm_materia ?>
														</div>
													<?php
													}
												}
											?>
										</div>&nbsp;<br>
										<div class="col s12 black-text ati-title"><?php echo $atividade->nm_atividade; ?></div>
										<div class="col s12 black-text"><?php echo $atividade->ds_atividade; ?></div>
										<br><br>
										<button class="btn col s12" style="margin-top:20px;">Conferir</button>
									</div>
								</a>
								<?php
							}
						}else{
							$sql = "SELECT tx_cor from tb_tarefa_materia as tm join tb_materia on tm.id_materia = cd_materia where id_tarefa = $atividade->cd_tarefa";
							$cats = $mysqli->query($sql);

							if($cats->num_rows > 0){
								$cat = $cats->fetch_object();
								$cor = $cat->tx_cor;
							}else{
								$cor = "black";
							}

							$sql = "SELECT nm_professor as nome,url_arquivo as url_a from tb_tarefa join tb_professor on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa UNION ";
							$sql .= "SELECT nm_admin as nome,url_arquivo as url_a from tb_tarefa join tb_admin on id_criador = id_login join tb_arquivo on id_arquivo = cd_arquivo where cd_tarefa = $atividade->cd_tarefa";
							$cats = $mysqli->query($sql);

							if($cats->num_rows > 0){
								$cat = $cats->fetch_object();
							}
							?>
							<a class="col s12" style="padding:0px;margin-bottom:10px !important; background-color:<?php echo $cor; ?>; padding-top:5px;" href="aluno/responder_atividade.php?cd=<?php echo $atividade->cd_tarefa; ?>&cd_turma=<?php echo $_GET["cd_turma"]; ?>">
								<div class="col s12">
									<div class="col s3 m2 l2">
										<img style="width:100%; height:auto; border-radius:100%;" src="../../img/professores/<?php echo $cat->url_a; ?>">
									</div>
									<div class="col s9 m10 l10 white-text" style="text-shadow:1px 1px black;">
										<h5 style="font-size:16pt;"><?php echo $cat->nome; ?></h5>
										<p style="padding:0; margin:0;">Postado em <?php echo $atividade->dt_tarefa; ?></p>
									</div>
								</div>
								<div class="col s12 ati white">
									<p class="p_text">Prazo até <?php echo $atividade->dt_prazo; ?> as <?php echo $atividade->hr_prazo; ?></p>
									<div class="col s12">
										<?php
											$sql = "SELECT * from tb_tarefa_materia join tb_materia on id_materia = cd_materia where id_tarefa = $atividade->cd_tarefa";
											$cats = $mysqli->query($sql);

											if($cats->num_rows > 0){
												while($cat = $cats->fetch_object()){
												?>
													<div class="chip" style="background-color: <?php echo $cat->tx_cor; ?>; text-shadow:1px 1px black;">
														<?php echo $cat->nm_materia ?>
													</div>
												<?php
												}
											}
										?>
									</div>&nbsp;<br>
									<div class="col s12 black-text ati-title"><?php echo $atividade->nm_atividade; ?></div>
									<div class="col s12 black-text"><?php echo $atividade->ds_atividade; ?></div>
									<br><br>
									<button class="btn col s12" style="margin-top:20px;">Conferir</button>
								</div>
							</a>
							<?php
						}
					}
				}else{
					?>
					<div class=" col s12 ati white">
						<div class="col s12 black-text">Sem atividades ainda...</div>
					</div>
					<?php
				}

			}else{
				?>
				<div class=" col s12 ati white">
					<div class="col s12 black-text">Erro ao exibir atividades</div>
				</div>
				<?php
			}

		}
		
	}