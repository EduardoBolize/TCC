<?php
	include_once("functions/validar_login.php");
	validar_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="/css/material_icons.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="utf-8">
        
    </head>
    <body>
        <div class="content row">

			<?php
				include_once('components/menu.php');
			?>

        	<div class="body col s10 offset-s1  z-depth-1">

        		<div class="item_box col s12">
					<div class="item_content">
						<div class="item_top col s12 center center-align">
							<h3>Turmas</h3>
						</div>
						<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
							<table style="color:white;">
								<thead>
									<th>
										<td>Nome</td>
										<td>Sigla</td>
										<td>Ano</td>
										<td>Curso</td>
									</th>
								</thead>
								<tbody>
									<?php
										include_once('functions/util.php');
										include_once('functions/db_connect.php');

										$mysqli = db_connect();

										$sql = "SELECT * from tb_login";
										$query = $mysqli->query($sql);

										if($query->num_rows > 0){

											while($row = $query->fetch_object()){
												echo "<tr>";
												echo "<td>".$row->nm_sala."</td>";
												echo "<td>".$row->sg_sala."</td>";
												echo "<td>".$row->st_turma."</td>";
												echo "<td>".$row->nm_curso."</td>";
												echo "</tr>";
											}

										}else{
											echo "<tr>";
											echo "<td colspan='4'>Não existem turmas cadastradas!</td>";
											echo "</tr>";
										}
											
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="item_box col s12 m6 l4" onclick="window.location = 'cadastrar_turmas.php'" style="cursor:pointer;">
					<div class="item_content">
						<div class="item_top col s10 offset-s1">
							<h3>Cadastrar</h3>
						</div>
						<div class="item_bot col s10 offset-s1">
							<p>Cadastrar uma turma</p>
						</div>
					</div>
				</div>

				<div class="item_box col s12 m6 l4">
					<div class="item_content">
						<div class="item_top col s10 offset-s1">
							<h3>Atualizar</h3>
						</div>
						<div class="item_bot col s10 offset-s1">
							<p>Atualizar uma turma</p>
						</div>
					</div>
				</div>

				<div class="item_box col s12 m6 l4">
					<div class="item_content">
						<div class="item_top col s10 offset-s1">
							<h3>Hello</h3>
						</div>
						<div class="item_bot col s10 offset-s1">
							<p>Hehhehehehehehe</p>
						</div>
					</div>
				</div>
        	</div>

        </div>

        <!--Scripts-->
        <script type="text/javascript" src="/js/jquery-1.12.0.min.js"></script>
        <script type="text/javascript" src="/js/materialize.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		  	});
        </script>
    </body>
</html>