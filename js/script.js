function carregahome() {
  window.location = "principal.html";
}

function carregaacompa() {
  window.location = "acompanhamento.html";
}

function carregaadicionais() {
  window.location = "adicionais.html";
}

function carregacategoria() {
  window.location = "categoria.html";
}

function carregafonecedores() {
  window.location = "fornecedores.html";
}

function carregagarcom() {
  window.location = "garcom.html";
}

function carregamesa() {
  window.location = "mesa.html";
}

function carregaobservacoes() {
  window.location = "observacoes.html";
}

function carregaprodutos() {
  window.location = "produtos.html";
}

function carregasetores() {
  window.location = "setores.html";
}

function carregausuarios() {
  window.location = "usuarios.html";
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
  document.getElementById("btnalterar").disabled = 1;
  document.getElementById("btnexcluir").disabled = 1;
  document.getElementById("btnconfirmar").disabled = 0;
  document.getElementById("btncancelar").disabled = 0;
}

function desabilitarbotao() {
  if (typeof maybeObject != "btn-busca") {
    document.getElementById("btn-busca").disabled = 1;
  }

  document.getElementById("btnincluir").disabled = 0;
  document.getElementById("btnalterar").disabled = 0;
  document.getElementById("btnexcluir").disabled = 0;
  document.getElementById("btnconfirmar").disabled = 1;
  document.getElementById("btncancelar").disabled = 1;
}


function incluirregistro() {
  document.getElementById("cdescricao").disabled = 0;
  document.getElementById("cvalor").disabled = 0;

  habilitarbotao();

  cdescricao.focus();
}

function cancelaregistro() {
  document.getElementById("cdescricao").disabled = 1;
  document.getElementById("cvalor").disabled = 1;

  desabilitarbotao();

  cdescricao.html('');
  cvalor.html('');
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