<!DOCTYPE html>
<html style="user-select: none;">
	<head>
		<meta charset="utf-8">
		<title>Andorinha | Alterar Senha</title>
		<link href="/saladeaula/css/material_icons.css" rel="stylesheet">
		<link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<div class="content row">
			
			<div class="col s12">

				<!-- <div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<div class="topo_box center center-align col s10 offset-s1">
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer" onclick="window.location = 'index.php'">
					</div>
					<div class="col s12 center center-align">
						<h4>Redefinir Senha</h4>
					</div>
					<div class="corpo_box col s10 offset-s1">
						<form action="actions/alterar_senha.php" method="post">
							<div class="input-field">
								<i class="material-icons prefix">account_box</i>
								<label for="tx_email">Login:</label>
								<input type="email" name="tx_email" id="tx_email" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">account_box</i>
								<label for="tx_email">Email:</label>
								<input type="email" name="tx_email" id="tx_email" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<label for="tx_pass">Nova Senha:</label>
								<input type="password" name="tx_pass" id="tx_pass" required>
							</div>
							<div class="input-field">
								<i class="material-icons prefix">lock</i>
								<label for="tx_pass">Repita a Senha:</label>
								<input type="password" name="tx_pass" id="tx_pass" required>
							</div>
							<div class="input-field center center-align">
								<button type="submit" class="btn" onclick="history.back();">Voltar</button>
								<button type="submit" class="btn">Redefinir</button>
							</div>
						</form>
					</div>
					<div class="footer_box">

					</div>
				</div> -->

				<div class="col s10 m8 l6 offset-s1 offset-m2 offset-l3 z-depth-2" style="background-color:white; border-radius: 10px;margin-top:50px;padding-bottom:20px;">
					<div class="topo_box center center-align col s10 offset-s1">
						<img src="/saladeaula/images/logo2.png" style="width: 100%; height: auto; cursor: pointer" onclick="window.location = 'index.php'">
					</div>
					<div class="col s12 center center-align">
						<h3>Verifique seu Email</h3>
					</div>
					<div class="corpo_box col s10 offset-s1"  style="margin-top: 50px">
						<div class="col s10 offset-s1 center-align">
							<h5>Você receberá em alguns instantes um email com um novo acesso ao sistema</h4>
						</div>
					</div>
					<div class="input-field center center-align">
						<button type="submit" class="btn" style="margin-top: 50px" onclick="history.back();">Entendi!</button>
					</div>
				</div>


			</div>

		</div>

		<!--Scripts-->
		<script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.min.js"></script>
		<script type="text/javascript" src="/saladeaula/js/autocomplete_admin.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".sidenav").sidenav();
				$('.dropdown-trigger').dropdown();
				$('.modal').modal();
			});
		</script>
	</body>
</html>