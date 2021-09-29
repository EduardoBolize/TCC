<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_matricula_evento($filtro){

		$mysqli = db_connect();

		if($filtro == 1){   //Visão do administrador
			$sql = "SELECT * from tb_matricula_evento join tb_matricula on id_maticula = cd_matricula join tb_evento on id_evento = cd_evento";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_matricula_evento == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_matricula_evento;
                    $nome = $row->cd_matricula_evento;
                    
                    if($row->st_publico == 0){
						$row->st_publico = "Privado";
					}else{
						$row->st_publico = "Público";
                    }
                    
                    if($row->st_confirma == 0){
						$row->st_confirma = "Participará";
					}else{
						$row->st_confirma = "Não Participará";
					}

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_evento."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->dt_evento."</td>";
					echo "<td>".$row->st_publico."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_matricula_evento.php?cd=".$row->cd_matricula_evento."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='8'>Não existem participações cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){   //Visão do matriculado
			$sql = "SELECT * from tb_matricula_evento join tb_matricula as m on id_maticula = cd_matricula join tb_evento on id_evento = cd_evento where m.id_login = ".$_SESSION['cd_login'];
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					if($row->st_matricula_evento == 0){
						$status = "Inativo";
						$icon = "check";
						$action = "ativar";
					}else{
						$status = "Ativo";
						$icon = "delete";
						$action = "inativar";
					}

					$cd = $row->cd_matricula_evento;
                    $nome = $row->cd_matricula_evento;
                    
                    if($row->st_publico == 0){
						$row->st_publico = "Privado";
					}else{
						$row->st_publico = "Público";
                    }
                    
                    if($row->st_confirma == 0){
						$row->st_confirma = "Participará";
					}else{
						$row->st_confirma = "Não Participará";
					}

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->nm_evento."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->dt_evento."</td>";
					echo "<td>".$row->st_publico."</td>";
					echo "<td>$status</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_matricula_evento.php?cd=".$row->cd_matricula_evento."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='8'>Você não tem participações cadastradas!</td>";
				echo "</tr>";
			}
		}
		
	}