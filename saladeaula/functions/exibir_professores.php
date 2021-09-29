<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_professores($filtro,$cd = ""){

		$mysqli = db_connect();

		if($filtro == 1){
			$sql = "SELECT cd_professor, nm_professor, tx_email, st_professor from tb_professor";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_professor == 0){
						$status = "Inativo";
						$act = "ativar";
						$icon = 'check';
					}else{
						$status = "Ativo";
						$act = "inativar";
						$icon = 'delete';
					}

					$cd = $row->cd_professor;
					$nome = $row->nm_professor;
					$email = $row->tx_email;
					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->tx_email."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_professor.php?cd=".$row->cd_professor."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					<td><a class='btn-floating btn waves-effect waves-light' href='editar_encargo.php?cd=<?php echo $row->cd_professor; ?>'><i class='material-icons tiny'>visibility</i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem pofessores cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){
			$sql = "SELECT cd_professor, nm_professor, tx_email, nr_telefone1 from tb_professor";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					$cd = $row->cd_professor;
					$nome = $row->nm_professor;
					$email = $row->tx_email;
					echo "<tr>";
					//echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_professor."</td>";
					echo "<td>".$row->tx_email."</td>";
					echo "<td>".$row->nr_telefone1."</td>";
					//echo "<td>".$status."</td>";
				}

			}else{
				echo "<tr>";
				echo "<td colspan='4'>Não existem pofessores cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 3){
			$sql = "SELECT * from tb_professor join tb_arquivo on id_arquivo = cd_arquivo";
			if($cd != ""){
				$sql .= " where cd_professor = $cd";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
	}