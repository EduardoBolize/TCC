<div class="col s12 abas" >
	<ul id="tabs-swipe-demo" class="tabs tabs-fixed-width">
		<li class="tab"><a href="#test-swipe-1">Atividade e Funções</a></li>
		<li class="tab"><a href="#test-swipe-2">Tarefa e Funções</a></li>
		<li class="tab"><a href="#test-swipe-3">Comunicado e Funções</a></li>
		<li class="tab"><a href="#test-swipe-4">Cronograma</a></li>
	</ul>
</div>
<div id="test-swipe-1" class="col s12">
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Inativar Atividade?</h4>
			<p>Deseja realmente <span id="status">Teste</span> a atividade <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
			<a href="#!" id="href_modal" class="modal-close waves-effect waves-green btn-flat">Sim</a>
		</div>
	</div>
    <div class="content row">
    	<div class="col s12" style="margin-top:5px;">
			<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
				<table class="responsive-table">
					<thead>
						<tr>
							<th><a class="btn-floating waves-effect waves-light btn-small" href="professor/cadastro_atividade.php"><i class="material-icons right">add</i>cadastrar</a></th>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Status</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php

							include_once('/functions/exibir_atividade.php');
							exibir_atividade(1);
								
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>
<div id="test-swipe-2" class="col s12">
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Inativar tarefa?</h4>
			<p>Deseja realmente <span id="status">Teste</span> a tarefa <span id="nome_modal">Teste</span>? Você poderá reativá-la se necessário!</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
			<a href="#!" id="href_modal" class="modal-close waves-effect waves-green btn-flat">Sim</a>
		</div>
	</div>
    <div class="content row">

    	<div class="col s12" style="margin-top:5px;">
								
			<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
				<table class="responsive-table">
					<thead>
						<tr>
							<th>CD</th>
							<th>Atividade</th>
							<th>Turma</th>
							<th>Data de Início</th>
							<th>Data de Fim</th>
							<th>Hora de Fim</th>
							<th>Status</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php

							include_once('/functions/exibir_tarefas.php');
							exibir_tarefas(1,$_SESSION["cd_login"],0);
								
						?>
					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>
<div id="test-swipe-3" class="col s12">
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4>Inativar Comunicado?</h4>
			<p>Deseja realmente <span id="act_modal">Teste</span> o Comunicado <span id="nome_modal">Teste</span>? Você poderá reativá-lo se necessário!</p>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-close waves-effect waves-red btn-flat">Não</a>
			<a href="#!" id="href_modal" class="modal-close waves-effect waves-green btn-flat">Sim</a>
		</div>
	</div>
	<div class="content row">
    	<div class="col s12" style="margin-top:5px;">	
			<div class="item_bot col s12" style="padding-bottom:10px;padding-top: 10px;">
				<table class="responsive-table">
					<thead>
						<tr>
							<th><a class="btn-floating waves-effect waves-light btn-small" href="professor/cadastro_comunicado.php"><i class="material-icons right">add</i>cadastrar</a></th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Quando?</th>
							<th>Criado em:</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?php

							include_once('/functions/exibir_comunicados.php');
							exibir_comunicados(1);
								
						?>
					</tbody>
				</table>
			</div>    
		</div>
	</div>
</div>

<div id="test-swipe-4" class="col s12">

	<div id='calendar' style="margin-top: 5px;"></div>

	<style>
		/*body {
			font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
			font-size: 14px;
		}*/

		#calendar {
			max-height: 1300px !important; 
			max-width: 900px !important;
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
		
		.tabs .tab a{
			color:rgba(119,22,104,1) !important;
			background-color: transparent !important;
		}
		.tabs .tab a:hover, .tabs .tab a:active,{
			background-color: none !important;
			color: #771668 !important;
		}
		.tabs .indicator{
			position:absolute;
			bottom:0;
			height:5px;
			will-change:left, right;
			background-color: #771668 !important; 
		}

		.ati{
			margin-top: 0.5%;
		}
		#div{
			background: rgba(20, 20, 20, 0.5) !important;
			box-shadow: none;
		}
		#test-swipe-1, #test-swipe-2, #test-swipe-3, #test-swipe-4{
			margin-top: 1%;
		} 	
	</style>

	
</div>
