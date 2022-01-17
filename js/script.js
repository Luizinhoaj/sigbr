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

function cadformulario() {
  var descricao = $('#cdescricao');
  var valor = $('#cvalor');
  var erro = $('.alert');
  var campo = $('#campo-erro');

  $('.is-invalid').removeClass('is-invalid');
  // removendo o elemento da tela sempe que tentar submeter o formulario
  erro.addClass('d-none');

  if(descricao.val() == ''){
    erro.removeClass('d-none');
    campo.html('Descrição');
      // Nome do campo que não foi preechido
    descricao.focus();
    descricao.addClass('is-invalid');
    return false;
  }

  if(valor.val() == ''){
    erro.removeClass('d-none');
    campo.html('Valor');
      // Nome do campo que não foi preechido
    valor.focus();
    valor.addClass('is-invalid');
    return false;
  }

  return true;
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


(function($) {
  $.fn.menumaker = function(options) {  
   var cssmenu = $(this), settings = $.extend({
     format: "dropdown",
     sticky: false
   }, options);
   return this.each(function() {
     $(this).find(".button").on('click', function(){
       $(this).toggleClass('menu-opened');
       var mainmenu = $(this).next('ul');
       if (mainmenu.hasClass('open')) { 
         mainmenu.slideToggle().removeClass('open');
       }
       else {
         mainmenu.slideToggle().addClass('open');
         if (settings.format === "dropdown") {
           mainmenu.find('ul').show();
         }
       }
     });
     cssmenu.find('li ul').parent().addClass('has-sub');
  multiTg = function() {
       cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
       cssmenu.find('.submenu-button').on('click', function() {
         $(this).toggleClass('submenu-opened');
         if ($(this).siblings('ul').hasClass('open')) {
           $(this).siblings('ul').removeClass('open').slideToggle();
         }
         else {
           $(this).siblings('ul').addClass('open').slideToggle();
         }
       });
     };
     if (settings.format === 'multitoggle') multiTg();
     else cssmenu.addClass('dropdown');
     if (settings.sticky === true) cssmenu.css('position', 'fixed');
  resizeFix = function() {
    var mediasize = 1000;
       if ($( window ).width() > mediasize) {
         cssmenu.find('ul').show();
       }
       if ($(window).width() <= mediasize) {
         cssmenu.find('ul').hide().removeClass('open');
       }
     };
     resizeFix();
     return $(window).on('resize', resizeFix);
   });
    };
  })(jQuery);
  
  (function($){
  $(document).ready(function(){
  $("#cssmenu").menumaker({
     format: "multitoggle"
  });
  });
  })(jQuery);
 
