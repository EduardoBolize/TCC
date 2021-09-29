<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_questoes($filtro,$cd=""){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT * from tb_questao";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				echo "<table>";
					echo "<thead>";
						echo "<tr>";
							echo "<th>Enunciado</th>";
							echo "<th>Tipo</th>";
							echo "<th>Alternativas</th>";
							echo "<th>Resposta</th>";
							echo "<th>Pontos</th>";
						echo "</tr>";
					echo "</thead>";

				while($row = $query->fetch_object()){
					echo "<tr>";
					echo "<td>".$row->tx_enunciado."</td>";
					if($row->tp_questao == '0'){
						$tp_questao = "Dissertativa";
					}else if($row->tp_questao == '1'){
						$tp_questao = "Alternativa";
					}
					echo "<td>".$tp_questao."</td>";
					echo "<td>".$row->tx_alternativas."</td>";
					if($row->tx_resposta == ''){
						$row->tx_resposta = '-';
					}
					echo "<td>".$row->tx_resposta."</td>";
					echo "<td>".$row->vl_pontos."</td>";
					echo "</tr>";
				}
				
				echo "</table>";

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existem questões cadastradas!</td>";
				echo "</tr>";
			}
		}else if($filtro == 2){
			$sql = "SELECT * from tb_questao where id_atividade = $cd order by cd_questao asc";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				return $query;
			}else{
				return null;
			}
		}
		
	}