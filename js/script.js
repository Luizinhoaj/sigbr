// FORMATAR NUMEROS DECIMAIS
  $('.telefone').mask('(00) 0 0000-0000');
  $('.dinheiro').mask('#.##0,00', {reverse: true});

function carregahome() {
  window.location = "principal.php";
}

function carregaacompa() {
  window.location = "acompanhamento.php";
}

function carregaadicionais() {
  window.location = "adicionais.php";
}

function carregacategoria() {
  window.location = "categoria.php";
}

function carregafonecedores() {
  window.location = "fornecedores.php";
}

function carregagarcom() {
  window.location = "garcom.php";
}

function carregamesa() {
  window.location = "mesa.php";
}

function carregaobservacoes() {
  window.location = "observacoes.php";
}

function carregaprodutos() {
  window.location = "produtos.php";
}

function carregasetores() {
  window.location = "setores.php";
}

function carregausuarios() {
  window.location = "usuarios.php";
}

function cadformulario() {
  var descricao = $('#cdescricao');
  var valor = $('#cvalor');
  var erro = $('.alert');
  var campo = $('#campo-erro');

  if(descricao.val() == ''){
    campo.html('&nbsp;Descrição&nbsp;');
      // Nome do campo que não foi preechido
      descricao.focus();
      mudadispley();
    return false;
  }

  if(valor.val() == ''){
    campo.html(' Valor');
      // Nome do campo que não foi preechido
    valor.focus();
    mudadispley();
    return false;
  }

  return true;
}

function mudadispley() {
  document.getElementById("alert").style.display = "flex";
}


function habilitarbotao() {

  if (typeof maybeObject != "btn-busca") {
    document.getElementById("btn-busca").disabled = 0;
  }

  document.getElementById("btnincluir").disabled = 1;
  document.getElementById("btnconfirmar").disabled = 0;
  document.getElementById("btncancelar").disabled = 0;
 
}

function desabilitarbotao() {
  if (typeof maybeObject != "btn-busca") {
    document.getElementById("btn-busca").disabled = 1;
  }
  document.querySelector("#btncancelar").removeAttribute("disabled");

  document.getElementById("btnincluir").disabled = true;
  document.getElementById("btnconfirmar").disabled = false;
  document.getElementById("btncancelar").disabled = false;
}


function incluirregistro() {          // BOTÃO INCLUIR
  document.getElementById("cdescricao").disabled = 0;
  document.getElementById("cvalor").disabled = 0;

  document.getElementById('cdescricao').value='';
  document.getElementById('cvalor').value='0.00';
  document.getElementById('timagem').src='img/sem-imagem.jpg';
  document.getElementById('cdescricao').focus();

  habilitarbotao();
}

function cancelaregistro() {
  document.getElementById("cdescricao").disabled = 1;
  document.getElementById("cvalor").disabled = 1;

  desabilitarbotao();
  carregaacompa();
}

function excluirregistro()
{
  var x;
  var r=confirm("Confirma a Excluisão!");
  if (r==true)
  {
    x="você pressionou OK!";
  }
  else
  {
    x="Você pressionou Cancelar!";
  }
  document.getElementById("card-body").innerHTML=x;
}

var filtroTeclas = function(event) {
  return ((event.charCode >= 48 && event.charCode <= 57) || (event.keyCode == 45 || event.charCode == 46))
}


// FORMATO DE MOEDA

function moeda(a, e, r, t) {
  let n = "",
     h = j = 0,
     u = tamanho2 = 0,
     l = ajd2 = "",
     o = window.Event ? t.which : t.keyCode;

  if (13 == o || 8 == o)
      return !0;
  
  if (n = String.fromCharCode(o),
      -1 == "0123456789".indexOf(n))
    return !1;
  
  for (u = a.value.length,
    h = 0; h < u && ("0" == a.value.charAt(h) || a.value.charAt(h) == r); h++);
   
  for (l = ""; h < u; h++) - 1 != "0123456789".indexOf(a.value.charAt(h)) && (l += a.value.charAt(h));
    if (l += n, 0 == (u = l.length) && (a.value = ""), 1 == u && (a.value = "0" + r + "0" + l), 2 == u && (a.value = "0" + r + l), u > 2) {
      for (ajd2 = "",
        j = 0,
        h = u - 3; h >= 0; h--)
        3 == j && (ajd2 += e,
        j = 0),
        ajd2 += l.charAt(h),
        j++;
      
      for (a.value = "",
        tamanho2 = ajd2.length,
        h = tamanho2 - 1; h >= 0; h--)
        a.value += ajd2.charAt(h);
        a.value += r + l.substr(u - 2, u)

    }
    return !1
}

// FORMATAR LETRAS EM MAIUSCULAS

function maiuscula(e){
  var ss = e.target.selectionStart;
    var se = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase();
    e.target.selectionStart = ss;
    e.target.selectionEnd = se;
}