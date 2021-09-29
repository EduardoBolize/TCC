<?php
	include_once('../functions/util.php');
	include_once('../functions/exibir_cronograma.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andorinha | Cronograma</title>
        <link href="/saladeaula/css/material_icons.css" rel="stylesheet">
        <link href="/saladeaula/css/style.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="/saladeaula/css/materialize.min.css"  media="screen,projection"/>
		<link href='../fullcalendar/fullcalendar.min.css' rel='stylesheet' />
		<link href='../fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style>
			body {
				font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
				font-size: 14px;
			}

			#calendar {
				max-width: 900px;
				margin: 0 auto;
				color:white !important;
			}

			#calendar .fc-day-grid-event{
				background-color:#771668;
				border-color:#771668 !important;
			}

			#calendar .fc-today{
				background-color:#77166865;
			}
			#calendar th, #calendar td{
				color:white !important;
			}
			#calendar .fc-button{
				
			}
			#calendar .fc-button:focus{
				background-color:#771668;
				color:white;
			}
			#calendar .fc-left{
				width: 100%;
				text-align: center !important;
				margin-bottom:5px;
			}
			#calendar .fc-left h2{
				font-size: 20pt;
			}
			@media (min-width: 220px){
				#calendar .fc-left h2{
					font-size: 20pt;
				}
			}
			@media (min-width: 600px){
				#calendar .fc-left h2{
					font-size: 40pt;
				}
			}
			.fc-time{
				display : none;
			}
		</style>
    </head>
    <body>
        <div class="content row">

			<?php
				include_once('../components/menu.php');
			?>

        	<div class="body col s10 offset-s1  z-depth-1">

				<div id='calendar'></div>
				
			</div>
        </div>

        <!--Scripts-->
        <script type="text/javascript" src="/saladeaula/js/jquery-1.12.0.min.js"></script>
		<script src='/saladeaula/fullcalendar/lib/jquery.min.js'></script>
		<script type="text/javascript" src="/saladeaula/js/materialize.js"></script>
		<script src='/saladeaula/fullcalendar/lib/moment.min.js'></script>
		<script src='/saladeaula/fullcalendar/fullcalendar.min.js'></script>
		<script src="/saladeaula/fullcalendar/locale/pt-br.js"></script>
        <script type="text/javascript">
    	 	$(document).ready(function(){
		    	$(".sidenav").sidenav();
		    	$('.dropdown-trigger').dropdown();
		    	$('.modal').modal();
		  	});
    	 	function muda_modal(nome,cd,status){
    	 		document.getElementById('nome_modal').innerHTML = nome;
    	 		document.getElementById('status').innerHTML = status;
    	 		document.getElementById('href_modal').href = "../actions/inativar_curso.php?cd="+cd;
    	 	}
		</script>
		<script>
			$(document).ready(function(){
				$('#calendar').fullCalendar({
					defaultDate: '<?php date_default_timezone_set("America/Sao_Paulo");echo date('Y-m-d'); ?>',
					editable: false,
					eventLimit: true, // allow "more" link when too many events
					events: [
					<?php 
					exibir_cronograma(1);
					?>
					]
				});
			});
		</script>
    </body>
</html>
