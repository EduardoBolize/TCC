<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_professor_sala_materia($filtro,$cd = ""){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT * from tb_professor_sala_materia join tb_professor on id_professor = cd_professor join tb_sala_materia on id_sala_materia = cd_sala_materia join tb_sala on id_sala = cd_sala join tb_materia on id_materia = cd_materia";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_sala_materia == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_professor_sala_materia;
					$nome = $row->nm_professor_sala_materia;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->sg_sala."</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->nm_materia."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_encargo.php?cd=".$row->cd_professor_sala_materia."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existe encargos cadastrados!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){

			$sql = "SELECT DISTINCT * from tb_professor_sala_materia join tb_sala_materia on id_sala_materia = cd_sala_materia JOIN tb_sala on id_sala = cd_sala JOIN tb_materia on id_materia = cd_materia join tb_professor as p on id_professor = cd_professor join tb_arquivo on id_arquivo = cd_arquivo join tb_login on p.id_login = cd_login where id_sala = $cd group by cd_professor ";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				return $query;
			}else{
				return null;
			}
		}else if($filtro == 3){

			$sql = "SELECT DISTINCT * from tb_professor_sala_materia join tb_sala_materia as sm on id_sala_materia = cd_sala_materia JOIN tb_sala on sm.id_sala = cd_sala JOIN tb_materia on id_materia = cd_materia join tb_professor on id_professor = cd_professor join tb_turma as t on t.id_sala = cd_sala";
			if($_SESSION["tp_user"] != "Administrador"){
				$sql .= " where id_login = $cd";
			}
			$sql .= " group by cd_turma";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				return $query;
			}else{
				return null;
			}
		}
		
	}