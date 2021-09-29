<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_respostas($filtro,$cd="",$quest=""){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT * from tb_resposta join tb_turma_matricula on id_turma_matricula = cd_turma_matricula join tb_matricula on id_matricula = cd_matricula join tb_questao on id_questao = cd_questao";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){

					$cd = $row->cd_resposta;
					$nome = $row->tx_resposta;
					$sigla = $row->dt_resposta;

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$row->tx_resposta."</td>";
					echo "<td>".$row->dt_resposta."</td>";
					echo "<td>".$row->cd_questao."</td>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_resposta.php?cd=".$row->cd_resposta."'><i class='material-icons tiny'>create</i></a></td>";
					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $nome;?>","<?php echo $cd;?>","<?php echo $action;?>")'><i class='material-icons tiny'>delete</i></a></td>
					</tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existem respostas cadastradas!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){

			$sql = "SELECT * from tb_resposta ";
			$sql .= "join tb_questao as q on id_questao = cd_questao ";
			$sql .= "join tb_atividade on q.id_atividade = cd_atividade ";
			$sql .= "join tb_turma_matricula as tm on id_turma_matricula = cd_turma_matricula ";
			$sql .= "join tb_turma on tm.id_turma = cd_turma ";
			$sql .= "join tb_tarefa as t on t.id_turma = cd_turma ";
			$sql .= "where cd_tarefa = $cd and cd_questao = $quest";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				return $query->fetch_object();
			}else{
				return null;
			}

		}else if($filtro == 3){	//Todos os que responderam

			$sql = "SELECT COUNT( cd_questao ) AS qt_questao, cd_turma_matricula, nm_matricula, cd_tarefa ";
			$sql .= "FROM tb_resposta ";
			$sql .= "JOIN tb_turma_matricula AS tm ON id_turma_matricula = cd_turma_matricula ";
			$sql .= "JOIN tb_matricula ON id_matricula = cd_matricula ";
			$sql .= "JOIN tb_questao AS q ON id_questao = cd_questao ";
			$sql .= "JOIN tb_atividade ON q.id_atividade = cd_atividade ";
			$sql .= "JOIN tb_tarefa AS ta ON ta.id_atividade = cd_atividade ";
			$sql .= "where cd_tarefa = $cd and tm.id_turma = $quest group by id_turma_matricula";
			
			// $sql .= "join tb_questao as q on id_questao = cd_questao ";
			// $sql .= "join tb_atividade on q.id_atividade = cd_atividade ";
			// $sql .= "join tb_tarefa as t on t.id_atividade = cd_atividade ";
			// $sql .= "join tb_turma_matricula on id_turma_matricula = cd_turma_matricula ";
			// $sql .= "join tb_matricula on id_matricula = cd_matricula ";
			// $sql .= "where cd_tarefa = $cd group by id_turma_matricula";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				return $query;
			}else{
				return null;
			}

		}
		
	}