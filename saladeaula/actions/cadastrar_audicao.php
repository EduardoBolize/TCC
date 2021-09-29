<?php
include_once('../functions/util.php');

if(isset($_POST['nm_audicao']) and isset($_POST['ds_audicao']) and isset($_POST['dt_abertura']) and isset($_POST['dt_fechamento']) and isset($_POST['nr_vagas'])){

	$nm_audicao= $_POST['nm_audicao'];
	$ds_audicao= $_POST['ds_audicao'];
	$dt_abertura = $_POST['dt_abertura'];
	$dt_fechamento = $_POST['dt_fechamento'];
	$nr_vagas= $_POST['nr_vagas'];
	$id_login= $_SESSION['cd_login'];

	$dt_fechamento = formatar_para_date($dt_fechamento);
	$dt_abertura = formatar_para_date($dt_abertura);


	$sql_admin="SELECT * from tb_admin where id_login = $id_login";
	$query_admin =$mysqli->query($sql_admin);

	if($query_admin->num_rows>0){
		$row_admin = $query_admin->fetch_object();

		$id_admin = $row_admin->cd_admin;

		$sql_audicao = "INSERT INTO tb_audicao values (null, '$nm_audicao', '$ds_audicao', '$dt_abertura', '$dt_fechamento', '$nr_vagas', 1, '$id_admin')";
		ECHO $sql_audicao;
	

		if($mysqli->query($sql_audicao)){
			header('location: ../administrador/crud_audicao.php');
		}
	}

}else{
	history_back("Por favor, preencha o formulário!");
}
