// $('.datepicker').datepicker();
function traduzir_datepicker(input_id){

	var trigger = $(input_id);
	var instance = M.Datepicker.getInstance(trigger);
	var opcoes = instance.options;
	var traducao = opcoes.i18n;

	traducao.months = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
	traducao.monthsShort = ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'];
	traducao.weekdays = ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'];
	traducao.weekdaysShort = ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'];
	traducao.weekdaysAbbrev = ['D','S','T','Q','Q','S','S'];

	var ano = new Date();
	ano = ano.getFullYear();
	opcoes.format = "dd/mm/yyyy";
	opcoes.yearRange = [1940,ano];
}