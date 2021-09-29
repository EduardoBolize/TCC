<?php

include_once("db_connect.php");

	function exibir_galerias($filtro,$cd=''){

		$mysqli = db_connect();

		if($filtro == 1){
            $sql = "SELECT * from tb_galeria join tb_midia_galeria on id_galeria = cd_galeria join tb_midia on id_midia = cd_midia join tb_arquivo on id_arquivo = cd_arquivo";
            if($cd != ''){
                $sql .= " where cd_galeria = $cd and st_galeria = 1";
            }else{
				$sql .= " where st_galeria = 1";
            }
            $sql .= " group by id_galeria order by dt_galeria, cd_galeria desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
    }