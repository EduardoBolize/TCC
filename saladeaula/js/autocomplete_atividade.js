function autocomplete(campo,valor){
    //pega o input a ser preenchido
    var elem = document.getElementById(campo);
    //divide a string valor para o efeito de digitação
    var valor_separado = valor.split('');

    //coloca o input em foco (para o materialize funcionar)
    elem.focus();
    //elem.value = "";

    function digitar(){
        var l = valor_separado.length;
        var i = 0;
        var id = setInterval(frame, 50);
        function frame() {
            if(i == l){
                clearInterval(id);
            }
            else{
                elem.value += valor_separado[i];
                i++;
            }
        }
    }
    setTimeout(digitar, 500);     
}

var values = [];

for (var x = 0; x < 2; x++) {
    values[x] = [];
}

values[0][0] = "nm_atividade";
values[0][1] = "Avaliação - História do Ballet";

values[1][0] = "ds_atividade";
<<<<<<< HEAD
values[1][1] = "Avaliação do Ballet no Séc. XIX";
=======
values[1][1] = "A audição para selecionar alunos";
>>>>>>> 65c142c115caf63ef978e2e84190ee106515112b
     
function rodar(){
    var c = 0;
    var l = values.length;
    var s = 1000

    var id = setInterval(frame, s);
    function frame() {
        if(c == l){
            clearInterval(id);
            console.log('foi');
        }
        else{
            autocomplete(values[c][0],values[c][1]);
            s = (values[c][1].length)*200;
            c++;
        }
    }
}
