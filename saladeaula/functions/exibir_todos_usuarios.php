<meta charset="utf-8">
<?php

	include_once('util.php');

	function exibir_todos_usuarios(){

		$mysqli = db_connect();

		$sql_l = "SELECT * from tb_login";
		$query_l = $mysqli->query($sql_l);

		if($query_l->num_rows > 0){

			while($row_l = $query_l->fetch_object()){

				$sql_u = "SELECT nm_matricula as nm_user,tx_email,'Aluno' as tp_user from tb_matricula where id_login = $row_l->cd_login UNION SELECT nm_professor as nm_user,tx_email,'Professor' as tp_user from tb_professor where id_login = $row_l->cd_login UNION SELECT nm_admin as nm_user,'-' as tx_email,'Administrador' as tp_user from tb_admin where id_login = $row_l->cd_login";
				$query_u = $mysqli->query($sql_u);

				if($query_u->num_rows > 0){

					$row_u = $query_u->fetch_object();

					echo "<tr>";
					echo "<td>$row_u->nm_user</td>";
					echo "<td>$row_u->tx_email</td>";
					echo "<td>$row_u->tp_user</td>";
					echo "</tr>";
				}else{

				}

			}

		}else{
			echo "<tr>";
			echo "<td colspan='4'>Não existem registros de usuário</td>";
			echo "</tr>";
		}
		
	}