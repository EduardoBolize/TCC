<meta charset="utf-8">
<?php
				
	//include_once('util.php');

	function exibir_galeria($filtro,$cd=''){

		$mysqli = db_connect();

		if($filtro == 1){   //Lista de galerias para o administrador

			$sql ="SELECT * FROM tb_galeria join tb_admin on id_admin = cd_admin";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){

					if($row->st_galeria == 0){
						$status = "Inativo";
						$act = "ativar";
						$icon = 'check';
					}else{
						$status = "Ativo";
						$act = "inativar";
						$icon = 'delete';
					}
					
					$nm_galeria = $row->nm_galeria;
					$cd = $row->cd_galeria;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_galeria."</td>";
					echo "<td>".$row->ds_galeria."</td>";
					echo "<td>".$row->dt_galeria."</td>";
					echo "<td>".$row->nm_admin."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_galeria.php?cd=".$cd."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nm_galeria;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='8'> Erro ao carregar dados </td>";
				echo "</tr>";
			}
		}else if($filtro == 2){   //Lista de galerias para o administrador

			$sql ="SELECT cd_galeria,nm_galeria,ds_galeria,DATE_FORMAT(dt_galeria,'%d/%m/%Y') as dt_galeria FROM tb_galeria join tb_admin on id_admin = cd_admin";
			if($cd != ""){
				$sql .= " where cd_galeria = $cd";
			}
			$sql .= " order by dt_galeria desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				
				return $query;

			}else{
				return null;
			}
		}	
	}	