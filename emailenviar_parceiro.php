<?php
$mysqli = new mysqli('localhost','root','usbw','db_andorinha');
$mysqli->set_charset("utf8");

//1 – Definimos Para quem vai ser enviado o email
  $para = "luanag535@gmail.com";

  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = $_POST['nm_parceiro'];

  $email_servidor="luanag535.000webhostapp.com";

  $email = $_POST['tx_email'];

  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = "Contato pelo site Ballet Andorinha - Parceria";

  //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem = $_POST['ds_parceiro'];

  $headers = "From:". $nome ."<".$email.">". "\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  $email\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n"; 
 
mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.



// date_default_timezone_set('UTC');
// $date = date("d_m_Y_H_i_s"); 

if(isset($_POST['nm_parceiro']) and isset ($_POST['ds_parceiro']) and isset($_POST['tx_email'])){

	$nm_parceiro = $_POST['nm_parceiro'];
	$ds_parceiro = $_POST['ds_parceiro'];
	$tx_email = $_POST['tx_email'];		

	$sql = "INSERT into tb_parceiro values(null, '$nm_parceiro', '$ds_parceiro', '$tx_email', 1)";

	if($mysqli->query($sql)){
		header('Location:../index.php');
	}
	else{
		header('Location:../parceiro.php');
	}}