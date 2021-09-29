<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_tarefas($filtro,$cd='',$add=""){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT cd_atividade, id_turma, cd_tarefa, nm_atividade, nm_sala, DATE_FORMAT(dt_tarefa, '%d/%m/%Y') as dt_tarefa, DATE_FORMAT(dt_prazo, '%d/%m/%Y') as dt_prazo, hr_prazo, st_tarefa from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala";
			if($cd != ''){
				$sql .= " where id_criador = ".$cd;
			}
			$query = $mysqli->query($sql);
			
			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_tarefa == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_tarefa;
					$nome = $row->nm_atividade;

					echo "<tr>";
					if($add != 0){
						echo "<td>&nbsp;</td>";
					}
					echo "<td>".$row->cd_tarefa."</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->nm_sala."</td>";
					echo "<td>".$row->dt_tarefa."</td>";
					echo "<td>".$row->dt_prazo."</td>";
					echo "<td>".$row->hr_prazo."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='/saladeaula/professor/editar_atividade.php?cd=".$row->cd_atividade."&id_turma=".$row->id_turma."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='7'>Não existem tarefas cadastradas!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){

			$sql = "SELECT * from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala WHERE st_tarefa = 1";
			$query = $mysqli->query($sql);
			
			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					$cd = $row->cd_tarefa;
					$nome = $row->nm_sala;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->cd_tarefa."</td>";
					echo "<td>".$row->nm_atividade."</td>";
					echo "<td>".$row->nm_sala."</td>";
					echo "</tr>";
				}

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existem tarefas cadastradas!</td>";
				echo "</tr>";
			}

		}else if($filtro == 3){

			$return = Array();

			$sql = "SELECT * from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala";
			if($cd != ''){
				$sql .= " where id_atividade = $cd and st_tarefa = 1";
			}else{
				$sql .= " WHERE st_tarefa = 1";
			}
			$query = $mysqli->query($sql);
			
			if($query->num_rows > 0){

				while($row = $query->fetch_object()){
					$dt = explode('-',$row->dt_turma);
					$dt = $dt[0];
					$row->dt_turma = $dt;
					$return[] = $row->cd_turma." - ".$row->nm_sala." de ".$row->dt_turma;
				}

			}

			return $return;
		}else if($filtro == 4){

			$sql = "SELECT nm_tarefa, dt_tarefa, dt_prazo, hr_prazo, st_tarefa, cd_tarefa, dt_turma, cd_turma, nm_sala from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala";
			if($cd != ''){
				$sql .= " where id_atividade = $cd and st_tarefa = 1";
			}else{
				$sql .= " WHERE st_tarefa = 1";
			}
			if($_SESSION["tp_user"] != "Administrador"){
				$sql .= " and id_criador = ".$_SESSION["cd_login"];
			}
			$query = $mysqli->query($sql);
			
			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}else if($filtro == 5){

			$sql = "SELECT nm_atividade,id_atividade, DATE_FORMAT(dt_tarefa, '%d/%m/%Y') as dt_tarefa, DATE_FORMAT(dt_prazo, '%d/%m/%Y') as dt_prazo, hr_prazo, st_tarefa, cd_tarefa, DATE_FORMAT(dt_turma, '%d/%m/%Y') as dt_turma, cd_turma, nm_sala from tb_tarefa join tb_atividade on id_atividade = cd_atividade join tb_turma on id_turma = cd_turma JOIN tb_sala on id_sala = cd_sala";
			if($cd != ''){
				$sql .= " where id_turma = $cd and st_tarefa = 1";
			}else{
				$sql .= " WHERE st_tarefa = 1";
			}
			$query = $mysqli->query($sql);
			
			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
	}