<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_noticias($filtro){

		$mysqli = db_connect();

		if($filtro == 1){   //Mostra para o admin
			$sql = "SELECT *, DATE_FORMAT(dt_noticia, '%d/%m/%Y') as dt_noticia from tb_noticia as n join tb_login as l on n.id_login = l.cd_login join tb_admin as a on a.id_login = l.cd_login";
            $query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_noticia == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_noticia;
					$nome = $row->tx_titulo;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->tx_titulo."</td>";
					echo "<td>".$row->ds_noticia."</td>";
					echo "<td>".$row->dt_noticia."</td>";
					echo "<td>".$row->nm_admin."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_noticia.php?cd=".$row->cd_noticia."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='6'>Não existem noticias cadastradas!</td>";
				echo "</tr>";
			}
		}
		
	}