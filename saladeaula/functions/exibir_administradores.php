<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_administradores($filtro,$tp=""){

		$mysqli = db_connect();

		//Páginas que efeutam a pesquisa de todos os admins
		if($filtro == 1){
			$sql = "SELECT * from tb_admin join tb_login on id_login = cd_login join tb_arquivo on id_arquivo = cd_arquivo";
			$msg = "Não existem administradores cadastrados!";
			if($tp != ""){
				$sql .= " where st_admin = $tp";
				if($tp == 0){
					$msg = "Não existem administradores inativados!";
				}else{
					$msg = "Não existem administradores ativos!";
				}
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				$c = 1;
				while($row = $query->fetch_object()){
					$cd = $row->cd_admin;
					$nome = $row->nm_admin;
					
					if($row->st_admin == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_admin;
					$nome = $row->nm_admin;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td><img style='width:100px; height:auto;' src='../../img/professores/$row->url_arquivo'></td>";
					echo "<td>".$row->nm_admin."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_administrador.php?cd=".$row->cd_admin."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					<?php
					echo "</tr>";
					$c++;
				}

			}else{
				echo "<tr>";
				echo "<td colspan='6'>$msg</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){
			$sql = "SELECT cd_admin, nm_admin from tb_admin";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
	}