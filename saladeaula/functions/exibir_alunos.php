<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_alunos($filtro){

		$mysqli = db_connect();

		//Lista com todos os alunos
		if($filtro == 1){

			$sql = "SELECT cd_matricula, nm_matricula, tx_email, st_matricula from tb_matricula";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){
					$cd = $row->cd_matricula;
					$nome = $row->nm_matricula;
					$email = $row->tx_email;

					if($row->st_matricula == 0){
						$status = "Inativo";
						$act = "ativar";
						$icon = 'check';
					}else{
						$status = "Ativo";
						$act = "inativar";
						$icon = 'delete';
					}

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$nome."</td>";
					echo "<td>".$email."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_aluno.php?cd=".$cd."'><i class='material-icons tiny'>create</i></a></td>";

					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem matriculas cadastradas!</td>";
				echo "</tr>";
			}
			
		}else if($filtro == 2){

			$sql = "SELECT cd_matricula, nm_matricula, tx_email, st_matricula from tb_matricula where st_matricula = 1";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
			
		}
		
	}