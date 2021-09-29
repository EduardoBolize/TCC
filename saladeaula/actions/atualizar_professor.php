<meta charset="utf-8">
<?php

	include_once('../functions/util.php');

	if($_SESSION['tp_user'] == 'Professor'){
		$redirect = "perfil.php";
	}else if($_SESSION['tp_user'] == 'Administrador'){
		$redirect = "administrador/crud_professor.php";
	}

	if(isset($_POST['nm_professor']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone']) and isset($_POST['nr_telefone2']) and isset($_POST['nr_cpf']) and isset($_POST['tx_email']) and isset($_POST['cd_professor'])){

		$nm_professor = $_POST['nm_professor'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone = $_POST['nr_telefone'];
		$nr_telefone2 = $_POST['nr_telefone2'];
		$nr_cpf = $_POST['nr_cpf'];
		$tx_email = $_POST['tx_email'];
		$cd_professor = $_POST['cd_professor'];

		//Verificar se o código do professor é válido		
		$sql_professor = "SELECT * from tb_professor where cd_professor = $cd_professor";
		$query_professor = $mysqli->query($sql_professor);

		if($query_professor->num_rows > 0){
			
			$row_professor = $query_professor->fetch_object();
			$first_name = explode(" ",$row_professor->nm_professor);
			$first_name = $first_name[0];

			//Verifica a imagem do professor
			$uploaddir = '../../img/professores/';
			$ext = explode(".",basename($_FILES['id_arquivo']['name']));	//Pega extenção
			$ext = $ext[1];
			$filename = $first_name.".".$ext;
			$uploadfile = $uploaddir . $filename;

			if (move_uploaded_file($_FILES['id_arquivo']['tmp_name'], $uploadfile)) {
				if($row_professor->id_arquivo == '1'){
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
					$sql_up = "UPDATE tb_arquivo set url_arquivo = '$filename', id_login = ".$_SESSION['cd_login']." where cd_arquivo = ".$row_professor->id_arquivo;
					$mysqli->query($sql_up);
					$row_img = '';
				}
			} else {
				$row_img = '';
			}

			$up_professor = "UPDATE tb_professor set nm_professor = '$nm_professor', ds_endereco = '$ds_endereco', ds_cidade = '$ds_cidade', nr_telefone1 = '$nr_telefone', nr_telefone2 = '$nr_telefone2', nr_cpf = '$nr_cpf', tx_email = '$tx_email'";
			if(!empty($row_img)){
				$up_professor .= ", id_arquivo = ".$row_img->cd_arquivo;
			}
			$up_professor .= " where cd_professor = $cd_professor";

			//echo $up_professor;
			
			if($mysqli->query($up_professor)){

				//redirect("Sua alteração foi enviada com sucesso!","../$redirect");
				header("Location:../$redirect");

			}else{
				redirect("Ocorreu um erro durante o envio!!","../$redirect");
			}

		}else{
			redirect("O código do professor não é válido","../$redirect");
		}

	}else{
		redirect("Favor, preencha o formulário!!","../$redirect");
	}
