function mudar_cor_menu(){
	var pag = document.getElementById('pag').value;
	var menu = document.getElementById(pag);
	menu.style.backgroundColor = '#783836';
	menu.style.color = '#fff';
}

/*Cadastro dos produtos*/
function cadastrar_produto() {
  var nm = document.getElementById('nm');
  var url = document.getElementById('url');
  if(nm.value != '' && url.value != ''){

    $.ajax({
      type: "POST",
      url: "../actions/cadastrar_produto.php?tipo=1",
      data: {
        nm: $('#nm').val(),
        url: $('#url').val()
      },
      success: function() {
        alert('Seu produto foi adicionado!!');
        getproduto_final();
        nm.value = '';
        url.value = '';
      }
    });   
  }else{
    alert('Adicione um produto caso queira usar essa função!');
  }
}

/*Vizualizar produtos*/
function CriaRequest() {
     try{
         request = new XMLHttpRequest();        
     }catch (IEAtual){
         
         try{
             request = new ActiveXObject("Msxml2.XMLHTTP");       
         }catch(IEAntigo){
         
             try{
                 request = new ActiveXObject("Microsoft.XMLHTTP");          
             }catch(falha){
                 request = false;
             }
         }
     }
     
     if (!request) 
         alert("Seu Navegador não suporta Ajax!");
     else
         return request;
 }

 function getproduto_final(nm,url) {
     var xmlreq = CriaRequest();
     var vazio = document.getElementById('vazio');
     
     // Iniciar uma requisição
     xmlreq.open("GET", "../actions/exibir_produtos.php?tipo=2&nm=" + nm+"&url=" + url, true);
     
     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){
         
         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {
             
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 vazio.innerHTML = xmlreq.responseText;
             }else{
                 vazio.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }
 
 /**
  * Função para enviar os dados
  */
 function getDados() {
    var cds = document.getElementById('cds_produto').value;
    
     
     // Declaração de Variáveis
     var nome   = document.getElementById("nm_produto").value;
     var result = document.getElementById("exibir_produtos");
     var xmlreq = CriaRequest();
     
     // Iniciar uma requisição
     xmlreq.open("GET", "../actions/exibir_produtos.php?nm_produto="+nome+"&cds="+cds+"", true);
     
     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){
         
         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {
             
             // Verifica se o arquivo foi encontrado com sucesso
             if (xmlreq.status == 200) {
                 result.innerHTML = xmlreq.responseText;
             }else{
                 result.innerHTML = "Erro: " + xmlreq.statusText;
             }
         }
     };
     xmlreq.send(null);
 }

var produtos = [];
var i_c = 1;

var valores = [];

function adicionar_produto(cd,nm,url) {
  produtos[i_c] = cd;
  i_c++;
  var nr_produtos = document.getElementById('cds_produto');
  nr_produtos.value = produtos;

  getDados();
  
  cd = parseInt(cd);
  var contador = document.getElementById('qntd_produtos');
  var nova_div = parseInt(contador.value) + 1;
  var form = document.getElementById('form_produtos');
  var c = 1;

  contador.value = nova_div;

  var tr = document.createElement("tr");
  tr.setAttribute("id","tr_"+nova_div);
  form.appendChild(tr);

  tr = document.getElementById("tr_"+nova_div);

  var td1 = document.createElement("td");
  td1.setAttribute("id","td_"+nova_div+"_"+c);
  tr.appendChild(td1);
  
  // td1 = document.getElementById("td_"+nova_div+"_"+c);
  // $(td1).append(cd);
  c = c + 1;

  var td2 = document.createElement("td");
  td2.setAttribute("id","td_"+nova_div+"_"+c);
  tr.appendChild(td2);
  td2 = document.getElementById("td_"+nova_div+"_"+c);
  $(td2).append(nm);
  c = c + 1;

  var td3 = document.createElement("td");
  td3.setAttribute("id","td_"+nova_div+"_"+c);
  tr.appendChild(td3);
  // td3 = document.getElementById("td_"+nova_div+"_"+c);
  // $(td3).append(url);
  c = c + 1;

  var td4 = document.createElement("td");
  td4.setAttribute("id","td_"+nova_div+"_"+c);
  tr.appendChild(td4);
  td4 = document.getElementById("td_"+nova_div+"_"+c);
  c = c + 1;

  var input_valor = document.createElement("input");
  input_valor.setAttribute("name","vl_"+nova_div);
  input_valor.setAttribute("type","number");
  input_valor.setAttribute("required","required");
  input_valor.setAttribute("placeholder","R$ 5.00");
  td4.appendChild(input_valor);

  var td5 = document.createElement("td");
  td5.setAttribute("id","td_"+nova_div+"_"+c);
  tr.appendChild(td5);
  td5 = document.getElementById("td_"+nova_div+"_"+c);
  c = c + 1;

  var input_qntd = document.createElement("input");
  input_qntd.setAttribute("name","qt_"+nova_div);
  input_qntd.setAttribute("type","number");
  input_qntd.setAttribute("required","required");
  input_qntd.setAttribute("placeholder","10");
  td5.appendChild(input_qntd);

  var td6 = document.createElement("td");
  td6.setAttribute("id","td_"+nova_div+"_"+c);
  td6.setAttribute("style","text-align:center;");
  td6.setAttribute("onclick","remover_produto("+nova_div+")");
  tr.appendChild(td6);
  td6 = document.getElementById("td_"+nova_div+"_"+c);
  c = c + 1;

  var i = document.createElement("i");
  i.setAttribute("class", "material-icons");
  i.setAttribute("style", "background-color: red;cursor:pointer;color:white;border-radius:500px;");
  i.setAttribute("id", nova_div+"_"+c);
  td6.appendChild(i);
  i = document.getElementById(nova_div+"_"+c);
  $(i).append('close');

  
}

function remover_produto(nr) {
  var div = '#tr_'+nr;
  $(div).remove();
  produtos[nr] = '-';
  var nr_produtos = document.getElementById('cds_produto');
  nr_produtos.value = produtos;
}

function excluir_orcamento(cd){
    var btn = document.getElementById('btn_excluir');
    btn.setAttribute('onclick','confirmar_ex('+cd+')');
}
function confirmar_ex(cd){
    window.location = "actions/excluir_orcamento.php?cd="+cd;
}
function chamar_funcoes(){
  cadastrar_produto();
  getDados();
}