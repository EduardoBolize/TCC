<meta charset="utf-8">
<?php
				
	//include_once('util.php');

	function exibir_fotos($filtro,$cd=''){

		$mysqli = db_connect();

        if($filtro == 1){   //Lista de fotos do banco, excluindo as da galeria

            $sql_v = "SELECT * from tb_midia_galeria where id_galeria = $cd order by cd_midia_galeria";
            $query_v = $mysqli->query($sql_v);
            $fotos_da_galeria = Array();

            while($row = $query_v->fetch_object()){
                $fotos_da_galeria[] = $row->id_midia;
            }
            
            //Fotos do banco
            $fotos_final = Array();
            $c = 0;
            $sql = 'SELECT * from tb_midia join tb_arquivo on id_arquivo = cd_arquivo where url_arquivo like "/galeria/images/src/%" and (url_arquivo like "%.jpg" or url_arquivo like "%.png" or url_arquivo like "%.jpeg") order by cd_arquivo';
            //echo $sql;

            $query = $mysqli->query($sql);

            while($row_f = $query->fetch_object()){

                if(!in_array($row_f->cd_midia,$fotos_da_galeria)){
                    $fotos_final[] = Array();
                    $fotos_final[$c]["cd_midia"] = $row_f->cd_midia;
                    $fotos_final[$c]["nm_midia"] = $row_f->nm_midia;
                    $fotos_final[$c]["id_arquivo"] = $row_f->id_arquivo;
                    $fotos_final[$c]["url_arquivo"] = $row_f->url_arquivo;
                    
                    $c++;
                }
            }

            return $fotos_final;
            
		}else if($filtro == 2){   //Fotos da galeria

            $sql_v = "SELECT * from tb_midia_galeria join tb_midia on id_midia = cd_midia join tb_arquivo on id_arquivo = cd_arquivo where id_galeria = $cd order by cd_midia_galeria";
            $query_v = $mysqli->query($sql_v);
            
            if($query_v->num_rows > 0){
                return $query_v;
            }else{
                return null;
            }
            
		}	
	}	