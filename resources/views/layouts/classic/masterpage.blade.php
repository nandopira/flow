@include('layouts.classic.header')
  
<body>

<div class="loading-overlay" id="loadingOverlay">
        <div class="spinner-border text-warning" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


	<div id="layout_principal">
		<div id="layout_cabecalho">


<table width="100%" height="60" border="0" cellpadding="0" cellspacing="0">

	<tr>
		<td width="180" rowspan="3" align="center">
			<a href="http://www.usp.br" target="_blank"><img src="https://uspdigital.usp.br/comumwebdev/imagens/cabecalho/usp-logo.png" width="122" height="49" alt="" border="0" style="position: relative; top: -3px;" /></a>
		</td>
		<td>
			<a href="http://www.usp.br" target="_blank"><img src="https://uspdigital.usp.br/comumwebdev/imagens/cabecalho/usp-logo-texto.png" alt="" width="260" height="44" border="0" style="position: relative; top: 5px;" /></a>
		</td>
		<td align="right">
        
		@guest
               
        <button id="login-button" class="google-button">
        <a href="{{ route('google.login') }}">  <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo">
                Entrar com Google
        </a>
            </button>
        @else
            <div id="user-info">
                <p>Bem-vindo, {{ Auth::user()->name }}!</p>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="logout-button">Sair</button>
                </form>
            </div>
        @endguest
    </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

	</tr>
</table>
<div style="width: 100%; height: 26px; background-image: url('https://uspdigital.usp.br/comumwebdev/imagens/cabecalho/bg-headtop.gif'); margin-bottom: 5px; text-align: right; color: white; padding-top: 12px; padding-right: 3px; font-family: Verdana; font-size: 10px;">



 
	<!--	7023777 - Fernando Luiz Planello |
		<a href="alterarSenha?codmnu=0" class="cabecalho_sair">Tarefas</a> |
		<a href="sair" class="cabecalho_sair">Sair</a>
	-->
	
	</div>
</div>

		


<!-- PUBLICO -->

@include('layouts.classic.sidebar')
	
		</div>

		<div id="layout_conteudo">

<!--div id="my_web_cabecalho">
	<a href="/marteweb/webMenuNavegacao.jsp?codmnu=9022" class="link_cabecalho">Projetos</a> &gt; Detalhes
</div -->
	
	@yield('content')

<link type="text/css" rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/usp/main/1.0/home.css"/>
<table width="100%" border="0" cellspacing=" 0" cellpadding=" 0" align="center">
  
  <tr>
    <td align="center"><font face="Arial, Helvetica, sans-serif" size="1"><hr size="1">
      <a href="{{ route('credito') }}" class="link_olive" target="_self">Cr&eacute;ditos</a>
      | <a href="mailto:informatica.lq@usp.br" class="link_olive">Fale conosco</a><br>
      &copy; 2024 - Prefeitura do Campus "Luiz de Queiroz" / USP</font>
    </td>
  </tr>
</table>

	

			
		</div>
	</div>

	@include('layouts.classic.rodape')
