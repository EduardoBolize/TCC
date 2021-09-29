<?php

include_once("db_connect.php");

	function exibir_cursos($filtro,$cd=''){

		$mysqli = db_connect();

		if($filtro == "site"){
            $sql = "SELECT * from tb_curso join tb_arquivo on id_arquivo = cd_arquivo";
            if($cd != ''){
                $sql .= " where cd_curso = $cd and st_curso = 1";
            }else{
				$sql .= " where st_curso = 1";
			}
			$sql .= " order by cd_curso";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
    }