<meta charset="utf-8">
<?php

	//include_once('util.php');

	function exibir_feedbacks($filtro,$cd = "", $id_login = ""){

		$mysqli = db_connect();

		if($filtro == 1){   //Mostra para o admin
			$sql = "SELECT * from tb_feedback join tb_resposta on id_resposta = cd_resposta join tb_turma_matricula on id_turma_matricula = cd_turma_matricula join tb_matricula on id_matricula = cd_matricula join tb_professor on id_professor = cd_professor join tb_questao on id_questao = cd_questao join tb_atividade on id_atividade = cd_atividade";
            $query = $mysqli->query($sql);
            //echo $sql;

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_feedback == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_feedback;
					$nome = $row->cd_feedback;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->cd_questao."</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->tx_feedback."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_feedback.php?cd=".$row->cd_feedback."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'>Não existem feedbacks cadastrados!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){   //Mostra para o professor
			$sql = "SELECT * from tb_feedback join tb_resposta on id_resposta = cd_resposta join tb_turma_matricula on id_turma_matricula = cd_turma_matricula join tb_matricula as m on id_matricula = cd_matricula join tb_professor as p on id_professor = cd_professor join tb_login on p.id_login = cd_login join tb_questao on id_questao = cd_questao join tb_atividade on id_atividade = cd_atividade where p.id_login = ".$_SESSION['cd_login'];
            $query = $mysqli->query($sql);
            //echo $sql;

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_feedback == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_feedback;
					$nome = $row->cd_feedback;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->cd_questao."</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->tx_feedback."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_feedback.php?cd=".$row->cd_feedback."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'>Não existem feedbacks cadastrados!</td>";
				echo "</tr>";
			}
		}else if($filtro == 3){   //Mostra para o aluno
			$sql = "SELECT * from tb_feedback join tb_resposta on id_resposta = cd_resposta join tb_turma_matricula on id_turma_matricula = cd_turma_matricula join tb_matricula as m on id_matricula = cd_matricula join tb_professor as p on id_professor = cd_professor join tb_login on id_login = cd_login join tb_questao on id_questao = cd_questao join tb_atividade on id_atividade = cd_atividade where m.id_login = ".$_SESSION['cd_login'];
            $query = $mysqli->query($sql);
            //echo $sql;

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_feedback == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_feedback;
					$nome = $row->cd_feedback;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->cd_questao."</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->tx_feedback."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_feedback.php?cd=".$row->cd_feedback."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'>Não existem feedbacks cadastrados!</td>";
				echo "</tr>";
			}
		}else if($filtro == 4){   //Mostra para o aluno
			$sql = "SELECT * from tb_feedback join tb_resposta on id_resposta = cd_resposta join tb_professor where id_login = $id_login and cd_resposta = $cd";
            $query = $mysqli->query($sql);
            //echo $sql;

			if($query->num_rows > 0){

				$row = $query->fetch_object();

				return $row;

			}else{
				return null;
			}
		}
		
	}