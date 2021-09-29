<meta charset="utf-8">
<?php
	include_once('util.php');
	
	function exibir_matricula_comunicados($filtro, $cd = ''){

		$mysqli = db_connect();

		//exibir todos matricula_comunicado
		if($filtro == 1){
			$sql = "SELECT cd_matricula_comunicado, tx_titulo, nm_matricula from tb_comunicado join tb_matricula_comunicado on id_comunicado = cd_comunicado join tb_matricula on id_matricula = cd_matricula";
			$query = $mysqli->query($sql);
			while($row = $query->fetch_object()){
				echo "<tr>";
				echo "<td></td>";
				echo "<td>$row->cd_matricula_comunicado</td>";
				echo "<td>$row->tx_titulo</td>";
				echo "<td>$row->nm_matricula</td>";
				echo "<td><a class='btn-floating btn waves-effect waves-light' href='editar_matricula_comunicado.php?cd=".$row->cd_matricula_comunicado."'><i class='material-icons tiny'>create</i></a></td>";
			}
		}
		//exibir os alunos com um determinado comunicado
		else if($filtro == 2){
			echo "<ul class='collection with-header'>";
			echo "<li class='collection-header'><h5>Alunos comunicados</h5></li>";

			$sql = "SELECT nm_matricula, cd_matricula from tb_matricula join tb_matricula_comunicado on cd_matricula = id_matricula where id_comunicado = $cd";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){
				while($row = $query->fetch_object()){
					$aluno = $row->cd_matricula;
					echo "<a href='../actions/excluir_matricula_comunicado.php?aluno=$aluno&comunicado=$cd' class='black-text'>";
					echo "<li class='collection-item'>";
					echo "$row->nm_matricula";
					echo "<i class='material-icons secondary-content red-text'>cancel</i>";
					echo "</li>";
					echo "</a>";
					
				}
			}else{
				echo "<li class='collection-item'><h6>Sem alunos ainda</h6></li>";
			}
			echo "</ul>";
		}
		//exibe alunos que ainda não tem determinado comunicados
		else if($filtro == 3){

			$sql = "SELECT id_matricula from tb_matricula_comunicado where id_comunicado = $cd";
			// echo $sql;
			$query = $mysqli->query($sql);
			$alunos_comunicados = [];
			while($row = $query->fetch_object()){
				$alunos_comunicados[] = $row->id_matricula;
			}
			?>

			<ul class='collection with-header'>
				<li class='collection-header'>
					<div class="input-field">
						<i class="material-icons prefix">search</i>
						<input type="text" name="search" id="search" required placeholder="Pesquise alunos para comunicar">
					</div>
				</li>
			<?php

			$sql = "SELECT nm_matricula, cd_matricula from tb_matricula where st_matricula = 1 order by nm_matricula";

			$query = $mysqli->query($sql);

			$c = -1;
			if($query->num_rows > 0){
				$c = 0;
				while($row = $query->fetch_object()){
					if(!in_array($row->cd_matricula, $alunos_comunicados)){
						$aluno = $row->cd_matricula;
						echo "<a href='../actions/cadastrar_matricula_comunicado.php?aluno=$aluno&comunicado=$cd' class='black-text search_item'>";
						echo "<li class='collection-item'>";
						echo "$row->nm_matricula";
						echo "<i class='material-icons secondary-content green-text'>add</i>";
						echo "</li>";
						echo "</a>";

						$c++;
					}
				}
			}else{
				echo "<li class='collection-item'><h6>Sem alunos ainda!</h6></li>";
			}
			if($c == 0){
				echo "<li class='collection-item'><h6>Todos já foram comunicados!</h6></li>";
			}
			echo "</ul>";
		}
		//exibe os comunicados de um determinado aluno
		else if($filtro == 4){
			if($_SESSION['tp_user'] == "Aluno"){
				$sql_aluno = "SELECT cd_matricula from tb_matricula where id_login = $cd";
				$query_aluno = $mysqli->query($sql_aluno);
				$row = $query_aluno->fetch_object();
				$cd_aluno = $row->cd_matricula;

				$sql = "SELECT cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, nm_admin as nm_autor from tb_admin as a join tb_comunicado as c on c.id_login = a.id_login join tb_matricula_comunicado on id_comunicado = cd_comunicado where id_matricula = $cd_aluno and st_comunicado = 1 UNION ";
				$sql .= "SELECT cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, nm_professor as nm_autor from tb_professor as p join tb_comunicado as c on c.id_login = p.id_login join tb_matricula_comunicado on id_comunicado = cd_comunicado where id_matricula = $cd_aluno and st_comunicado = 1";

				if($query = $mysqli->query($sql)){
					if($query->num_rows > 0){
						return $query;
					}else{
						return "sem_comunicados";
					}
				}else{
					return "erro";
				}
			}else{
				return "nao_aluno";
			}
		}
	}