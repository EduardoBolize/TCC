<?php

    include_once('util.php');
    
    // echo "{";
    // echo "title: titulo,";
    // echo "start: y-m-d,";
    // echo "end: y-m-d";
    // echo "},";

	function exibir_cronograma($filtro){

        if($filtro == 1){
            $mysqli = db_connect();

            $sql = "SELECT nm_audicao as nm_evento,	dt_abertura as dt_start, dt_fechamento as dt_end from tb_audicao where st_audicao = 1 UNION ";
            $sql .= "SELECT nm_evento, dt_evento as dt_start, '0000-00-00' as dt_end from tb_evento where st_evento = 1 UNION ";
            $sql .= "SELECT nm_atividade as nm_evento, dt_tarefa as dt_start, dt_prazo as dt_end from tb_atividade join tb_tarefa on id_atividade = cd_atividade where st_tarefa = 1 UNION ";
            $sql .= "SELECT tx_titulo as nm_evento, dt_assunto as dt_start, '0000-00-00' as dt_end from tb_comunicado where st_comunicado = 1 and dt_assunto != '0000-00-000'";
            $query = $mysqli->query($sql);

            //echo $sql;
            
            if($query->num_rows > 0){

                $i = 0;
                while($row = $query->fetch_object()){
                    
                    if($i == 0){
                        $i++;
                        echo "{";
                            echo "title: '$row->nm_evento',";
                            echo "start: '$row->dt_start',";
                            if($row->dt_end == '0000-00-00'){
                                echo "start: '$row->dt_start',";
                            }else{
                                echo "end: '$row->dt_end'";
                            }
                        echo "}";
                    }else{
                        echo ",{";
                            echo "title: '$row->nm_evento',";
                            echo "start: '$row->dt_start',";
                            if($row->dt_end == '0000-00-00'){
                                echo "start: '$row->dt_start',";
                            }else{
                                echo "end: '$row->dt_end'";
                            }
                        echo "}";
                    }
                    
                }

            }else{
                
            }
        
        }
		
    }
    