<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_sala_materia($filtro, $cd = ""){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT * from tb_sala_materia join tb_sala on id_sala = cd_sala join tb_materia on id_materia = cd_materia";
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

					$cd = $row->cd_sala_materia;
					$nome = $row->nm_sala_materia;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->cd_sala_materia."</td>";
					echo "<td>".$row->nm_materia."</td>";
					echo "<td>".$row->sg_sala."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_sala_materia.php?cd=".$row->cd_sala_materia."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existe sala_materia cadastrada!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){	//Pega as matérias de uma determinada sala

			$sql = "SELECT * from tb_sala_materia join tb_sala on id_sala = cd_sala join tb_materia on id_materia = cd_materia";
			if($cd != ""){
				$sql .= " where id_sala = $cd";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				
				return $query;

			}else{
				return null;
			}

		}else if($filtro == 3){	//Pega as matérias de uma determinada sala

			$sql = "SELECT * from tb_sala_materia join tb_sala on id_sala = cd_sala join tb_materia on id_materia = cd_materia";
			if($cd != ""){
				$sql .= " where id_sala = $cd";
			}
			$query = $mysqli->query($sql);

			$retorno = Array();

			if($query->num_rows > 0){
				$c = 0;
				while($row = $query->fetch_object()){

					$retorno[] = $row->id_materia." - ".$row->nm_materia;
					
				}

			}
			
			return $retorno;

		}
		
	}