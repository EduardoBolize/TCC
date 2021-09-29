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

for (var x = 0; x < 9; x++) {
    values[x] = [];
}

values[0][0] = "tx_login";
values[0][1] = "lgdsv";

values[1][0] = "tx_pass";
values[1][1] = "123";

values[2][0] = "nm_professor";
values[2][1] = "Luiz Gustavo";

values[3][0] = "ds_endereco";
values[3][1] = "R. Diana n.10";

values[4][0] = "ds_cidade";
values[4][1] = "Itanhaém";

values[5][0] = "nr_telefone";
values[5][1] = "(13) 3427-9223";

values[6][0] = "nr_telefone2";
values[6][1] = "(13) 3466-2701";

values[7][0] = "nr_cpf";
values[7][1] = "479.521.678-88";

values[8][0] = "tx_email";
values[8][1] = "luizgustavo@gmail.com";
     
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

    /*for (var c = 0; c < values.length; c++) {
        setTimeout(frame(c), s);
        console.log(s);
        function frame(c){
            autocomplete(values[c][0],values[c][1]);
            s = (values[c][1].length)*200;
            //console.log(s);
        }
        
    }*/
}