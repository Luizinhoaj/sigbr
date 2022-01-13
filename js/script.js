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

  document.getElementById("btn-incl").disabled = 1;
  document.getElementById("btn-alte").disabled = 1;
  document.getElementById("btn-excl").disabled = 1;
  document.getElementById("btn-conf").disabled = 0;
  document.getElementById("btn-canc").disabled = 0;
}

function desabilitarbotao() {
  if (typeof maybeObject != "btn-busca") {
    document.getElementById("btn-busca").disabled = 1;
  }

  document.getElementById("btn-incl").disabled = 0;
  document.getElementById("btn-alte").disabled = 0;
  document.getElementById("btn-excl").disabled = 0;
  document.getElementById("btn-conf").disabled = 1;
  document.getElementById("btn-canc").disabled = 1;
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
 

  // ---------Responsive-navbar-active-animation-----------
function test(){
	var tabsNewAnim = $('#navbarSupportedContent');
	var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
	var activeItemNewAnim = tabsNewAnim.find('.active');
	var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
	var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
	var itemPosNewAnimTop = activeItemNewAnim.position();
	var itemPosNewAnimLeft = activeItemNewAnim.position();
	$(".hori-selector").css({
		"top":itemPosNewAnimTop.top + "px", 
		"left":itemPosNewAnimLeft.left + "px",
		"height": activeWidthNewAnimHeight + "px",
		"width": activeWidthNewAnimWidth + "px"
	});
	$("#navbarSupportedContent").on("click","li",function(e){
		$('#navbarSupportedContent ul li').removeClass("active");
		$(this).addClass('active');
		var activeWidthNewAnimHeight = $(this).innerHeight();
		var activeWidthNewAnimWidth = $(this).innerWidth();
		var itemPosNewAnimTop = $(this).position();
		var itemPosNewAnimLeft = $(this).position();
		$(".hori-selector").css({
			"top":itemPosNewAnimTop.top + "px", 
			"left":itemPosNewAnimLeft.left + "px",
			"height": activeWidthNewAnimHeight + "px",
			"width": activeWidthNewAnimWidth + "px"
		});
	});
}
$(document).ready(function(){
	setTimeout(function(){ test(); });
});
$(window).on('resize', function(){
	setTimeout(function(){ test(); }, 500);
});
$(".navbar-toggler").click(function(){
	$(".navbar-collapse").slideToggle(300);
	setTimeout(function(){ test(); });
});



// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
	// Get current path and find target link
	var path = window.location.pathname.split("/").pop();

	// Account for home page with empty path
	if ( path == '' ) {
		path = 'index.html';
	}

	var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
	// Add active class to target link
	target.parent().addClass('active');
});