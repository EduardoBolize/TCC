<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_salas($filtro){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT cd_sala, nm_sala, sg_sala, id_curso,st_sala,nm_curso from tb_sala join tb_curso on id_curso = cd_curso";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_sala == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_sala;
					$nome = $row->nm_sala;
					$sigla = $row->sg_sala;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_sala."</td>";
					echo "<td>".$row->sg_sala."</td>";
					echo "<td>".$row->nm_curso."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_sala.php?cd=".$row->cd_sala."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem salas cadastradas!</td>";
				echo "</tr>";
			}

		}
		
	}