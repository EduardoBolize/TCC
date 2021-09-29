<?php
    include_once('../../saladeaula/functions/util.php');
    
    //Verifica se o código da audição foi enviado
    if(isset($_GET['cd']) and !empty($_GET['cd'])){

        $cd_audicao = $_GET['cd'];

        //Verifica se o código da audição é válido
        $sql_audicao = "SELECT * from tb_audicao where cd_audicao = $cd_audicao";
        $query_audicao = $mysqli->query($sql_audicao);

        if($query_audicao->num_rows > 0){
            //Código válido
            $row_audicao = $query_audicao->fetch_object();

            //Verifica o código do inscrito
            $sql_inscrito = "SELECT * from tb_inscrito where id_login = ".$_SESSION['cd_login'];
            $query_inscrito = $mysqli->query($sql_inscrito);

            if($query_inscrito->num_rows > 0){
                $row_inscrito = $query_inscrito->fetch_object();

                $sql = "INSERT into tb_inscrito_audicao values (null,$row_inscrito->cd_inscrito,$cd_audicao, '0000-00-00', '00:00',1)";
                
                if($mysqli->query($sql)){
                    header("Location: ../crud_inscricoes.php");
                }else{
                    redirect("Ocorreu um problema ao realizar sua inscrição!","../crud_audicao.php");
                    //echo $sql;
                }

            }else{
                redirect("Selecione uma audição válida!","../crud_audicao.php");
            }

        }else{
            //Código inválido
            redirect("Selecione uma audição válida!","../crud_audicao.php");
        }

    }else{
        redirect("Selecione uma audição para acessar essa página!","../crud_audicao.php");
    }