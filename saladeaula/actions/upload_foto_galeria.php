<?php

include_once("../functions/util.php");

if(isset($_POST["cd_galeria"]) and !empty($_POST["cd_galeria"]) and isset($_POST["nm_midia"]) and !empty($_POST["nm_midia"])){
    $cd = $_POST["cd_galeria"];
    $nm_midia = $_POST["nm_midia"];
    
    //Verifica a imagem do professor
    $uploaddir = '../../galeria/images/src/';
    // $ext = explode(".",basename($_FILES['arquivo']['name']));	//Pega extenção
    // $ext = $ext[1];
    // $filename = $first_name.".".$ext;

    if(!is_array($_FILES["arquivo"]["name"])){
        $filename = $_FILES['arquivo']['name'];

        $uploadfile = $uploaddir . $filename;
        $banco_file = "/galeria/images/src/" . $filename;

        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploadfile)) {

            $sql_img = "INSERT into tb_arquivo values (null, '$banco_file',".$_SESSION['cd_login'].")";
            
            if($mysqli->query($sql_img)){

                $sql = "SELECT * from tb_arquivo where url_arquivo = '$banco_file'";
                $query = $mysqli->query($sql);
                $row = $query->fetch_object();

                $sql_m = "INSERT into tb_midia values (null, '$nm_midia',$row->cd_arquivo)";
                $mysqli->query($sql_m);

                echo $sql_m;

                $sql_a = "SELECT * from tb_midia join tb_arquivo on id_arquivo = cd_arquivo where url_arquivo = '$banco_file' and nm_midia = '$nm_midia'";
                $query_a = $mysqli->query($sql_a);
                $row_a = $query_a->fetch_object();

                $sql_i = "INSERT into tb_midia_galeria values (null,$cd,$row_a->cd_midia)";

                if($mysqli->query($sql_i)){
                    //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
                }else{
                    //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
                }
            }else{
                //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
            }
        } else {
            //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
        }
    }else{

        $imgs = count($_FILES["arquivo"]["name"]);

        for($i = 0; $i <= $imgs - 1; $i++){
            $filename = $_FILES['arquivo']['name'][$i];
            
            $filename = explode(".",$filename);
            $filename = $filename[0].".jpg";

            $uploadfile = $uploaddir . $filename;
            $banco_file = "/galeria/images/src/" . $filename;

            if (move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], $uploadfile)) {

                //Imagem comprimida
                $info = getimagesize($uploadfile);
            
                if ($info['mime'] == 'image/jpeg') {
                    $image = imagecreatefromjpeg($uploadfile);
                } elseif ($info['mime'] == 'image/png') {
                    $image = imagecreatefrompng($uploadfile);
                }
            
                imagejpeg($image, $uploadfile, 15);

                $sql_img = "INSERT into tb_arquivo values (null, '$banco_file',".$_SESSION['cd_login'].")";
                
                if($mysqli->query($sql_img)){

                    $sql = "SELECT * from tb_arquivo where url_arquivo = '$banco_file'";
                    $query = $mysqli->query($sql);
                    $row = $query->fetch_object();

                    $sql_m = "INSERT into tb_midia values (null, '$nm_midia',$row->cd_arquivo)";
                    $mysqli->query($sql_m);

                    echo $sql_m;

                    $sql_a = "SELECT * from tb_midia join tb_arquivo on id_arquivo = cd_arquivo where url_arquivo = '$banco_file' and nm_midia = '$nm_midia'";
                    $query_a = $mysqli->query($sql_a);
                    $row_a = $query_a->fetch_object();

                    $sql_i = "INSERT into tb_midia_galeria values (null,$cd,$row_a->cd_midia)";

                    if($mysqli->query($sql_i)){
                        //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
                    }else{
                        //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
                    }
                }else{
                    //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
                }
            } else {
                //header("Location: ../administrador/editar_galeria.php?cd=".$cd);
            }
        }
    }

    header("Location: ../administrador/editar_galeria.php?cd=".$cd);
}else{
    //header("Location: ../administrador/crud_galeria.php");
}
