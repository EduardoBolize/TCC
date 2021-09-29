<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_inscritos($filtro,$cd_f = ''){

		$mysqli = db_connect();

		if($filtro == 1){
			$sql = "SELECT * from tb_inscrito";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_inscrito == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_inscrito;
					$nome = $row->nm_inscrito;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_inscrito."</td>";
					echo "<td>".$row->nr_cpf."</td>";
					echo "<td>".$row->ds_cidade."</td>";
					echo "<td>".$row->nr_telefone1."</td>";
					echo "<td>".$row->tx_email."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_inscrito.php?cd=".$row->cd_inscrito."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'>Não existem inscritos cadastrados!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){
			$sql = "SELECT * from tb_inscrito join tb_inscrito_audicao where id_audicao = $cd_f";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return "erro";
			}
		}else if($filtro == 3){
			$sql = "SELECT * from tb_inscrito join tb_inscrito_audicao where cd_inscrito_audicao = $cd_f";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				$row = $query->fetch_object();
				return $row;

			}else{
				return "erro";
			}
		}else if($filtro == 4){
			$sql = "SELECT cd_inscrito_audicao,nm_inscrito,ds_endereco,ds_cidade,tx_email,nr_telefone1,DATE_FORMAT(dt_encontro,'%d/%m/%Y') as dt_encontro, hr_encontro from tb_inscrito join tb_inscrito_audicao where id_audicao = $cd_f and dt_encontro != '0000-00-00' and hr_encontro != '00:00' order by dt_encontro, hr_encontro";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return "erro";
			}
		}else if($filtro == 5){
			$sql = "SELECT cd_inscrito_audicao,nm_inscrito,ds_endereco,ds_cidade,tx_email,nr_telefone1,DATE_FORMAT(dt_encontro,'%d/%m/%Y') as dt_encontro, hr_encontro from tb_inscrito join tb_inscrito_audicao where id_audicao = $cd_f and dt_encontro = '0000-00-00' and hr_encontro = '00:00'";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return "erro";
			}
		}
		
	}