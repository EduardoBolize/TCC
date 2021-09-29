<?php

	include_once('../../saladeaula/functions/encriptar.php');		//Função de encriptar senha
	$mysqli = new mysqli('localhost','root','usbw','db_andorinha');	//Conexão com banco
	$mysqli->set_charset("utf8");									//UTF-8

	//Redireciona junto de uma mensagem (JS)
	function redirect($alert,$pag){

		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.location = '".$pag."';";
		echo "</script>";

	}

	//Cadastro de Login
	function cadastrar_login($tx_login,$tx_pass){

		$mysqli = new mysqli('localhost','root','usbw','db_andorinha');	//Conexão com banco
		$mysqli->set_charset("utf8");
		
		$pass_e = encriptar_senha($tx_pass);	//Encripta a senha digitada

		//Cadastro do Login
		$sql_login = "INSERT into tb_login values (null,'$tx_login','$pass_e')";

		//Execução do cadastro
		if($mysqli->query($sql_login)){

			//Caso executado, consulta o cd do login
			$sql = "SELECT * from tb_login where tx_login = '$tx_login' and tx_pass = '$pass_e'";
			$query = $mysqli->query($sql);

			$row = $query->fetch_object();

			//Retorna o cd_login
			return $row->cd_login;

		}else{
			//Caso não executado
			return 0;
		}

	}

	//Função de login
	function login($login, $pass){
		
		$mysqli = new mysqli('localhost','root','usbw','db_andorinha');
		$mysqli->set_charset("utf8");

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
			$sql = "SELECT * from tb_admin where id_login = $row->cd_login";
			$query = $mysqli->query($sql);

			session_start();

			if($query->num_rows > 0){
				$row_user = $query->fetch_object();
				$_SESSION['nome'] = $row_user->nm_admin;
				$_SESSION['tp_user'] = 'Administrador';
			}else{
				$sql = "SELECT * from tb_matricula where id_login = $row->cd_login";
				$query = $mysqli->query($sql);
				//echo $sql;

				if($query->num_rows > 0){
					$row_user = $query->fetch_object();
					$_SESSION['nome'] = $row_user->nm_matricula;
					$_SESSION['tp_user'] = 'Aluno';
				}else{
					$sql = "SELECT * from tb_professor where id_login = $row->cd_login";
					$query = $mysqli->query($sql);

					if($query->num_rows > 0){
						$row_user = $query->fetch_object();
						$_SESSION['nome'] = $row_user->nm_professor;
						$_SESSION['tp_user'] = 'Professor';
					}else{
						$sql = "SELECT * from tb_inscrito where id_login = $row->cd_login";
						$query = $mysqli->query($sql);

						if($query->num_rows > 0){
							$row_user = $query->fetch_object();
							$_SESSION['nome'] = $row_user->nm_inscrito;
							$_SESSION['tp_user'] = 'Inscrito';
						}else{
							header("Location: ../index.php");
						}
					}
				}
			}

			$_SESSION['logged_in'] = true;	//Confirma o login
			$_SESSION['tx_login'] = $login;	//Guarda o tx_login
			$_SESSION['cd_login'] = $row->cd_login;	//Guarda o cd_login

			//Redireciona para a home_page
			header('Location: ../../saladeaula/home.php');

		}else{
			//Redireciona para o index
			header('Location: ../index.php');
		}

	}

    if(isset($_POST['nm_inscrito']) and isset($_POST['nr_cpf']) and isset($_POST['ds_endereco']) and isset($_POST['ds_cidade']) and isset($_POST['nr_telefone1']) and isset($_POST['nr_telefone2']) and isset($_POST['tx_email']) and isset($_POST['tx_login']) and isset($_POST['tx_pass'])){

		$nm_inscrito= $_POST['nm_inscrito'];
		$nr_cpf = $_POST['nr_cpf'];
		$ds_endereco = $_POST['ds_endereco'];
		$ds_cidade = $_POST['ds_cidade'];
		$nr_telefone1= $_POST['nr_telefone1'];
		$nr_telefone2= $_POST['nr_telefone2'];
		$tx_email = $_POST['tx_email'];
		$tx_login = $_POST['tx_login'];
		$tx_pass = $_POST['tx_pass'];


      	//Cadastra o login
		$cd_login = cadastrar_login($tx_login,$tx_pass);
		

      	date_default_timezone_set("America/Sao_Paulo");
  		$date = date('Y-m-d');

      	$sql="INSERT into tb_inscrito values(null, '$nm_inscrito', '$nr_cpf', '$ds_endereco', '$ds_cidade', '$nr_telefone1', '$nr_telefone2', '$tx_email', 0, 0, $cd_login)";
		echo $sql;

      	if($mysqli->query($sql)){
			//header("location: ../../index.php");
			
			login($tx_login,$tx_pass);

  		}else{
  			//redirect("Não foi possível efetuar o cadastro","../../index.php");
  		}

    }else{
		redirect("Por favor, preencha o formulário!","../cadastro_inscrito.php");
	}
