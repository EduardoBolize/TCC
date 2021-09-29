<meta charset="utf-8">
<?php

    include_once("db_connect.php");

	function exibir_professores($filtro){

		$mysqli = db_connect();

		if($filtro == "site"){
			$sql = "SELECT * from tb_professor join tb_arquivo on id_arquivo = cd_arquivo where st_professor = 1";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
    }