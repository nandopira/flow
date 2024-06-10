var qtdeDiasAlertaExpiracaoSenha = 10;

function iniciarForm(){
	verificarSessao();

	$("#loginUsuario").focus();

	$("#botaoLogin").click(function(){
		if ($("#formLogin").validationEngine('validate')) {
			autenticar();
		}
	});

	// parametro externo para abrir popup específico
	var acao = url.param("acao");
	if(acao == "formCriarSenhaUnica"){
		formCriarSenhaUnica();
	}
	else if(acao == "formAjuda"){
		formAjuda();
	}
	else if(acao == "esqueciSenha"){
		formEsqueciSenha();
	}
	else if(acao == "primeiroAcesso"){
		formPrimeiroAcesso();
	}
	else if(acao == "formAlterarSenhaPublico"){
		formAlterarSenhaPublico();
	}

	// troca de idioma
	idioma.inicializar();
}

function verificarSessao(){
	verificaSessaoCallBack(function(verificarSessaoSaida){
		desbloquearTela();

		if(verificarSessaoSaida.sessaoAtiva){
			montarTela(verificarSessaoSaida.tipoUsuario);
		}
	});
}

function verificaSessaoCallBack(call){
	mostrarMensagemAguardar();
	
	setTimeout(function(){
		UsuarioControleDWR.verificarSessao({
			callback: function(verificarSessaoSaida ){
				call(verificarSessaoSaida);
			},
			errorHandler: function(errorString, exception) {
				mostrarErro(errorString);
			}
		});
	},100);
}

function autenticar(){
	mostrarMensagemAguardar();

	setTimeout(function(){autenticarTimeout();},100);
}

function autenticarTimeout(){
	UsuarioControleDWR.autenticarUsuario(
			$.trim($("#loginUsuario").val()),
			$.trim($("#senhaUsuario").val()),{
		async:false,
		callback:function(autenticarSaida){
			if(gtag !== undefined){
				gtag('event', 'login', {'event_category':window.location.hostname, 'event_label':$("#loginUsuario").val()});
			}
			
			$("input[type=text],input[type=password]").val(""); // limpa os campos
			//$("#divAutenticadoNome").html(autenticarSaida.nomeUsuario + ' (' + autenticarSaida.emailUsuario + ') | ');
			desbloquearTela();
			montarTela(autenticarSaida.tipoUsuario);
			verificarNecessitaAtualizarDadosContato();
		},
		errorHandler:function(errorString, exception) {
			mostrarErro(errorString);
		}
	});
}

function montarTela(tipoUsuario){
	// redirect
	var callback_url = url.param('callback_url');
	if(callback_url != ''){
		setTimeout(function(){window.open(callback_url,'_self');},500);
	}

	// usuários externos
	if(tipoUsuario == 'E'){
		$('#spanAlterarUsuarioExterno').show();
		$('#spanAlterarEmail').hide();
		//$('#spanAlterarEmail').hide();
	} else {
		$('#spanAlterarUsuarioExterno').hide();
		$('#spanAlterarEmail').show();
	}

	$('#divLogin').hide();
	$('#divAutenticado').show();	
	$('.clsAutenticado').show();	

	obterDadosUsuario();

	verificarExpiracaoSenha();
	listarSistema();
	listarSistemaOauth();
	//listarServico();
}

function obterDadosUsuario(){
	UsuarioControleDWR.obterUsuario({
		async:false,
		callback:function(usuarioBean){
			if(usuarioBean != null){
				$("#spanNomeUsuario").html(usuarioBean.nomeUsuario + " (" + usuarioBean.loginUsuario + ") | ");
			}
			desbloquearTela();
		},
		errorHandler:function(errorString, exception) {
			mostrarErro("Erro ao obterDadosUsuario: " + errorString);
		}
	});
}

function listarSistema(){
	$("#divSistema").html("");

	UsuarioControleDWR.listarSistema({
		async:false,
		callback:function(listaSistema){
			var targ = " target='_blank' ";
			var mesmaPagina = (typeof IECOOKIEBUG != 'undefined');
			//Se sofre do bug de cookies do IE, não pode abrir o link numa nova janela
			if (mesmaPagina) targ = "";
			if(listaSistema != null && listaSistema.length > 0){
				if(idioma.obter()==idioma.lang_br){
					$("#divSistema").append("<p class='linha'>Sistemas Corporativos</p>");
				} else {
					$("#divSistema").append("<p class='linha'>Corporate Systems</p>");
				}
				for(var i=0; i < listaSistema.length; i++){
					var tmp = $("<li><a href='" + listaSistema[i].urlSistema + "' class='normal' "+ targ +"><strong>" + listaSistema[i].nomeSistema + "</strong> - " + listaSistema[i].descricaoSistema + "</a></li>")
						.appendTo("#divSistema")
						//decora cada link de sistema para testar se o usuário está logado, caso contrário redesenha a tela SEM os links de sistema
						.find(">:first-child");
					//caso o link nao seja aberto na mesma página, faz o refresh da lista de aplicações
					if (!mesmaPagina) tmp.click(function(e){verificaSessaoCallBack(function(verificarSessaoSaida){
							if (!verificarSessaoSaida.sessaoAtiva)
								e.preventDefault();
								//foi colocado um timeout porque no safari o redirect estava sendo executado antes do click no link
								setTimeout(function(){window.location='index.jsp';},1000);
						});})
					;
				}
			}
		},
		errorHandler:function(errorString, exception) {
			$("#divSistema").append("<div class='ui-state-highlight ui-corner-all' style='margin-top:10px; padding:5px;'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>Erro ao carregar os sistemas: "+errorString+"</div>");
		}
	});
}

function listarSistemaOauth(){
	$("#divSistemaOauth").html("");

	UsuarioControleDWR.listarSistemaOauth({
		async:false,
		callback:function(listaSistema){
			var targ = " target='_blank' ";
			var mesmaPagina = (typeof IECOOKIEBUG != 'undefined');
			//Se sofre do bug de cookies do IE, não pode abrir o link numa nova janela
			if (mesmaPagina) targ = "";
			if(listaSistema != null && listaSistema.length > 0){
				if(idioma.obter()==idioma.lang_br){
					$("#divSistemaOauth").append("<p class='linha'>Sistemas de Responsabilidade das Unidades / Órgãos / Setores</p>");
				} else {
					$("#divSistemaOauth").append("<p class='linha'>Systems of Units / Agencies / Sectors</p>");
				}
				for(var i=0; i < listaSistema.length; i++){
					var tmp = $("<li><a href='" + listaSistema[i].urlrnocnr + "' class='normal' "+ targ +"><strong>" + listaSistema[i].nomsiscnr + "</strong> - " + listaSistema[i].dscsiscnr + "</li>")
						.appendTo("#divSistemaOauth")
						//decora cada link de sistema para testar se o usuário está logado, caso contrário redesenha a tela SEM os links de sistema
						.find(">:first-child");
					//caso o link nao seja aberto na mesma página, faz o refresh da lista de aplicações
					if (!mesmaPagina) tmp.click(function(e){verificaSessaoCallBack(function(verificarSessaoSaida){
							if (!verificarSessaoSaida.sessaoAtiva)
								e.preventDefault();
								//foi colocado um timeout porque no safari o redirect estava sendo executado antes do click no link
								setTimeout(function(){window.location='index.jsp';},1000);
					});});
				}

				//$('#divPublico').hide();
			}
		},
		errorHandler:function(errorString, exception) {
			$("#divSistemaOauth").append("<div class='ui-state-highlight ui-corner-all' style='margin-top:10px; padding:5px;'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>Erro ao carregar os sistemas: "+errorString+"</div>");
		}
	});
}

function listarServico(){
	$("#divServico").html('<p><img src="data:image/gif;base64,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" border="0"/></div> carregando serviços...</p>');

	UsuarioControleDWR.listarServico({
		async:true,
		callback:function(listaServico){
			$("#divServico").html('');

			if(listaServico != null && listaServico.length > 0){
				if(idioma.obter()==idioma.lang_br){
					$("#divServico").append("<p class='linha'>Serviços</p>");
				} else {
					$("#divServico").append("<p class='linha'>Services</p>");
				}
				for(var i=0; i < listaServico.length; i++){
					$("<li><a href='" + listaServico[i].urlServico + "' class='normal' target='_blank'>" + listaServico[i].nomeServico + "</a></li>").appendTo("#divServico");
				}

				$('#divPublico').hide();
			}
		},
		errorHandler:function(errorString, exception) {
			$("#divServico").append("<div class='ui-state-highlight ui-corner-all' style='margin-top:10px; padding:5px;'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>Erro ao carregar os serviços: "+errorString+"</div>");
		}
	});
}

function removerUsuarioUspSistemaOauth(lgicnrwse, numseqsiscnr){
	UsuarioControleDWR.removerUsuarioUspSistemaOauth(lgicnrwse, numseqsiscnr,{
		async:false,
		callback:function(msg){
			listarSistemaOauth();
		},
		errorHandler:function(errorString, exception) {
			mostrarErro("Erro ao removerUsuarioUspSistemaOauth: " + errorString);
		}
	});
}

function verificarExpiracaoSenha(){
	UsuarioControleDWR.obterQtdeDiasExpiracaoSenha({
		async:false,
		callback:function(qtdeDias){
			// menor que zero = expirado, maior ou igual a 0 = dias restantes a expirar
			if(qtdeDias >= 0 && qtdeDias <= qtdeDiasAlertaExpiracaoSenha){
				formSenhaAvisoProxExpirar(qtdeDias);
			}
		},
		errorHandler:function(errorString, exception) {
			mostrarErro("Erro ao verificarExpiracaoSenha: " + errorString);
		}
	});
}

function verificarNecessitaAtualizarDadosContato(){
	$.get('api/contato/necessitaAtualizar',function(e){
		if(e && e.necessitaAtualizar && e.necessitaAtualizar=='S'){
			formAlterarContato();
		}
	});	
}

function formSenhaAvisoProxExpirar(qtdeDias){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webSenhaAvisoProxExpirar.jsp?qtdeDias="+qtdeDias,"Aviso",600,200);
	} else {
		janelaModal.abrir("webSenhaAvisoProxExpirar_en.jsp?qtdeDias="+qtdeDias,"Warning",600,200);
	}
}

function formCriarSenhaUnica(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webPrimeiroAcesso.jsp?nomsis=" + url.param("nomsis"),"Criar Senha Única",800,600);
	} else {
		janelaModal.abrir("webPrimeiroAcesso.jsp?nomsis=" + url.param("nomsis"),"Create Universal Password",800,600);
	}
}

function formPrimeiroAcesso(){
	window.open("https://id.usp.br/primeiro-acesso","_idusp");	
}

function formEsqueciSenha(){
	window.open("https://id.usp.br/senha-unica","_idusp");	
}

function formAlterarSenha(){
	formEsqueciSenha();
}

function formAlterarSenhaPublico(){
	formEsqueciSenha();
}

function formCadastreSe(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webUsuarioExternoInserir.jsp","Cadastre-se (Usuário externo sem No.USP)",800,600);
	} else {
		janelaModal.abrir("webUsuarioExternoInserir.jsp","Sign Up (External user without USP number)",800,600);
	}
}

function formAlterarEmail(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webEmailAlterar.jsp","Solicitação de Alteração Email",800,600);
	} else {
		janelaModal.abrir("webEmailAlterar.jsp","Email Change Request",800,600);
	}
}

function formAlterarUsuarioExterno(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webUsuarioExternoAlterar.jsp","Minha Conta",800,350);
	} else {
		janelaModal.abrir("webUsuarioExternoAlterar.jsp","My Account",800,350);
	}
}

function formAjuda(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webCriarSenhaAjuda.jsp","Ajuda","90%","600");
	} else {
		janelaModal.abrir("webCriarSenhaAjuda_en.jsp","Help","90%","600");
	}
}

function formSessao(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webSessaoListar.jsp","Gerenciar Sessão","80%","600");
	} else {
		janelaModal.abrir("webSessaoListar.jsp","Manage Sessions","80%","600");
	}
}

function formAlterarContato(){
	if(idioma.obter()==idioma.lang_br){
		janelaModal.abrir("webContatoAlterar.jsp","Atualizar dados de contato",800,500);
	} else {
		janelaModal.abrir("webContatoAlterar.jsp","Change contact details",800,500);
	}
}