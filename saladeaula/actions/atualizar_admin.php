<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if(isset($_POST['nm_admin']) and isset($_POST['cd_admin'])){

		$nm_admin = $_POST['nm_admin'];
		$cd_admin = $_POST['cd_admin'];

		if(isset($_POST["origem"])){
			$origem = $_POST['origem'];
			if($origem === "perfil"){
				$destino = "perfil.php";
			}else if($origem === "crud"){
				$destino = "administrador/crud_admin.php";
			}
		}else{
			$destino = "administrador/crud_admin.php";
		}

		//Verificar se o código do administrador é válido
		$sql_admin = "SELECT * from tb_admin join tb_login on id_login = cd_login where cd_admin = $cd_admin";
		$query_admin = $mysqli->query($sql_admin);

		if($query_admin->num_rows > 0){
			
			$row_admin = $query_admin->fetch_object();

			$first_name = $row_admin->tx_login;

			//Verifica a imagem do administrador
			$uploaddir = '../../img/professores/';
			$ext = explode(".",basename($_FILES['id_arquivo']['name']));	//Pega extenção
			$ext = $ext[1];
			$filename = $first_name.".".$ext;
			$uploadfile = $uploaddir . $filename;

			if (move_uploaded_file($_FILES['id_arquivo']['tmp_name'], $uploadfile)) {
				if($row_admin->id_arquivo == '1'){
					$sql_img = "INSERT into tb_arquivo values (null, '$filename',".$_SESSION['cd_login'].")";
					echo $sql_img;
					if($mysqli->query($sql_img)){
						$select_img = "SELECT * from tb_arquivo where url_arquivo = '$filename' and id_login = ".$_SESSION['cd_login'];
						$row_img = $mysqli->query($select_img)->fetch_object();
					}else{
						$row_img = '';
					}
				}else{
					//Seleciona a imagem atual do professor
					$sql_up = "UPDATE tb_arquivo set url_arquivo = '$filename', id_login = ".$_SESSION['cd_login']." where cd_arquivo = ".$row_admin->id_arquivo;
					$mysqli->query($sql_up);
					$row_img = '';
				}
			} else {
				$row_img = '';
			}

			$up_admin = "UPDATE tb_admin set nm_admin = '$nm_admin'";
			if(!empty($row_img)){
				$up_admin .= ", id_arquivo = ".$row_img->cd_arquivo;
			}
			$up_admin .= " where cd_admin = $cd_admin";

			if($mysqli->query($up_admin)){
				//altera o status de primeiro acesso
				alterar_vez("../administrador/first_time.txt");
				//redirect("Sua alteração foi enviada com sucesso!","../perfil.php");
				header('Location: ../'.$destino);

			}else{
				redirect("Ocorreu um erro durante o envio!!","../".$destino);
			}
		}else{
			redirect("O código do administrador não é válido!","../".$destino);
		}

	}else{
		//redirect("Por favor, preencha o formulário!","../".$destino);
	}
