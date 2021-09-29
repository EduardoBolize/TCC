<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_comunicados($filtro){

		$mysqli = db_connect();
		$cd_login = $_SESSION['cd_login'];

		if($filtro == 1){

			$sql = "SELECT cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, st_comunicado, nm_admin as nm_autor from tb_comunicado as c join tb_admin as a on c.id_login = a.id_login where c.id_login = $cd_login UNION ";
			$sql .= "SELECT cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, st_comunicado, nm_professor as nm_autor from tb_comunicado as c join tb_professor as p on c.id_login = p.id_login where c.id_login = $cd_login";
			
			$query = $mysqli->query($sql);
			if($query->num_rows > 0){

				while($row = $query->fetch_object()){
					$cd = $row->cd_comunicado;
					$titulo = $row->tx_titulo;
					$descricao = $row->ds_descricao;
					$data_criacao = $row->dt_criacao;
					$data_assunto = $row->dt_assunto;
					$data_assunto = ($data_assunto == "00/00/0000")? "":$data_assunto;
					$autor = $row->nm_autor;

					if($row->st_comunicado == 0){
						$status = "Inativo";
						$act = "ativar";
						$icon = 'check';
					}else{
						$status = "Ativo";
						$act = "inativar";
						$icon = 'delete';
					}

					echo "<tr>";
					echo "<td>&nbsp;</td>";
					echo "<td>".$titulo."</td>";
					echo "<td>".$descricao."</td>";
					echo "<td>".$data_assunto."</td>";
					echo "<td>".$data_criacao."</td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='/saladeaula/professor/mandar_turma_comunicado.php?cd=".$cd."'><i class='material-icons tiny'>group_add</i></a></td>";
					echo "<td><a class='btn-floating btn waves-effect waves-light' href='/saladeaula/professor/mandar_matricula_comunicado.php?cd=".$cd."'><i class='material-icons tiny'>person_add</i></a></td>";

					?>
					<td><a class='btn-floating btn waves-effect waves-light modal-trigger' href='#modal1' onclick='muda_modal("<?php echo $titulo;?>","<?php echo $cd;?>","<?php echo $act; ?>")'><i class='material-icons tiny'><?php echo $icon; ?></i></a></td></tr>
					<?php
				}

			}else{
				echo "<tr>";
				echo "<td colspan='8'>Não existem comunicados cadastrados!</td>";
				echo "</tr>";
			}

		}else if($filtro == 2){	//Comunicados para um aluno

			$sql = "SELECT 'Administrador' as tp_user, url_arquivo,cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, st_comunicado, nm_admin as nm_autor from tb_comunicado as c join tb_admin as a on c.id_login = a.id_login join tb_arquivo on a.id_arquivo = cd_arquivo join tb_matricula_comunicado on id_comunicado = cd_comunicado join tb_matricula as m on id_matricula = cd_matricula where m.id_login = $cd_login UNION ";
			$sql .= "SELECT 'Professor' as tp_user, url_arquivo,cd_comunicado, tx_titulo, ds_descricao, DATE_FORMAT(dt_criacao, '%d/%m/%Y') as dt_criacao, DATE_FORMAT(dt_assunto, '%d/%m/%Y') as dt_assunto, st_comunicado, nm_professor as nm_autor from tb_comunicado as c join tb_professor as p on c.id_login = p.id_login join tb_arquivo on p.id_arquivo = cd_arquivo join tb_matricula_comunicado on id_comunicado = cd_comunicado join tb_matricula as m on id_matricula = cd_matricula where m.id_login = $cd_login ";

			$query = $mysqli->query($sql);
			if($query->num_rows > 0){

				return $query;

				// while($row = $query->fetch_object()){
				// 	$cd = $row->cd_comunicado;
				// 	$titulo = $row->tx_titulo;
				// 	$descricao = $row->ds_descricao;
				// 	$data_criacao = $row->dt_criacao;
				// 	$data_assunto = $row->dt_assunto;
				// 	$data_assunto = ($data_assunto == "00/00/0000")? "":$data_assunto;
				// 	$autor = $row->nm_autor;

				// 	if($row->st_comunicado == 0){
				// 		$status = "Inativo";
				// 		$act = "ativar";
				// 		$icon = 'check';
				// 	}else{
				// 		$status = "Ativo";
				// 		$act = "inativar";
				// 		$icon = 'delete';
				// 	}

				// 	echo "<tr>";
				// 	echo "<td>&nbsp;</td>";
				// 	echo "<td>".$titulo."</td>";
				// 	echo "<td>".$descricao."</td>";
				// 	echo "<td>".$data_assunto."</td>";
				// 	echo "<td>".$data_criacao."</td>";
				// }

			}else{
				return null;
			}

		}
		
	}