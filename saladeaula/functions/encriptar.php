<meta charset="utf-8">
<?php

	//Encripta uma senha
	function encriptar_senha($pass){
		$encript = hash('sha256',$pass);
		
		return $encript;
	}