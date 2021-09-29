<?php

include_once("db_connect.php");

	function exibir_salas($filtro,$cd=''){

		$mysqli = db_connect();

		if($filtro == 1){
            $sql = "SELECT * from tb_sala";
            if($cd != ''){
                $sql .= " where cd_sala = $cd and st_sala = 1";
            }else{
				$sql .= " where st_sala = 1";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}else if($filtro == 2){
            $sql = "SELECT * from tb_sala join tb_curso on id_curso = cd_curso";
            if($cd != ''){
                $sql .= " where cd_curso = $cd and st_sala = 1";
            }else{
				$sql .= " where st_sala = 1";
			}
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				return $query;

			}else{
				return null;
			}
		}
		
    }