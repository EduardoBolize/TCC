<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_cursos($filtro){

		$mysqli = db_connect();

		if($filtro == 1){
			$sql = "SELECT cd_curso, nm_curso, ds_curso, st_curso from tb_curso";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_curso == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_curso;
					$nome = $row->nm_curso;
					$desc = $row->ds_curso;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_curso."</td>";
					echo "<td>".$row->ds_curso."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_curso.php?cd=".$row->cd_curso."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem cursos cadastrados!</td>";
				echo "</tr>";
			}
		}
		
	}