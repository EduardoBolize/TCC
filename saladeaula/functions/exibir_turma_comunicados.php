<meta charset="utf-8">
<?php
	include_once('util.php');
	
	function exibir_turma_comunicados($filtro, $cd_comunicado = ''){

		$mysqli = db_connect();

		if($filtro == 1){
			$sql = "SELECT cd_turma_comunicado, tx_titulo, id_turma, nm_sala, DATE_FORMAT(dt_turma, ' de %Y') as ano from tb_sala join tb_turma on id_sala = cd_sala join tb_turma_comunicado on id_turma = cd_turma join tb_comunicado on id_comunicado = cd_comunicado";
			$query = $mysqli->query($sql);
			while($row = $query->fetch_object()){
				echo "<tr>";
				echo "<td></td>";
				echo "<td>$row->cd_turma_comunicado</td>";
				echo "<td>$row->tx_titulo</td>";
				echo "<td>$row->nm_sala $row->ano</td>";
			}
		}
		else if($filtro == 2){
			echo "<ul class='collection with-header'>";
			echo "<li class='collection-header'><h5>Turmas comunicadas</h5></li>";

			$sql = "SELECT id_turma, nm_sala, DATE_FORMAT(dt_turma, '%Y') as dt_turma from tb_sala join tb_turma on id_sala = cd_sala join tb_turma_comunicado on id_turma = cd_turma where id_comunicado = $cd_comunicado and st_turma = 1 order by dt_turma desc";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){
					$turma = $row->id_turma;
					echo "<a href='../actions/excluir_turma_comunicado.php?turma=$turma&comunicado=$cd_comunicado' class='black-text'>";
					echo "<li class='collection-item'>";
					echo "$row->nm_sala de $row->dt_turma";
					echo "<i class='material-icons secondary-content red-text'>cancel</i>";
					echo "</li>";
					echo "</a>";
				}
			}else{
				echo "<li class='collection-item'><h6>Sem Turmas Ainda!</h6></li>";
			}
			echo "</ul>";
		}
		else if($filtro == 3){
			$sql = "SELECT id_turma from tb_turma_comunicado where id_comunicado = $cd_comunicado";
			$query = $mysqli->query($sql);
			$turmas_comunicadas = [];
			while($row = $query->fetch_object()){
				$turmas_comunicadas[] = $row->id_turma;
			}
			
			echo "<ul class='collection with-header'>";
			echo "<li class='collection-header'><h5>Turmas para comunicar</h5></li>";

			$sql = "SELECT cd_turma, nm_sala, DATE_FORMAT(dt_turma, '%Y') as dt_turma from tb_sala join tb_turma on id_sala = cd_sala where st_turma = 1 order by dt_turma desc";
			$query = $mysqli->query($sql);

			$c = -1;
			if($query->num_rows > 0){
				$c = 0;
				while($row = $query->fetch_object()){
					if(!in_array($row->cd_turma,$turmas_comunicadas)){
						$turma = $row->cd_turma;
						echo "<a href='../actions/cadastrar_turma_comunicado.php?turma=$turma&comunicado=$cd_comunicado' class='black-text'>";
						echo "<li class='collection-item'>";
						echo "$row->nm_sala de $row->dt_turma";
						echo "<i class='material-icons secondary-content green-text'>add</i>";
						echo "</li>";
						echo "</a>";

						$c++;
					}
				}
			}else{
				echo "<li class='collection-item'><h6>Sem turmas ainda!</h6></li>";
			}
			if($c == 0){
				echo "<li class='collection-item'><h6>Todas já foram comunicadas!</h6></li>";
			}
			echo "</ul>" ;
		}
	}