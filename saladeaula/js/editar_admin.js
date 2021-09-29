var last_input;
var total_inputs = document.querySelectorAll("input.cara_de_texto").length;
var table_title = document.getElementById('table_title');

function info(){
	table_title.innerHTML = "Pressione Enter para confirmar";
}

function desistir(){
	table_title.innerHTML = "Alteração não realizada";
	setTimeout(function(){
		table_title.innerHTML = "Administradores";
	}, 2000);
}

function closedInputs(){
	inputs = document.querySelectorAll("input.cara_de_texto");
	total = 0;
	for(var i = 0; i < inputs.length; i++){
		if(inputs[i].readOnly){
			total++;
		}
	}
	return total;
}

function editar_admin(cd){
		parcial_inputs = closedInputs();
		input = document.getElementById('admin_'+cd);

		if(parcial_inputs == total_inputs){
			input.readOnly = false;
			setTimeout(function(){input.focus();}, 500);
			last_input = input;

		}else if(parcial_inputs == total_inputs - 1){

			if(last_input.id != input.id){
				input.readOnly = false;
				last_input.readOnly = true;
				last_input.setAttribute("readonly","readonly");
				setTimeout(function(){input.focus();}, 500);
				last_input = input;
				table_title.innerHTML = "Pressione Enter para confirmar";
			}
		}
}