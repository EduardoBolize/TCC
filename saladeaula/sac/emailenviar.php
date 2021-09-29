<?php
//1 – Definimos Para quem vai ser enviado o email
  $para = "luanag535@gmail.com";

  //2 - resgatar o nome digitado no formulário e  grava na variavel $nome
  $nome = $_POST['nm_sac'];

  $email_servidor="luanag535.000webhostapp.com";

  $email = $_POST['tx_email'];

  // 3 - resgatar o assunto digitado no formulário e  grava na variavel //$assunto
  $assunto = "Contato pelo site Ballet Andorinha";

  //4 – Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem = $_POST['ds_sac'];

  $headers = "From:". $nome ."<".$email.">". "\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  $email\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n"; 
 
mail($para, $assunto, $mensagem, $headers);  //função que faz o envio do email.


include_once('../../functions/db_connect.php');  
$mysqli = db_connect();
if(isset($_POST['nm_sac']) and isset ($_POST['ds_sac']) and isset($_POST['tx_email'])){

    $nm_sac = $_POST['nm_sac'];
    $ds_sac = $_POST['ds_sac'];
    $tx_email = $_POST['tx_email'];

    $sql = "INSERT into tb_sac values(null, '$nm_sac', '$ds_sac', '$tx_email')";

    if($mysqli->query($sql)){
      echo "Foi!";
    }else{
      echo "Que pena ;(";
    }
  }else{
    redirect("Por favor, preencha o formulário!","../sac/sac.php");
  }
  ?>
