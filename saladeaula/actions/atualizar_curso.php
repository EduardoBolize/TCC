<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_curso']) and isset($_POST['ds_curso']) and isset($_POST['cd_curso'])){

		$nm_curso = $_POST['nm_curso'];
		$ds_curso = $_POST['ds_curso'];
		$cd_curso = $_POST['cd_curso'];

		//Verificar se o código do curso é válido
		$sql_curso = "SELECT * from tb_curso where cd_curso = $cd_curso";
		$query_curso = $mysqli->query($sql_curso);

		if($query_curso->num_rows > 0){
			$row_curso = $query_curso->fetch_object();

			$first_name = explode(" ",$row_curso->nm_curso);
			$first_name = $first_name[0].$row_curso->cd_curso;

			//Verifica a imagem do professor
			$uploaddir = '../../img/cursos/';
			$ext = explode(".",basename($_FILES['id_arquivo']['name']));	//Pega extenção
			$ext = $ext[1];
			$filename = $first_name.".".$ext;
			$uploadfile = $uploaddir . $filename;

			if (move_uploaded_file($_FILES['id_arquivo']['tmp_name'], $uploadfile)) {
				if($row_curso->id_arquivo == '2'){
					$sql_img = "INSERT into tb_arquivo values (null, '$filename',".$_SESSION['cd_login'].")";
					if($mysqli->query($sql_img)){
						$select_img = "SELECT * from tb_arquivo where url_arquivo = '$filename' and id_login = ".$_SESSION['cd_login'];
						$row_img = $mysqli->query($select_img)->fetch_object();
					}else{
						$row_img = '';
					}
				}else{
					//Seleciona a imagem atual do curso
					$sql_up = "UPDATE tb_arquivo set url_arquivo = '$filename', id_login = ".$_SESSION['cd_login']." where cd_arquivo = ".$row_curso->id_arquivo;
					$mysqli->query($sql_up);
					$row_img = '';
				}
			} else {
				$row_img = '';
			}

			$up_curso = "UPDATE tb_curso set nm_curso = '$nm_curso', ds_curso = '$ds_curso'";
			if(!empty($row_img)){
				$up_curso .= ", id_arquivo = ".$row_img->cd_arquivo;
			}
			$up_curso .= " where cd_curso = $cd_curso";
			echo $up_curso;

			if($mysqli->query($up_curso)){

				//redirect("Sua alteração foi enviada com sucesso!","");
				header('Location:../administrador/crud_curso.php');

			}else{
				redirect("Ocorreu um erro durante o envio!!","../administrador/crud_curso.php");
			}

		}else{
			redirect("O código do curso é inválido","../administrador/crud_curso.php");
		}

	}else{
		redirect("Preencha o Formulário!","../administrador/crud_curso.php");
	}
