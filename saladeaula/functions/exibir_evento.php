<meta charset="utf-8">
<?php
				
	//include_once('util.php');

	function exibir_evento($filtro){

		$mysqli = db_connect();

		if($filtro == 1){

			$login = $_SESSION['tx_login'];

			$sql ="SELECT * FROM tb_evento join tb_admin on id_admin = cd_admin";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){
					$cd = $row->cd_evento;
					$nm_evento = $row->nm_evento;
					$dt_evento = $row->dt_evento;
					$ds_evento = $row->ds_evento;
					$nm_admin = $row->nm_admin;
					$st_publico = $row->st_publico;

					if($row->st_evento == 0){
						$status = "Inativo";
						$act = "ativar";
						$icon = 'check';
					}else{
						$status = "Ativo";
						$act = "inativar";
						$icon = 'delete';
                    }
                    
                    if($st_publico == 0){
						$st_publico = "Privado";
					}else{
						$st_publico = "Público";
					}

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$nm_evento."</td>";
					echo "<td>".$dt_evento."</td>";
					echo "<td>".$ds_evento."</td>";
					echo "<td>".$nm_admin."</td>";
					echo "<td>".$st_publico."</td>";
					echo "<td>".$status."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_evento.php?cd=".$cd."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nm_evento;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='9'> Não existem eventos cadastrados </td>";
				echo "</tr>";
			}
		}	
	}	