<?php

include_once("db_connect.php");

	function exibir_fotos($filtro,$cd=''){

		$mysqli = db_connect();

		if($filtro == 1){
            $sql = "SELECT * from  tb_midia_galeria join tb_midia on id_midia = cd_midia join tb_arquivo on id_arquivo = cd_arquivo";
            if($cd != ''){
                $sql .= " where id_galeria = $cd";
            }
            $sql .= " order by cd_midia_galeria desc";

			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
    }