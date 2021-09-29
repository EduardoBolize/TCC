<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_turmas($filtro,$cd=""){
		
		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT cd_turma, DATE_FORMAT(dt_turma, '%d/%m/%Y') as dt_turma, id_sala, st_turma,nm_sala from tb_turma join tb_sala on id_sala = cd_sala order by dt_turma desc";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_turma == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_turma;
					$data = $row->dt_turma;
					$nome = $row->nm_sala;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_sala."</td>";
					echo "<td>".$row->dt_turma."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_turma.php?cd=".$row->cd_turma."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem turmas cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){	//Todas as turmas ativas

			$sql_prof = "SELECT cd_professor from tb_professor WHERE id_login = ".$_SESSION['cd_login'];
			$query = $mysqli->query($sql_prof);
			$row = $query->fetch_object();
			$cd_prof = $row->cd_professor;

			$sql = "SELECT cd_turma, dt_turma, id_sala, st_turma,nm_sala, id_professor from tb_turma join tb_sala on id_sala = cd_sala join tb_professor_sala_materia on id_professor = '$cd_prof' WHERE st_turma = 1";

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					
					$cd = $row->cd_turma;
					$data = $row->dt_turma;
					$nome = $row->nm_sala;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_sala."</td>";
					echo "<td>".$row->dt_turma."</td>";
					echo "</tr>";

				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem turmas cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 3){	//Todas as turmas ativas

			$sql = "SELECT cd_turma, dt_turma, id_sala, st_turma,nm_sala from tb_turma join tb_sala on id_sala = cd_sala WHERE st_turma = 1";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}else if($filtro == 4){	//Todas as turmas ativas

			$sql = "SELECT * from tb_turma join tb_sala on id_sala = cd_sala";
			if($cd != ""){
				$sql .= " where cd_turma = $cd and st_turma = 1";
			}else{
				$sql .= " WHERE st_turma = 1";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}else if($filtro == 5){	//Todas as turmas

			$sql = "SELECT * from tb_turma join tb_sala on id_sala = cd_sala";
			if($cd != ""){
				$sql .= " where cd_turma = $cd";
			}
			$sql .= " order by dt_turma desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
	}
