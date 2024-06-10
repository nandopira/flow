/******************************************************************************
  Verifica se é número. Retorna true ou false
******************************************************************************/
function validarNumero(n){
  var x = /\D/;
  return !(x.test(n));
}	


/******************************************************************************
  Valida o CPF. Retorna true ou false
  
	fonte: http://www.pcforum.com.br/cgi/yabb/YaBB.cgi?board=cgi;action=display;num=1090001360
******************************************************************************/
function validarCPF(cpf) {
  var numeros, digitos, soma, i, resultado, digitos_iguais;
  digitos_iguais = 1;

  if (cpf.length < 9) return false;

  // preenche com 0 a esquerda até completar 11 caracteres
  for (i = 1; i <= (11-cpf.length); i++){
    cpf = '0' + cpf;
  }

  for (i = 0; i < cpf.length - 1; i++)
    if (cpf.charAt(i) != cpf.charAt(i + 1)){
      digitos_iguais = 0;
      break;
    }
    if (!digitos_iguais){
      numeros = cpf.substring(0,9);
      digitos = cpf.substring(9);
      soma = 0;
      for (i = 10; i > 1; i--)
        soma += numeros.charAt(10 - i) * i;
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0))
        return false;
      numeros = cpf.substring(0,10);
      soma = 0;
      for (i = 11; i > 1; i--)
        soma += numeros.charAt(11 - i) * i;
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(1))
        return false;
      return true;
    
    } 
    else
      return false;
}


/******************************************************************************
  Valida o CNPJ. Retorna true ou false
******************************************************************************/
function validarCNPJ(cnpj){
  var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais;
  digitos_iguais = 1;
    
  if (cnpj.length < 11)
    return false;

  for (i = 0; i < cnpj.length - 1; i++)
    if (cnpj.charAt(i) != cnpj.charAt(i + 1)){
      digitos_iguais = 0;
      break;
    }
    if (!digitos_iguais){
      tamanho = cnpj.length - 2
      numeros = cnpj.substring(0,tamanho);
      digitos = cnpj.substring(tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--){
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) pos = 9;
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(0))
        return false;
      tamanho = tamanho + 1;
      numeros = cnpj.substring(0,tamanho);
      soma = 0;
      pos = tamanho - 7;
      for (i = tamanho; i >= 1; i--){
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) pos = 9;
      }
      resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
      if (resultado != digitos.charAt(1))
        return false;
      return true;
    }
    else
      return false;
} 


/******************************************************************************
  Formata um número seguindo um padrao.
  
  Utilização:
  onKeyUp="javascript:formatarNumero(this, '00000-000')"
******************************************************************************/	
function formatarNumero(obtText, padrao){
	var tamanho = obtText.value.length;
	
	var saida = padrao.substring(0,1);
	
	var texto = padrao.substring(tamanho);
	
	if(texto.substring(0,1) != saida) {
		obtText.value += texto.substring(0,1);
	}
}	


/******************************************************************************
  Mostra um erro
  
  Dependências: jquery, jquery-ui, jquery-block  
******************************************************************************/	
function mostrarErro(mensagem, mobile) {
	
  if (mobile) {
	  var x =        
	      '<p style="color:#cd0a0a">'+
	          '<span class="ui-icon ui-icon-alert"></span>' +
	          mensagem +
	      '</p>'+        
	      '<div align="center"><input type="button" value=" Fechar " onclick="$.unblockUI();"></div>';        
	  
	  $.blockUI.defaults.css = {};
	  $.blockUI({theme:true, themedCSS:{width:"100%",top:"20%",left:'0%'}, title:'Erro', message:x, showOverlay:false});	  
	  
  }	else{
	  var x =        
	      '<p style="color:#cd0a0a">'+
	          '<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' +
	          mensagem +
	      '</p>'+        
	      '<div align="center"><input type="button" value=" Fechar " onclick="$.unblockUI();"></div>';        
	  
	  $.blockUI.defaults.css = {};
	  $.blockUI({theme:true, themedCSS:{width:"40%",top:"20%",left:'30%'}, title:'Erro', message:x, showOverlay:false});
  }
}


/******************************************************************************
  Mostra uma mensagem
  
  Dependências: jquery, jquery-ui, jquery-block  
******************************************************************************/	
function mostrarMensagem(mensagem,mobile) {
  

  if (mobile) {
	  var x =        
	      '<p>'+
	          '<span class="ui-icon ui-icon-info"></span>' +
	          mensagem +
	      '</p>'+        
	      '<div align="center"><input type="button" value=" Fechar " onclick="$.unblockUI();"></div>';
	  
	  $.blockUI.defaults.css = {};	  
	  $.blockUI({theme:true, themedCSS:{width:"100%",top:"20%",left:'0%'}, title:'Mensagem', message:x, showOverlay:false});
  } else {
	  var x =        
	      '<p>'+
	          '<span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>' +
	          mensagem +
	      '</p>'+        
	      '<div align="center"><input type="button" value=" Fechar " onclick="$.unblockUI();"></div>';
	  
	  $.blockUI.defaults.css = {};
	  $.blockUI({theme:true, themedCSS:{width:"40%",top:"20%",left:'30%'}, title:'Mensagem', message:x, showOverlay:false});
  }
}


/******************************************************************************
  Mostra uma mensagem e bloqueia a tela até executar o comando $.unblockUI();
  ou exibir outra mensagem
  
  Dependências: jquery, jquery-ui, jquery-block  
******************************************************************************/	
function mostrarMensagemAguardar() {		
	$.blockUI({
		theme:true, 
		title:'Aguarde...',
		message:'<div align="center"><img src="data:image/gif;base64,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" border="0"/></div>',
		
		timeout: dwr.engine._timeout * 1.5, // espera no máximo 1.5x o timeout do dwr
		onUnblock: function(){mostrarErro('Ocorreu um erro inesperado!');}
	});	
}

/******************************************************************************
	Mostra uma mensagem para aguardar sem overlay

	Dependências: jquery, jquery-ui, jquery-block  
******************************************************************************/	
function mostrarMensagemAguardarSemOverlay() {	
	$.blockUI({
		theme:true, 
		title:'Aguarde...',
		message:'<div align="center"><img src="images/ajaxLoaderPeq.gif" border="0"/></div>',
		timeout: dwr.engine._timeout * 1.5, // espera no máximo 1.5x o timeout do dwr
		onUnblock: function(){mostrarErro('Ocorreu um erro inesperado!');},
		showOverlay:false
	});	
}

/******************************************************************************
	Mostra uma mensagem e bloqueia a tela até executar o comando $.unblockUI();
	ou exibir outra mensagem
	
	Dependências: jquery, jquery-ui, jquery-block  
******************************************************************************/	
function desbloquearTela() {
	$.unblockUI();
}

/******************************************************************************
	Funções de janela modal
	
	Dependências: jquery, fancybox  
******************************************************************************/	
var janelaModal = {
	abrir : function(my_href, my_title, my_width, my_height) {				
		// cria a div da tela
		$("#divJanelaModal").remove();
		$("<div id='divJanelaModal' title='" + my_title + "'><iframe src='" + my_href + "' width='100%' height='100%' marginwidth='0' marginheight='0' scrolling='auto' frameborder='0' allowtransparency='true'></iframe></div>").appendTo("body");		
		
		// mostra o modal
		if(idioma.obter()==idioma.lang_br){
			$("#divJanelaModal").dialog({
				height: my_height,
				width: my_width,
				closeOnEscape: true,
				modal: true,
				resizable: true,
				buttons: {
					"Fechar": function() {$(this).dialog("close");}
				}
			});			
			
		} else {
			$("#divJanelaModal").dialog({
				height: my_height,
				width: my_width,
				closeOnEscape: true,
				modal: true,
				resizable: true,
				buttons: {
					"Close": function() {$(this).dialog("close");}
				}
			});			
		}
	},
	
	fechar : function() {
		$("#divJanelaModal").dialog("close");
	}
}

/* 
	This script and many more are available free online at
	The JavaScript Source!! http://javascript.internet.com
	Created by: Justas | http://www.webtoolkit.info/ 
	
	Obs: Adicionado o método param
*/
var url = {
	param : function (nomeParametro) {
		var results = new RegExp('[\\?&]' + nomeParametro + '=([^&#]*)').exec(window.location.href);
		if (!results) {return '';}
		return url.decode(results[1]) || 0;
	},
		
 	// public method for URL encoding
 	encode : function (string) {
 		 return escape(this._utf8_encode(string));
 	},

 	// public method for URL decoding
	decode : function (string) {
 	 	return this._utf8_decode(unescape(string));
 	},

 	// private method for UTF-8 encoding
 	_utf8_encode : function (string) {
  		string = string.replace(/\r\n/g,"\n");
 	 	var utftext = "";

  		for (var n = 0; n < string.length; n++) {
   			var c = string.charCodeAt(n);
   			if (c < 128) {
    				utftext += String.fromCharCode(c);
 			} else if((c > 127) && (c < 2048)) {
  				utftext += String.fromCharCode((c >> 6) | 192);
  				utftext += String.fromCharCode((c & 63) | 128);
 			} else {
  				utftext += String.fromCharCode((c >> 12) | 224);
  				utftext += String.fromCharCode(((c >> 6) & 63) | 128);
 	 			utftext += String.fromCharCode((c & 63) | 128);
 			}
 	}

		return utftext;
	},

 	// private method for UTF-8 decoding
 	_utf8_decode : function (utftext) {
 		 var string = "";
 		 var i = 0;
 		 var c = c1 = c2 = 0;

  		while ( i < utftext.length ) {
  			 c = utftext.charCodeAt(i);
   			if (c < 128) {
    				string += String.fromCharCode(c);
    				i++;
  			 } else if((c > 191) && (c < 224)) {
 				   c2 = utftext.charCodeAt(i+1);
    				string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));
    				i += 2;
  			 } else {
 				   c2 = utftext.charCodeAt(i+1);
    				c3 = utftext.charCodeAt(i+2);
    				string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
   				 i += 3;
 			  }
		  }
		return string;
	 }
}

/* 
	Script baseado em:
	http://www.trirand.com/blog/?page_id=393/help/export-jqgrid-data-to-excel-solution-that-worked-for-me/
	
	exemplo de uso: jqgridUtil.criarBotaoExportar(idTabela);
*/
var jqgridUtil = {
	// Cria o botão para exportar os dados do grid em excel
	criarBotaoExportar:function (idTabela) {		
		jQuery("#"+idTabela).jqGrid('navButtonAdd',"#div_"+idTabela,{
			caption:"",
			title:"Exportar",
			buttonicon:"ui-icon-extlink",
			onClickButton:function(){
				// cria a div da tela
				$("#grid_modal_exportar").remove();
				$('<div id="grid_modal_exportar" title="Exportar..."><form name="grid_modal_exportar_form" id="grid_modal_exportar_form">Nome do Arquivo: <input type="text" name="exportFileName" id="exportFileName" value="gridExport.csv"><input type="hidden" name="exportBuffer"></form></div>').appendTo("body");

				// mostra o modal
				$("#grid_modal_exportar").dialog({
					height: 130,
					closeOnEscape: true,
					modal: true,
					resizable: false,
					buttons: {
						"Exportar": function() {
							if($("#exportFileName").val()==''){
								alert("Informe o nome do arquivo!");
								return;
							}
							
							// verifica se há a coluna de numeração (se tiver, ignorar a primeira coluna)
							var rownumbersAtivo = jQuery("#"+idTabela).jqGrid("getGridParam","rownumbers");
							var colunaInicial = (rownumbersAtivo?1:0);				
							
							// obtemos os nomes fictícios das colunas
							var colNames = jQuery("#"+idTabela).jqGrid("getGridParam","colNames");
							
							// obtemos os nomes reais das colunas
							var colModel = jQuery("#"+idTabela).jqGrid("getGridParam","colModel");
							
							var dataOut = "";
							var delimitador = ";";
											
							// exportamos os nomes fictícios das colunas
							for(i=colunaInicial;i < colNames.length;i++){										
								dataOut = dataOut + "\"" + colNames[i] + "\"" + delimitador;
							}
							dataOut = dataOut + "\n";
							
							var rowID = jQuery("#"+idTabela).jqGrid('getDataIDs');

							// exportamos os dados exibidos no grid
							for(i=0;i < rowID.length;i++){
								rowData = jQuery("#"+idTabela).jqGrid('getRowData',rowID[i]);
								
								for(j=colunaInicial;j<colModel.length;j++){
									dataOut = dataOut + "\"" + rowData[colModel[j].name] + "\"" + delimitador;
								}
								dataOut = dataOut + "\n";
							}
							
							if(rowID.length > 0){
								// criamos um form no body para submeter os dados
								//$('<form name="formExport" id="formExport"><input type="hidden" name="exportBuffer"></form>').appendTo("body"); 
								
								document.grid_modal_exportar_form.exportBuffer.value = dataOut;
								document.grid_modal_exportar_form.method='POST';
								document.grid_modal_exportar_form.action='webGridExport.jsp?print=s';
								document.grid_modal_exportar_form.target='_blank';
								document.grid_modal_exportar_form.submit();
								
								$('#grid_modal_exportar_form').remove();
								$(this).dialog("close");
							} else {
								mostrarMensagem('Não há dados a exportar!');
							}
						},
						"Fechar": function() {$(this).dialog("close");}
					}
				});	
			} 
		});
	},
	
	// Cria o botão para alterar o agrupamento
	criarBotaoAgrupar:function (idTabela) {		
		jQuery("#"+idTabela).jqGrid('navButtonAdd',"#div_"+idTabela,{
			caption:"",
			title:"Agrupar",
			buttonicon:"ui-icon-carat-2-n-s",
			onClickButton:function(){				
				// verifica se há a coluna de numeração (se tiver, ignorar a primeira coluna)
				var rownumbersAtivo = jQuery("#"+idTabela).jqGrid("getGridParam","rownumbers");
				
				if(rownumbersAtivo){					
					alert('Função não disponível quando rownumbers: true!');
					return;
				}
				
				// obtemos os nomes fictícios das colunas
				var colNames = jQuery("#"+idTabela).jqGrid("getGridParam","colNames");
				
				// obtemos os nomes reais das colunas
				var colModel = jQuery("#"+idTabela).jqGrid("getGridParam","colModel");	
				
				// cria a div da tela
				$("#grid_modal_agrupar").remove();
				$('<div id="grid_modal_agrupar" title="Agrupar...">Campo: <select id="grid_modal_agrupar_select"></select></div>').appendTo("body"); 								
				
				// monta o combo
				$("#grid_modal_agrupar_select").empty();
				dwr.util.addOptions("grid_modal_agrupar_select", [{id:'', name:'- Nenhum -'}], "id", "name");
				
				for(i=0;i < colNames.length;i++){
					if(!colModel[i].hidden){						
						dwr.util.addOptions("grid_modal_agrupar_select", [{id:colModel[i].name, name:colNames[i]}], "id", "name");					 
					}
				}
				
				// seleciona
				var campoAgrupado = jQuery("#"+idTabela).jqGrid("getGridParam","groupingView").groupField;								
				$("#grid_modal_agrupar_select").val(campoAgrupado);
				
				$("#grid_modal_agrupar_select").change(function(){
					var valorSelecionado = $(this).val();
					
					if(valorSelecionado == "") {
						jQuery("#"+idTabela).jqGrid('groupingRemove',true);
					} else {
						jQuery("#"+idTabela).jqGrid('groupingGroupBy',valorSelecionado);
					}
				});

				// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
				$("#dialog:ui-dialog").dialog("destroy");

				// mostra o modal
				$("#grid_modal_agrupar").dialog({
					height: 110,
					closeOnEscape: true,
					modal: true,
					resizable: false,
					buttons: {
						"Resetar": function() {jQuery("#"+idTabela).jqGrid('groupingRemove',true);$("#grid_modal_agrupar_select").val("");},
						"Fechar": function() {$(this).dialog("close");}
					}
				});				
			} 
		});
	},
	
	// cria o botão de seleção de colunas
	criarBotaoSelecionarColunas: function (idTabela){
		jQuery("#"+idTabela).jqGrid('navButtonAdd',"#div_"+idTabela,{
			caption: "",
			title: "Selecionar Colunas...",
			onClickButton : function (){
				jQuery("#"+idTabela).jqGrid('columnChooser');
			}
		});		
	}
	
}



/*
* @Copyright (c) 2010 Ricardo Andrietta Mendes - eng.rmendes@gmail.com 
* https://sites.google.com/site/rmendescode/jquery/number_format
* 
* How to use it:
* var formated_value = util.formatarNumero(final_value);
* 
* Advanced:
* var formated_value = util.formatarNumero(final_value, 
* 													{
* 													numberOfDecimals:3,
* 													decimalSeparator: '.',
* 													thousandSeparator: ',',
* 													symbol: 'R$'
* 													});
*/
var util = { //indica que está sendo criado um plugin
	
	formatarNumero: function(numero, params) //indica o nome do plugin que será criado com os parametros a serem informados
		{ 
		//parametros default
		var sDefaults = 
			{			
			numberOfDecimals: 2,
			decimalSeparator: ',',
			thousandSeparator: '.',
			symbol: ''
			}
        
		if(numero != null){
		
		//função do jquery que substitui os parametros que não foram informados pelos defaults
		var options = jQuery.extend(sDefaults, params);

		//CORPO DO PLUGIN
		var number = numero; 
		var decimals = options.numberOfDecimals;
		var dec_point = options.decimalSeparator;
		var thousands_sep = options.thousandSeparator;
		var currencySymbol = options.symbol;
		
		var exponent = "";
		var numberstr = number.toString ();
		var eindex = numberstr.indexOf ("e");
		if (eindex > -1)
		{
		exponent = numberstr.substring (eindex);
		number = parseFloat (numberstr.substring (0, eindex));
		}
		
		if (decimals != null)
		{
		var temp = Math.pow (10, decimals);
		number = Math.round (number * temp) / temp;
		}
		var sign = number < 0 ? "-" : "";
		var integer = (number > 0 ? 
		  Math.floor (number) : Math.abs (Math.ceil (number))).toString ();
		
		var fractional = number.toString ().substring (integer.length + sign.length);
		dec_point = dec_point != null ? dec_point : ".";
		fractional = decimals != null && decimals > 0 || fractional.length > 1 ? 
				   (dec_point + fractional.substring (1)) : "";
		if (decimals != null && decimals > 0)
		{
		for (i = fractional.length - 1, z = decimals; i < z; ++i)
		  fractional += "0";
		}
		
		thousands_sep = (thousands_sep != dec_point || fractional.length == 0) ? 
					  thousands_sep : null;
		if (thousands_sep != null && thousands_sep != "")
		{
		for (i = integer.length - 3; i > 0; i -= 3)
		  integer = integer.substring (0 , i) + thousands_sep + integer.substring (i);
		}
		
		if (options.symbol == '')
		{
		return sign + integer + fractional + exponent;
		}
		else
		{
		return currencySymbol + ' ' + sign + integer + fractional + exponent;
		}
		}
		//FIM DO CORPO DO PLUGIN	
		
	},
	
	// método adicionado
	desformatarNumero: function(numero){
		// verifica se tem ponto e vírgula
		if(numero.indexOf(".") > 0 && numero.indexOf(",") > 0){				
			var groupSeparator = '.';
			
			// separador decimal é .
			if(numero.lastIndexOf(".") > numero.lastIndexOf(",")){										
				groupSeparator = ',';
			}				
			
			// retira o caracter agrupador
			while (numero.indexOf(groupSeparator) > 0) {
				numero = numero.replace(groupSeparator,'');
			}
		}
		
		numero = numero.replace(',', '.');
		
		return numero;
	}
}

// manipulação de cookies
var cookie = { 
	create: function (name,value,days) {
		if (days) {
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}
	,
	read: function (name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}
	,
	erase: function (name) {
		createCookie(name,"",-1);
	}
}

/*
 * Métodos para troca de idioma. Uso:
 * 1 - chamar o método idioma.inicializar() ao carregar o form
 * 2 - criar botões de troca de idioma, usando o método idioma.trocar();
 * 3 - utilizar tags persinalizadas, por ex: <a href='teste' lang_en="Help" lang_br="Ajuda">Ajuda</a>
 */
var idioma = {	
	inicializar: function() {
		var my_idioma = url.param("language");
		if(my_idioma == ""){
			my_idioma = idioma.obter();		
		}
		
		if(my_idioma != "" && my_idioma != null){
			idioma.trocar(my_idioma);
		}
	},
	obter: function(){
		var my_idioma = cookie.read("language");
		if(my_idioma == null) my_idioma = 'br';
		return my_idioma;
	},
	trocar: function(novo_idioma){ // faz a troca de idioma	
		cookie.create("language",novo_idioma,0);
		
		$('a,p,li,legend,label,span').each(function(){		
			if($(this).attr("lang_" + novo_idioma)!=undefined){			
				$(this).html($(this).attr("lang_" + novo_idioma));
			}
		});	

		$('input[type="button"],input[type="submit"]').each(function(){		
			if($(this).attr("lang_" + novo_idioma)!=undefined){			
				$(this).val($(this).attr("lang_" + novo_idioma));
			}
		});	
	},
	lang_br: 'br',	
	lang_en: 'en'	
}