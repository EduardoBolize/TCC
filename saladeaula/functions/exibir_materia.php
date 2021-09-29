<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_materia($filtro, $cd = ""){

		$mysqli = db_connect();

		if($filtro == 1){
			$sql = "SELECT * from tb_materia";
			if($cd != ""){
				$sql .= " where cd_materia = $cd and st_materia = 1";
			}else{
				$sql .= " where st_materia = 1";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;
			}else{
				return null;
			}
		}else if($filtro == 2){
			echo "<ul class='collection with-header'>";
			echo "<li class='collection-header'><h5>Matérias</h5></li>";

			$sql = "SELECT * from tb_professor_sala_materia join tb_sala_materia on id_sala_materia = cd_sala_materia JOIN tb_sala on id_sala = cd_sala JOIN tb_materia on id_materia = cd_materia where id_professor = $cd";
			//echo $sql;

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){
					$cd_professor_sala_materia = $row->cd_professor_sala_materia;
					echo "<a href='../actions/excluir_professor_sala_materia.php?cd=$cd_professor_sala_materia&cd_professor=$cd' class='black-text'>";
					echo "<li class='collection-item'>";
					echo "$row->nm_sala ($row->sg_sala) - $row->nm_materia";
					echo "<i class='material-icons secondary-content red-text'>cancel</i>";
					echo "</li>";
					echo "</a>";
					
				}
			}else{
				echo "<li class='collection-item'><h6>Sem matérias ainda</h6></li>";
			}
			echo "</ul>";
		}else if($filtro == 3){

			$sql = "SELECT * from tb_professor_sala_materia join tb_sala_materia on id_sala_materia = cd_sala_materia join tb_materia on id_materia = cd_materia join tb_sala on id_sala = cd_sala where id_professor = $cd";
			
			$query = $mysqli->query($sql);
			$materias = Array();
			while($row = $query->fetch_object()){
				$materias[] = $row->id_sala_materia;
			}/*
			echo "<pre>";
			print_r($materias);
			echo "</pre>";*/
			?>

			<ul class='collection with-header'>
				<li class='collection-header'>
					<div class="input-field">
						<i class="material-icons prefix">search</i>
						<input type="text" name="search" id="search" required placeholder="Pesquise matérias para cadastrar">
					</div>
				</li>
			<?php

			$sql = "SELECT * from tb_sala_materia join tb_sala on id_sala = cd_sala join tb_materia on id_materia = cd_materia where st_materia = 1 order by nm_materia";

			$query = $mysqli->query($sql);

			$c = -1;
			if($query->num_rows > 0){
				$c = 0;
				while($row = $query->fetch_object()){
					if(!in_array($row->cd_sala_materia, $materias)){
						$materia = $row->cd_sala_materia;
						echo "<a href='../actions/cadastrar_professor_sala_materia.php?id_professor=$cd&id_sala_materia=$materia' class='black-text search_item'>";
						echo "<li class='collection-item'>";
						echo "$row->nm_sala ($row->sg_sala) - $row->nm_materia";
						echo "<i class='material-icons secondary-content green-text'>add</i>";
						echo "</li>";
						echo "</a>";

						$c++;
					}
				}
			}else{
				echo "<li class='collection-item'><h6>Sem matérias ainda!</h6></li>";
			}
			if($c == 0){
				echo "<li class='collection-item'><h6>Todas já foram cadastradas!</h6></li>";
			}
			echo "</ul>";
		}
		
	}
