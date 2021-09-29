//FUNÇÃO QUE VALIDA AS DATAS DE INÍCIO/FIM

function validar_datepicker(base, id_validando, tipo) {
	
	trigger = $(id_validando);
	instance = 	M.Datepicker.getInstance(trigger);

	data_separada = base.split('/');
	data_separada[0] = (tipo == "max")? (parseInt(data_separada[0]) + 1) : data_separada[0];
	date_string = data_separada[2]+"-"+data_separada[1]+"-"+data_separada[0];
	date_object = new Date(date_string);

	if(tipo == "min"){
		instance.options.minDate = date_object;
	}else if(tipo == "max"){
		instance.options.maxDate = date_object;
	}
}

