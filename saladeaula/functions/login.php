<meta charset="utf-8">
<?php

	include_once('encriptar.php');

	//Função de login
	function login($login, $pass){
		
		$mysqli = new mysqli('localhost','root','usbw','db_andorinha');

		$pass_e = encriptar_senha($pass);  //Encripita a senha

		//Consulta os dados inseridos pelo usuário
		$sql = "SELECT * from tb_login where tx_login = '$login' and tx_pass = '$pass_e'";
		// $query = $pdo->prepare($sql);
		// $query->execute();
		$query = $mysqli->query($sql);

		if($query->num_rows > 0){ //Caso retorne uma valor
			//-$row = $query->fetch(PDO::FETCH_ASSOC);
			$row = $query->fetch_object();

			//Descobrindo quem é o usuário
			$sql = "SELECT * from tb_admin as a join tb_arquivo on id_arquivo = cd_arquivo where a.id_login = $row->cd_login";
			$query = $mysqli->query($sql);

			session_start();

			$_SESSION["img_login"] = "/img/professores/user.png";

			if($query->num_rows > 0){
				$row_user = $query->fetch_object();
				$_SESSION['nome'] = $row_user->nm_admin;
				$_SESSION['tp_user'] = 'Administrador';
				$_SESSION["img_login"] = "/img/professores/".$row_user->url_arquivo;
			}else{
				$sql = "SELECT * from tb_matricula where id_login = $row->cd_login";
				$query = $mysqli->query($sql);
				//echo $sql;

				if($query->num_rows > 0){
					$row_user = $query->fetch_object();
					$_SESSION['nome'] = $row_user->nm_matricula;
					$_SESSION['tp_user'] = 'Aluno';
				}else{
					$sql = "SELECT * from tb_professor as p join tb_arquivo on id_arquivo = cd_arquivo where p.id_login = $row->cd_login";
					$query = $mysqli->query($sql);

					if($query->num_rows > 0){
						$row_user = $query->fetch_object();
						$_SESSION['nome'] = $row_user->nm_professor;
						$_SESSION['tp_user'] = 'Professor';
						$_SESSION["img_login"] = "/img/professores/".$row_user->url_arquivo;
					}else{
						$sql = "SELECT * from tb_inscrito where id_login = $row->cd_login";
						$query = $mysqli->query($sql);

						if($query->num_rows > 0){
							$row_user = $query->fetch_object();
							$_SESSION['nome'] = $row_user->nm_inscrito;
							$_SESSION['tp_user'] = 'Inscrito';
						}else{
							header_loc("../index.php");
						}
					}
				}
			}

			$_SESSION['logged_in'] = true;	//Confirma o login
			$_SESSION['tx_login'] = $login;	//Guarda o tx_login
			$_SESSION['cd_login'] = $row->cd_login;	//Guarda o cd_login

			//Redireciona para a home_page
			header_loc('../home.php');

		}else{
			//Redireciona para o index
			header_loc('../index.php');
		}

	}


	