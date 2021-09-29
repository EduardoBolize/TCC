<meta charset="utf-8">
<?php

	//Validar Login
	function validar_login($nivel="padrao"){
		
		session_start();

		//verifica se está logado
		if(isset($_SESSION['logged_in'])){
			if($_SESSION['logged_in']){
			
			}else{
				redirect('Você precisa fazer login para acessar essa Página!','../index.php');
			}
		}else{
			redirect('Você precisa fazer login para acessar essa Página!','../index.php');
		}
	}

	function validar_nivel($nivel){

		$niveis = explode(" ", $nivel); 
		$qt_niveis = count($niveis);
		$nao_passou = 0;

		//verifica o nível
		//se não for declarado nível, não verifica
		if(in_array('admin', $niveis) or in_array('Administrador', $niveis)){
			if($_SESSION['tp_user'] != 'Administrador'){
				$nao_passou++;
			}
		}
		if(in_array('professor', $niveis) or in_array('prof', $niveis)){
			if($_SESSION['tp_user'] != 'Professor'){
				$nao_passou++;
			}
		}
		if(in_array('aluno', $niveis)){
			if($_SESSION['tp_user'] != 'Aluno'){
				$nao_passou++;
			}
		}
		if(in_array('inscrito', $niveis)){
			if($_SESSION['tp_user'] != 'Aluno'){
				$nao_passou++;
			}
		}
		if($qt_niveis == $nao_passou){
			redirect('Você não tem permissão para acessar essa página!','../index.php');
		}
	}

	function db_connect(){
		$mysqli = new mysqli('localhost','root','usbw','db_andorinha');
		$mysqli->set_charset("utf8");

		return $mysqli;
	}

	$mysqli = db_connect();
	
	validar_login();

    //Redireciona junto de uma mensagem (JS)
	function redirect($alert,$pag){

		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.location = '".$pag."';";
		echo "</script>";

	}

    //Voltar para página anterior
	function history_back($alert){

		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.history.back();";
		echo "</script>";

	}

	function history_back2($alert){
		echo "<script>";
		echo "alert('".$alert."');";
		echo "window.history.go(-2);";
		echo "</script>";
	}

	function header_loc($pag){

		echo "<script>";
		echo "window.location = '".$pag."';";
		echo "</script>";

	}

	function header_back2(){
		echo "<script>";
		echo "window.history.go(-2);";
		echo "</script>";
	}

    //Exibe um alerto do JS
	function alert($alert){

		echo "<script>";
		echo "alert('".$alert."');";
		echo "</script>";

	}

	function formatar_data($data,$formato){
		$sql = "SELECT DATE_FORMAT($data, '$formato') as data_form";
		$query = $mysqli->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_object();

			return $row->data_form;
		}else{
			return "erro";
		}

	}

	//Formatar data do DATE materialize css
	function formatar_data_materialize($data){
		$data_php = explode(',', $data);
		$data_php = $data_php[0].$data_php[1];
		$data_php = explode(' ',$data_php);
		$dia = $data_php[1];
		$mes = $data_php[0];
		$ano = $data_php[2];
		if($mes == 'Jan'){
			$mes = '01';
		}else if($mes == 'Feb'){
			$mes = '02';
		}else if($mes == 'Mar'){
			$mes = '03';
		}else if($mes == 'Apr'){
			$mes = '04';
		}else if($mes == 'May'){
			$mes = '05';
		}else if($mes == 'Jun'){
			$mes = '06';
		}else if($mes == 'Jul'){
			$mes = '07';
		}else if($mes == 'Aug'){
			$mes = '08';
		}else if($mes == 'Sep'){
			$mes = '09';
		}else if($mes == 'Oct'){
			$mes = '10';
		}else if($mes == 'Nov'){
			$mes = '11';
		}else if($mes == 'Dec'){
			$mes = '12';
		}
		$data_final = $ano.'-'.$mes.'-'.$dia;
		return $data_final;
	}

	//Formatar para materialize
	function formatar_para_materialize($dt_termino){
		$dt = explode('-',$dt_termino);
        $ano = $dt[0];
        $mes = $dt[1];
        $dia = $dt[2];
        if($mes == '01'){
            $mes = 'Jan';
        }else if($mes == '02'){
            $mes = 'Feb';
        }else if($mes == '03'){
            $mes = 'Mar';
        }else if($mes == '04'){
            $mes = 'Apr';
        }else if($mes == '05'){
            $mes = 'May';
        }else if($mes == '06'){
            $mes = 'Jun';
        }else if($mes == '07'){
            $mes = 'Jul';
        }else if($mes == '08'){
            $mes = 'Aug';
        }else if($mes == '09'){
            $mes = 'Sep';
        }else if($mes == '10'){
            $mes = 'Oct';
        }else if($mes == '11'){
            $mes = 'Nov';
        }else if($mes == '12'){
            $mes = 'Dec';
        }
        return $dt_fim_final = $mes.' '.$dia.', '.$ano;
	}

	function separar_data($date, $indice){
		$numeros = explode('-', $date);
		return $numeros[$indice];
	}

	function formatar_para_date($data){
		$nova_data = '';
		$data_sem_barra = explode('/', $data);
		$nova_data = $data_sem_barra[2].'-'.$data_sem_barra[1].'-'.$data_sem_barra[0];
		return $nova_data;
	}

	function formatar_para_br($data){
		$nova_data = '';
		$data_sem_traco = explode('-', $data);
		$nova_data = $data_sem_traco[2].'/'.$data_sem_traco[1].'/'.$data_sem_traco[0];
		return $nova_data;
	}

	function primeira_vez($caminho = "/saladeaula/administrador/first_time.txt"){
		
		//abre o arquivo
		$arquivo = fopen($caminho, 'r');
	
		//lê e armazena o valor
		$valor = fgets($arquivo, 1024); 

		//fecha o arquivo
		fclose($arquivo);

		if($valor == "0"){
			return true;
		}else if($valor == "1"){
			return false;
		}
	}

	function alterar_vez($caminho = "/saladeaula/administrador/first_time.txt"){
		if(primeira_vez($caminho)){
			//abre o arquivo 
			$arquivo = fopen($caminho, 'w+');
			//escreve
			fwrite($arquivo, "1");
			//fecha
			fclose($arquivo);
		}
	}

	function verificar_aluno_turma($aluno,$turma){
		$mysqli = db_connect();
		$sql = "SELECT * from tb_turma_matricula join tb_matricula on id_matricula = cd_matricula where id_login = $aluno and id_turma = $turma";
		$query = $mysqli->query($sql);

		if($query->num_rows > 0){
			return 1;
		}else{
			return 0;
		}
	}


