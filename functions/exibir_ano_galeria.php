<?php

include_once("db_connect.php");

	function exibir_ano_galeria($filtro,$cd=''){

        $mysqli = db_connect();
        $anos = Array();    //Array que guarda os anos

		if($filtro == 1){
            $sql = "SELECT dt_galeria from tb_galeria";
			$query = $mysqli->query($sql);

			if($query->num_rows > 0){

				while($galeria = $query->fetch_object()){
                    $dt = explode('-',$galeria->dt_galeria);
                    $galeria->dt_galeria = $dt[0];
                    
                    if(!in_array($galeria->dt_galeria,$anos)){
                        $anos[] = $galeria->dt_galeria;
                    }
                }

			}
        }
        
        return $anos;
		
    }