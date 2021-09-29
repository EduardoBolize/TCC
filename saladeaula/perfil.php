<?php
	include_once('functions/util.php');  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Perfil</title>
        <link href="/saladeaula/css/material_icons.css" rel="stylesheet">
        <link href="/saladeaula/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div class="content row">

			<?php
				include_once('components/menu.php');
			?>

        	<div class="col s10 offset-s1 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
				<?php

					//Exibição do perfil de cada usuário
					//ADMIN
					if($_SESSION['tp_user'] == 'Administrador'){
						$cd = $_SESSION['cd_login'];
						$sql = "SELECT * from tb_admin join tb_login on id_login = cd_login where id_login = $cd";
					    $query = $mysqli->query($sql);
					    $row = $query->fetch_object();
				?>
				<div class="col s12 center center-align">
                    <h2>PERFIL</h2>
                </div>
                <div class="col s12">
					<form action="actions/atualizar_admin.php" method="post">
						<input type="hidden" name="origem" value="perfil">
						<input type="hidden" name="cd_admin" value="<?php echo $row->cd_admin; ?>">
						<div class="input-field">
	                        <i class="material-icons prefix">lock</i>
	                        <label for="nm_admin">Nome:</label>
	                        <input type="text" name="nm_admin" id="nm_admin" required value="<?php echo $row->nm_admin; ?>">
	                    </div>
	                    <div class="input-field">
                            <i class="material-icons prefix">lock</i>
                            <label for="tx_pass">Senha:</label>
                            <input type="password" name="tx_pass" id="tx_pass" disabled value="<?php echo $row->tx_pass; ?>">
                        </div>

	                    <div class="input-field center center-align">
	    					<button type="submit" class="btn">Enviar</button>
	    				</div>
	    			</form>
    			</div>
				<?php

					//ALUNO
					}else if($_SESSION['tp_user'] == 'Aluno'){
						$cd = $_SESSION['cd_login'];
						$sql = "SELECT * from tb_matricula join tb_login on id_login = cd_login where id_login = $cd";
					    $query = $mysqli->query($sql);
					    $row = $query->fetch_object();
					    $data = formatar_para_materialize($row->dt_matricula);
				?>
				 <div class="col s12 center center-align">
                    <h2>PERFIL</h2>
                </div>
                <div class="col s12">
					<form action="actions/atualizar_aluno.php" method="post">
						<input type="hidden" name="cd" value="<?php echo $row->cd_matricula; ?>">
		        				<div class="input-field">
	                                <i class="material-icons prefix">account_box</i>
	                                <label for="tx_login">Login:</label>
	                                <input type="text" name="tx_login" id="tx_login" required value="<?php echo $row->tx_login;?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">lock</i>
	                                <label for="tx_pass">Senha:</label>
	                                <input type="password" name="tx_pass" id="tx_pass" required value="<?php echo $row->tx_pass;?>" disabled>
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">create</i>
	                                <label for="nm_matricula">Nome:</label>
	                                <input type="text" name="nm_matricula" id="nm_matricula" required value="<?php echo $row->nm_matricula; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">place</i>
	                                <label for="ds_endereco">Endereço:</label>
	                                <input type="text" name="ds_endereco" id="ds_endereco" required value="<?php echo $row->ds_endereco; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">domain</i>
	                                <label for="ds_cidade">Cidade:</label>
	                                <input type="text" name="ds_cidade" id="ds_cidade" required value="<?php echo $row->ds_cidade; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">phone</i>
	                                <label for="nr_telefone">Telefone Principal:</label>
	                                <input type="tel" name="nr_telefone" id="nr_telefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value="<?php echo $row->nr_telefone1; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">phone_paused</i>
	                                <label for="nr_telefone2">Telefone 2:</label>
	                                <input type="tel" name="nr_telefone2" id="nr_telefone2" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value="<?php echo $row->nr_telefone2; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">assignment</i>
	                                <label for="nr_cpf">CPF:</label>
	                                <input type="text" name="nr_cpf" id="nr_cpf" required value="<?php echo $row->nr_cpf; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">assignment_ind</i>
	                                <label for="nr_rg">RG:</label>
	                                <input type="text" name="nr_rg" id="nr_rg" required value="<?php echo $row->nr_rg; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">today</i>
	                                <label for="dt_matricula">Data de Nascimento:</label>
	                                <input type="text" class="datepicker" name="dt_matricula" id="dt_matricula" required onfocus="document.getElementById('tx_email').focus();" value="<?php echo $data; ?>">
	                            </div>
	                            <p>
	                                <i class="material-icons prefix">wc</i>
	                              <label>
	                                <input name="nm_sexo" type="radio" value="M"/>
	                                <span>Masculino</span>
	                              </label>

	                              <label>
	                                <input name="nm_sexo" type="radio" value="F" checked=""/>
	                                <span>Feminino</span>
	                              </label>
	                            </p>
	                            <div class="input-field">
	                                <i class="material-icons prefix">mail</i>
	                                <label for="tx_email">E-mail:</label>
	                                <input type="email" name="tx_email" id="tx_email" required value="<?php echo $row->tx_email; ?>">
	                            </div>

		                 <div class="input-field center center-align">
							<button type="submit" class="btn">Enviar</button>
						</div>
					</form>
				</div>
				<?php

						//PROF
					}else if($_SESSION['tp_user'] == 'Professor'){
						$cd = $_SESSION['cd_login'];
						$sql = "SELECT * from tb_professor join tb_login on id_login = cd_login where id_login = $cd";
					    $query = $mysqli->query($sql);
					    $row = $query->fetch_object();
				?>
				<div class="col s12 center center-align">
                    <h2>PERFIL</h2>
                </div>
                <div class="col s12">
					<form action="../actions/atualizar_professor.php" method="post">
						<input type="hidden" name="cd_professor" value="<?php echo $row->cd_professor; ?>">
		        				<div class="input-field">
		        					<i class="material-icons prefix">account_box</i>
		        					<label for="tx_login">Login:</label>
		        					<input type="text" name="tx_login" id="tx_login" required value="<?php echo $row->tx_login; ?>" disabled>
		        				</div>
		        				<div class="input-field">
		        					<i class="material-icons prefix">lock</i>
		        					<label for="tx_pass">Senha:</label>
		        					<input type="password" name="tx_pass" id="tx_pass" required value="<?php echo $row->tx_pass; ?>" disabled>
		        				</div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">create</i>
	                                <label for="nm_professor">Nome:</label>
	                                <input type="text" name="nm_professor" id="nm_professor" required value="<?php echo $row->nm_professor; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">place</i>
	                                <label for="ds_endereco">Endereço:</label>
	                                <input type="text" name="ds_endereco" id="ds_endereco" required value="<?php echo $row->ds_endereco; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">domain</i>
	                                <label for="ds_cidade">Cidade:</label>
	                                <input type="text" name="ds_cidade" id="ds_cidade" required value="<?php echo $row->ds_cidade; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">phone</i>
	                                <label for="nr_telefone">Telefone Principal:</label>
	                                <input type="text" name="nr_telefone" id="nr_telefone" required pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value="<?php echo $row->nr_telefone1; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">phone_paused</i>
	                                <label for="nr_telefone2">Telefone 2:</label>
	                                <input type="text" name="nr_telefone2" id="nr_telefone2" required pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" value="<?php echo $row->nr_telefone2; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">assignment</i>
	                                <label for="nr_cpf">CPF:</label>
	                                <input type="text" name="nr_cpf" id="nr_cpf" required value="<?php echo $row->nr_cpf; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">mail</i>
	                                <label for="tx_email">E-mail:</label>
	                                <input type="email" name="tx_email" id="tx_email" required value="<?php echo $row->tx_email; ?>">
	                            </div>

	                    <div class="input-field center center-align">
	    					<button type="submit" class="btn">Enviar</button>
	    				</div>
	    			</form>
	    		</div>
				<?php
						//INSCRITO
					}else if($_SESSION['tp_user'] == 'Inscrito'){
						$cd = $_SESSION['cd_login'];
						$sql="SELECT * from tb_inscrito join tb_login on cd_login = id_login where id_login = $cd";
					    $query = $mysqli->query($sql);
					    $row = $query->fetch_object();
				?>
				<div class="col s12 center center-align">
                    <h2>PERFIL</h2>
                </div>
                <div class="col s12">
					<form action="actions/atualizar_inscrito.php" method="post">
						<input type="hidden" name="cd_inscrito" value="<?php echo $row->cd_inscrito; ?>">
	                            <div class="input-field">
	                                <i class="material-icons prefix">account_box</i>
	                                <label for="tx_login">Login:</label>
	                                <input type="text" name="tx_login" id="tx_login" disabled value="<?php echo $row->tx_login; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">lock</i>
	                                <label for="tx_pass">Senha:</label>
	                                <input type="password" name="tx_pass" id="tx_pass" disabled value="<?php echo $row->tx_pass; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">edit</i>
	                                <label for="nm_inscrito">Nome:</label>
	                                <input type="text" name="nm_inscrito" id="nm_inscrito" required value="<?php echo $row->nm_inscrito; ?>">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">assignment</i>
	                                <label for="nr_cpf">CPF:</label>
	                                <input type="text" name="nr_cpf" id="nr_cpf" required value="<?php echo $row->nr_cpf; ?>">
								</div>
								<div class="input-field">
	                                <i class="material-icons prefix">place</i>
	                                <label for="ds_endereco">Endereço:</label>
	                                <input type="text" name="ds_endereco" id="ds_endereco" required value="<?php echo $row->ds_endereco; ?>">
								</div>
								<div class="input-field">
	                                <i class="material-icons prefix">domain</i>
	                                <label for="ds_cidade">Cidade:</label>
	                                <input type="text" name="ds_cidade" id="ds_cidade" required value="<?php echo $row->ds_cidade; ?>">
								</div>
								<div class="input-field">
	                                <i class="material-icons prefix">phone</i>
	                                <label for="nr_telefone1">Telefone Principal:</label>
	                                <input type="text" name="nr_telefone1" id="nr_telefone1" required value="<?php echo $row->nr_telefone1; ?>" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">phone_paused</i>
	                                <label for="nr_telefone2">Telefone 2:</label>
	                                <input type="text" name="nr_telefone2" id="nr_telefone2" required value="<?php echo $row->nr_telefone2; ?>" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}">
	                            </div>
	                            <div class="input-field">
	                                <i class="material-icons prefix">mail</i>
	                                <label for="tx_email">E-mail:</label>
	                                <input type="email" name="tx_email" id="tx_email" required value="<?php echo $row->tx_email; ?>">
	                            </div>

	                    <div class="input-field center center-align">
	                        <button type="submit" class="btn">Enviar</button>
	                    </div>
	                </form>
	            </div>
                <?php
					}

				?>
			</div>

       	</div>
	
        <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/saladeaula/js/materialize.js"></script>
		<script type="text/javascript" src="/saladeaula/js/jquery.mask.min.js"/></script>
		<script type="text/javascript" src="/saladeaula/js/traduzir_datepicker.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		  	});

		  	$('#nr_telefone').each(function(i, el){
              $('#'+el.id).mask("(00) 00000-0000");
            });
            $('#nr_telefone2').each(function(i, el){
               $('#'+el.id).mask("(00) 00000-0000");
            });
            function updateMask(event) {
                var $element = $('#'+this.id);
                $(this).off('blur');
                $element.unmask();
                if(this.value.replace(/\D/g, '').length > 10) {
                    $element.mask("(00) 00000-0000");
                } else {
                    $element.mask("(00) 0000-00009");
                }
                $(this).on('blur', updateMask);
            }
            $('#nr_telefone').on('blur', updateMask);
            $('#nr_telefone').mask("(00) 0000-00009");
            $('#nr_telefone2').on('blur', updateMask);
            $('#nr_telefone2').mask("(00) 0000-00009");

            jQuery("#nr_cpf").mask("999.999.999-99");
            jQuery("#nr_rg").mask("99.999.999-9");
            $('.datepicker').datepicker();
            traduzir_datepicker("#dt_matricula");
        </script>
    </body>
</html>
