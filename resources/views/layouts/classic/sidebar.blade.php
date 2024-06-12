<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!-- FreeStyle Menu v1.0RC by Angus Turnbull http://www.twinhelix.com -->
<script type="text/javascript" src="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/fsmenu.js"></script>

<!-- Demo CSS layouts for the list menu. Pick your favourite one and customise! -->
<!-- Remove all but one and change "alternate stylesheet" to "stylesheet" to enable -->
<link rel="stylesheet" type="text/css" id="listmenu-v" href="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/listmenu_v.css" title="Vertical 'Earth'">

<!-- Fallback CSS menu file allows list menu operation when JS is disabled. -->
<!-- This is automatically disabled via its ID when the script kicks in. -->
<link rel="alternate stylesheet" type="text/css" id="fsmenu-fallback" href="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/listmenu_fallback.css" disabled="">


<script type="text/javascript">
	//<![CDATA[

	var arrow = null;
	if (document.createElement && document.documentElement) {
		//arrow = document.createElement('span');
		//arrow.appendChild(document.createTextNode('>'));
		// Feel free to replace the above two lines with these for a small arrow image...
		arrow = document.createElement('img');
		arrow.src = 'https://uspdigital.usp.br/comumwebdev/imagens/icones/11/arrow_sub1.gif';
		arrow.style.borderWidth = '0';
		arrow.className = 'subind';
	}

	if ("[{codmnu=281, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Sistemas USP, nomobtweb=index.html, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=https://uspdigital.usp.br, numnivhie=1, linmnu=https://uspdigital.usp.br/index.html}, {codmnu=9167, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Sistema Administrativo, nomobtweb=webLogin.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=/administrativo, numnivhie=1, linmnu=/administrativo/webLogin.jsp}, {codmnu=10435, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Receitas - COVID19, nomobtweb=merReceitaRelatorioCOVID19.jsp, pmeobtweb=null, dscmnu=Mostra os recolhimentos efetuados a partir das fontes vinculadas à COVID-19., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merReceitaRelatorioCOVID19.jsp?codmnu=10435}, {codmnu=10436, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Despesas - COVID19, nomobtweb=merDespesasRelatorioCOVID19.jsp, pmeobtweb=null, dscmnu=Mostra as despesas efetuadas com embasamento legal relativo à COVID-19., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merDespesasRelatorioCOVID19.jsp?codmnu=10436}, {codmnu=195, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Licitações, nomobtweb=listarLicEditalAberto, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=listarLicEditalAberto?codmnu=195}, {codmnu=366, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Legislação, nomobtweb=legislacao, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=http://www.usp.br/df2/?q=node/17, numnivhie=1, linmnu=http://www.usp.br/df2/?q=node/17/legislacao}, {codmnu=196, codgrpweb=4, nomgrpweb=Acesso Público, stapai=S, stavrfnivseg=S, elmmnu=Patrimônio, nomobtweb=aiPatrimonio.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=aiPatrimonio.jsp?codmnu=196}, {codmnu=248, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Buscar, nomobtweb=aiPatrimonio.jsp, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=aiPatrimonio.jsp?codmnu=248}, {codmnu=246, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Disponíveis, nomobtweb=PatrimonioCampusUnidadeListar, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=PatrimonioCampusUnidadeListar?codmnu=246}, {codmnu=247, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Responsável, nomobtweb=aiResponsavel.jsp, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=aiResponsavel.jsp?codmnu=247}, {codmnu=197, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Acompanhar Boleto, nomobtweb=merBoletoBancarioAcompanhar.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merBoletoBancarioAcompanhar.jsp?codmnu=197}, {codmnu=4133, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Cursos / e_Convênios, nomobtweb=dwrConveniosPublicosListar.jsp, pmeobtweb=null, dscmnu=Consultar Convênios, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=dwrConveniosPublicosListar.jsp?codmnu=4133}, {codmnu=9502, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Pagamentos Fornecedores, nomobtweb=merPagamentosFornecedorListar.jsp, pmeobtweb=null, dscmnu=Lista as liquidações pagas ou a serem pagas num determinado período., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merPagamentosFornecedorListar.jsp?codmnu=9502}, {codmnu=10198, codgrpweb=5, nomgrpweb=MercúrioWeb, stapai=N, stavrfnivseg=N, elmmnu=Recibo de Pagamento de Serviços, nomobtweb=merDirfGfipReciboBeneficiario.jsp, pmeobtweb=null, dscmnu=Consultar Recibos de Pagamento de Serviços do beneficiário., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merDirfGfipReciboBeneficiario.jsp?codmnu=10198}]" != null && "[{codmnu=281, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Sistemas USP, nomobtweb=index.html, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=https://uspdigital.usp.br, numnivhie=1, linmnu=https://uspdigital.usp.br/index.html}, {codmnu=9167, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Sistema Administrativo, nomobtweb=webLogin.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=/administrativo, numnivhie=1, linmnu=/administrativo/webLogin.jsp}, {codmnu=10435, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Receitas - COVID19, nomobtweb=merReceitaRelatorioCOVID19.jsp, pmeobtweb=null, dscmnu=Mostra os recolhimentos efetuados a partir das fontes vinculadas à COVID-19., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merReceitaRelatorioCOVID19.jsp?codmnu=10435}, {codmnu=10436, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Despesas - COVID19, nomobtweb=merDespesasRelatorioCOVID19.jsp, pmeobtweb=null, dscmnu=Mostra as despesas efetuadas com embasamento legal relativo à COVID-19., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merDespesasRelatorioCOVID19.jsp?codmnu=10436}, {codmnu=195, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Licitações, nomobtweb=listarLicEditalAberto, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=listarLicEditalAberto?codmnu=195}, {codmnu=366, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Legislação, nomobtweb=legislacao, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=http://www.usp.br/df2/?q=node/17, numnivhie=1, linmnu=http://www.usp.br/df2/?q=node/17/legislacao}, {codmnu=196, codgrpweb=4, nomgrpweb=Acesso Público, stapai=S, stavrfnivseg=S, elmmnu=Patrimônio, nomobtweb=aiPatrimonio.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=aiPatrimonio.jsp?codmnu=196}, {codmnu=248, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Buscar, nomobtweb=aiPatrimonio.jsp, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=aiPatrimonio.jsp?codmnu=248}, {codmnu=246, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Disponíveis, nomobtweb=PatrimonioCampusUnidadeListar, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=PatrimonioCampusUnidadeListar?codmnu=246}, {codmnu=247, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Responsável, nomobtweb=aiResponsavel.jsp, pmeobtweb=null, dscmnu=null, codmnupai=196, staabt=N, urlsie=null, numnivhie=2, linmnu=aiResponsavel.jsp?codmnu=247}, {codmnu=197, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=S, elmmnu=Acompanhar Boleto, nomobtweb=merBoletoBancarioAcompanhar.jsp, pmeobtweb=null, dscmnu=null, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merBoletoBancarioAcompanhar.jsp?codmnu=197}, {codmnu=4133, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Cursos / e_Convênios, nomobtweb=dwrConveniosPublicosListar.jsp, pmeobtweb=null, dscmnu=Consultar Convênios, codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=dwrConveniosPublicosListar.jsp?codmnu=4133}, {codmnu=9502, codgrpweb=4, nomgrpweb=Acesso Público, stapai=N, stavrfnivseg=N, elmmnu=Pagamentos Fornecedores, nomobtweb=merPagamentosFornecedorListar.jsp, pmeobtweb=null, dscmnu=Lista as liquidações pagas ou a serem pagas num determinado período., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merPagamentosFornecedorListar.jsp?codmnu=9502}, {codmnu=10198, codgrpweb=5, nomgrpweb=MercúrioWeb, stapai=N, stavrfnivseg=N, elmmnu=Recibo de Pagamento de Serviços, nomobtweb=merDirfGfipReciboBeneficiario.jsp, pmeobtweb=null, dscmnu=Consultar Recibos de Pagamento de Serviços do beneficiário., codmnupai=null, staabt=N, urlsie=null, numnivhie=1, linmnu=merDirfGfipReciboBeneficiario.jsp?codmnu=10198}]" != '') {
		// Here's a menu object to control the above list of menu data:
		var listMenu = new FSMenu('listMenu', true, 'display', 'block', 'none');
		listMenu.hideDelay = 800;
		//listMenu.showDelay = 0;
		//listMenu.switchDelay = 125;
		//listMenu.cssLitClass = 'highlighted';
		//listMenu.showOnClick = 0;
		listMenu.hideOnClick = true;
		listMenu.animInSpeed = 0.5;
		listMenu.animOutSpeed = 0.5;
		listMenu.animations[listMenu.animations.length] = FSMenu.animFade;
		listMenu.animations[listMenu.animations.length] = FSMenu.animSwipeDown;
		addReadyEvent(new Function(
				'listMenu.activateMenu("listMenuRoot", arrow)'));
	}

	if ("true" != "false") {
		var listMenu2 = new FSMenu('listMenu2', true, 'display', 'block',
				'none');
		listMenu2.hideDelay = 800;
		listMenu2.hideOnClick = true;
		listMenu2.animInSpeed = 0.5;
		listMenu2.animOutSpeed = 0.5;
		listMenu2.animations[listMenu2.animations.length] = FSMenu.animFade;
		listMenu2.animations[listMenu2.animations.length] = FSMenu.animSwipeDown;
		addReadyEvent(new Function(
				'listMenu2.activateMenu("listMenuRoot2", arrow)'));
	} else {
		var listMenu3 = new FSMenu('listMenu3', true, 'display', 'block',
				'none');
		listMenu3.hideDelay = 800;
		listMenu3.hideOnClick = true;
		listMenu3.animInSpeed = 0.5;
		listMenu3.animOutSpeed = 0.5;
		listMenu3.animations[listMenu3.animations.length] = FSMenu.animFade;
		listMenu3.animations[listMenu3.animations.length] = FSMenu.animSwipeDown;
		addReadyEvent(new Function(
				'listMenu3.activateMenu("listMenuRoot3", arrow)'));
	}
	//]]>
</script>



<div id="layout_menu">

<ul class="menulist" id="listMenuRoot">
    <li class="menuHeader">Público</li>
    <li>
        <a href="{{ route('obra.mapa') }}" title='Obras - Status'>Obras - Status</a>
    </li>
</ul>

<div style="font-size: 7px">&nbsp;</div>

<!-- NAO AUTENTICADO -->


<!-- AUTENTICADO -->
<ul class="menulist" id="listMenuRoot2">
    <li class="menuHeader">Acesso Restrito</li>
    <li style="z-index: 1;">
        <a href="{{ route('projeto.index') }}">Obras</a>
        <ul id="listMenu-id-1" style="display: none; opacity: 0; overflow: visible;">
            <li><a href="{{ route('projeto.create') }}">Nova Construção</a></li>
            <li><a href="{{ route('projeto.create') }}">Nova Reforma</a></li>
            <li><a href="{{ route('projeto.index') }}">Consultar</a></li>
        </ul>
    </li>
    <li>
        <a href="{{ route('etapa.index') }}">Etapa</a>
        <ul>
            <li><a href="{{ route('etapa.create') }}">Novo registro</a></li>
            <li><a href="{{ route('projeto.index') }}">Consultar</a></li>
        </ul>
    </li>    
    <li>
        <a href="{{ route('fase.index') }}">Fase</a>
        <ul>
            <li><a href="{{ route('fase.create') }}">Novo registro</a></li>
            <li><a href="{{ route('fase.index') }}">Consultar</a></li>
        </ul>
    </li>  
    <li>
        <a href="{{ route('projeto.index') }}">Projeto</a>
        <ul>
            <li><a href="{{ route('projeto.create') }}">Novo registro</a></li>
            <li><a href="{{ route('projeto.index') }}">Consultar</a></li>
        </ul>
    </li>
    <li>
    <a href="{{ route('atendimento.index') }}">Atendimento </a>
        <ul>
            <li><a href="{{ route('atendimento.create') }}">Novo registro</a></li>
            <li><a href="{{ route('atendimento.index') }}">Consultar</a></li>
        </ul>
    </li>

    <li><a href="{{ route('pessoa.index') }}">Pessoa</a>
        <ul>
            <li><a href="{{ route('pessoa.create') }}">Novo registro</a></li>
            <li><a href="{{ route('pessoa.index') }}">Consultar</a></li>
        </ul>
    </li>    

    <li>
        <a href="{{ route('projeto.index') }}">Logs</a>
    </li>
    <li>
        <a href="{{ route('projeto.index') }}"><span>Usuário</span></a>
        <ul>
            <li><a href="{{ route('projeto.index') }}">Alterar Senha</a></li>
            <li><a href="{{ route('projeto.index') }}">Alterar Email</a></li>
            <li><a href="{{ route('projeto.index') }}">Trocar perfil</a></li>
            <li><a href="{{ route('projeto.index') }}">Recarregar Menu</a></li>
        </ul>
    </li>
</ul>
</div>
