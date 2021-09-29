<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_turma_matricula($filtro, $cd_turma = '', $cd_turma2 = ''){

		$mysqli = db_connect();

		if($filtro == 1){

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($row = $query->fetch_object()){
					echo "<tr>";
					echo "<td>".$row->nm_matricula."</td>";
					echo "<td>".$row->st_sala."</td>";
					echo "<td>".$row->dt_turma."</td>";
					echo "<td>".$row->tx_email."</td>";
					echo "<td>".$row->tx_login."</td>";
					echo "</tr>";
				}

			}else{
				echo "<tr>";
				echo "<td colspan='5'>Não existem registros no banco de dados!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){

			$mysqli = db_connect();

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where cd_turma = $cd_turma";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return "erro";
			}

		}else if($filtro == 3){	//Retorna um array

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where cd_turma = $cd_turma";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				$alunos = Array();

				while($row = $query->fetch_object()){
					$alunos[] = $row->cd_matricula." - ".$row->nm_matricula;
				}

				return $alunos;

			}else{
				return Array();
			}
			
		}else if($filtro == 4){	//Retorna os dados de um turma matricula por meio do login

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where id_login = $cd_turma";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
			
		}else if($filtro == 5){	//Retorna os dados de um turma matricula por meio do código da turma_matricula

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where cd_turma_matricula = $cd_turma";
			}
			
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				$row = $query->fetch_object();

				return $row;

			}else{
				return null;
			}
			
		}else if($filtro == 6){	//Retorna os dados de um turma matricula dentro de uma turma por meio do código de login e da turma

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where id_login = $cd_turma and id_turma = $cd_turma2";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				$row = $query->fetch_object();

				return $row;

			}else{
				return null;
			}
			
		}else if($filtro == 7){

			$sql = "SELECT * from tb_turma_matricula join tb_turma on id_turma = cd_turma join tb_matricula on id_matricula = cd_matricula join tb_sala on cd_sala = id_sala";
			if($cd_turma != ''){
				$sql .= " where id_turma = $cd_turma";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
			
		}
		
	}