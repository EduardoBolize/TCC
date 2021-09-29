<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_curso']) and isset($_POST['ds_curso'])){

		$nm_curso = $_POST['nm_curso'];
		$ds_curso = $_POST['ds_curso'];

		$first_name = $nm_curso;

		//Verifica a imagem do curso
		$uploaddir = '../../img/cursos/';
		$ext = explode(".",basename($_FILES['id_arquivo']['name']));	//Pega extenção
		$ext = $ext[1];
		$filename = $first_name.".".$ext;
		$uploadfile = $uploaddir . $filename;

		if (move_uploaded_file($_FILES['id_arquivo']['tmp_name'], $uploadfile)) {
			$sql_img = "INSERT into tb_arquivo values (null, '$filename',".$_SESSION['cd_login'].")";
			echo $sql_img;
			if($mysqli->query($sql_img)){
				$select_img = "SELECT * from tb_arquivo where url_arquivo = '$filename' and id_login = ".$_SESSION['cd_login'];
				$row_img = $mysqli->query($select_img)->fetch_object();
			}else{
				$row_img = '';
			}
		} else {
			$row_img = '';
		}

		//Cadastra o curso
		$sql = "INSERT into tb_curso values (null,'$nm_curso','$ds_curso','$row_img->cd_arquivo',1)";
		//echo $sql;

		if($mysqli->query($sql)){

			//redirect("Seu curso foi cadastrado com sucesso!","");
			header('Location:../administrador/crud_curso.php');

		}else{

			redirect("Ocorreu um erro ao cadastrar um novo curso!","../administrador/crud_curso.php");

		}

	}else{
		redirect("Por favor, preencha o formulário!","../administrador/cadastro_curso.php");
	}
