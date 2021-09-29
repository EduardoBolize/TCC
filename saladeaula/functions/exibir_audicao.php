<meta charset="utf-8">
<?php
				
	//include_once('util.php');

	function exibir_audicao($filtro){
		
		$mysqli = db_connect();

		if($filtro == 1){

			$login = $_SESSION['tx_login'];

			$sql ="SELECT cd_audicao,nm_audicao,ds_audicao,nr_vagas,st_audicao,DATE_FORMAT(dt_abertura,'%d/%m/%Y') as dt_abertura,DATE_FORMAT(dt_fechamento,'%d/%m/%Y') as dt_fechamento FROM tb_audicao order by cd_audicao desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){
					$cd = $row->cd_audicao;
					$nm_audicao = $row->nm_audicao;
					$ds_audicao = $row->ds_audicao;
					$dt_abertura = $row->dt_abertura;
					$dt_fechamento = $row->dt_fechamento;
					$nr_vagas = $row->nr_vagas;

					if($row->st_audicao == 0){
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
					echo "<td>".$nm_audicao."</td>";
					echo "<td>".$ds_audicao."</td>";
					echo "<td>".$dt_abertura."</td>";
					echo "<td>".$dt_fechamento."</td>";
					echo "<td>".$nr_vagas."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_audicao.php?cd=".$cd."'><i class='material-icons tiny'>create</i></a></td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='horarios_audicao.php?cd=".$cd."'><i class='material-icons tiny'>access_time</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nm_audicao;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'>Não existe nenhuma audição cadastrada</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){		//Lista do inscrito

			$login = $_SESSION['tx_login'];

			$sql ="SELECT * FROM tb_audicao where st_audicao = 1 order by cd_audicao desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				
				return $query;

			}else{
				return null;
			}
		}else if($filtro == 3){		//Lista de audições já cadastrado

			$login = $_SESSION['tx_login'];

			$sql ="SELECT * FROM tb_audicao join tb_inscrito_audicao on id_audicao = cd_audicao join tb_inscrito on id_inscrito = cd_inscrito join tb_login on id_login = cd_login where cd_login = ".$_SESSION['cd_login']." order by cd_audicao desc";

			$query = $mysqli->query($sql);
			$array = Array();

			if($query->num_rows > 0){
				
				while($row = $query->fetch_object()){
					$array[] = $row->cd_audicao;
				}

			}

			return $array;
		}else if($filtro == 4){		//Lista de audições já cadastrado

			$login = $_SESSION['tx_login'];

			$sql ="SELECT cd_inscrito_audicao,nm_audicao,ds_audicao,nr_vagas,DATE_FORMAT(dt_encontro,'%d/%m/%Y') as dt_encontro,hr_encontro FROM tb_audicao join tb_inscrito_audicao on id_audicao = cd_audicao join tb_inscrito on id_inscrito = cd_inscrito join tb_login on id_login = cd_login where cd_login = ".$_SESSION['cd_login']." order by cd_audicao desc";

			$query = $mysqli->query($sql);
			$array = Array();

			if($query->num_rows > 0){
				
				return $query;

			}else{
				return "Erro ao exibir as audições";
			}
		}
	}	