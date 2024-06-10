<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Projetos - PUSP-LQ</title>
    <meta charset="iso-8859-1">
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
    <meta http-equiv="Expires" content="-1">
    
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/jqueryui/1.11.4/temas/ui-lightness/jquery-ui.min.css">
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/jqGrid/4.13.1/ui.jqgrid.min.css">
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/jqueryui/addons/timepicker/1.5.0/jquery.ui.timepicker.css">
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/validationEngine/2.6.4/jquery.validationEngine.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" href="https://uspdigital.usp.br/comumwebdev/imagens/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://uspdigital.usp.br/comumwebdev/imagens/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://uspdigital.usp.br/comumwebdev/libs/usp/main/1.0/menuweb.css">
    <link rel="stylesheet" type="text/css" href="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/listmenu_v.css" title="Vertical 'Earth'">
    <link rel="stylesheet" type="text/css" href="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/listmenu_fallback.css" id="fsmenu-fallback">

    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/jqGrid/4.13.1/grid.locale-pt-br.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/jqGrid/4.13.1/jquery.jqgrid.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/validationEngine/2.6.4/jquery.validationEngine-pt_BR.js" charset="UTF-8"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/validationEngine/2.6.4/jquery.validationEngine.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/blockUI/2.57/jquery.blockUI.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jqueryui/1.11.4/jquery.ui.datepicker-pt-BR.min.js" charset="UTF-8"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jqueryui/addons/timepicker/1.5.0/jquery.ui.timepicker.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/jquery/plugins/mask/1.13.4/jquery.mask.min.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/usp/util/1.4/util.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/javascript/ckeditor/4.4.5/ckeditor.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/javascript/ckeditor/4.4.5/adapters/jquery.js"></script>
    <script src="https://uspdigital.usp.br/comumwebdev/libs/javascript/fsmenu/1.0RC/fsmenu.js"></script>

    <style>
        #layout_principal {
            width: 100%;
        }

        #layout_menu {
            width: 170px;
            float: left;
            padding-top: 10px;
        }

        #layout_conteudo {
            padding-left: 181px;
            padding-top: 10px;
        }

        a.cabecalho_sair:active,
        a.cabecalho_sair:link,
        a.cabecalho_sair:visited {
            font-family: verdana;
            font-weight: bold;
            color: #FFFFFF;
            text-decoration: none;
        }

        a.cabecalho_sair:hover {
            font-family: verdana;
            font-weight: bold;
            color: #FFFFFF;
            text-decoration: underline;
        }

        td.font_cabecalho1 {
            font: bold 26px Tahoma;
            color: #FFFFFF;
        }

        td.font_cabecalho2 {
            font: bold 10px Arial;
            color: #FFFFFF;
        }

        td.font_cabecalho3 {
            font: normal 9px Verdana;
            color: #FFFFFF;
        }

        .form-header {
            background-color: #f0ad4e;
            color: white;
            padding: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .form-container {
            border: 1px solid #f0ad4e;
            border-radius: 5px;
            padding: 20px;
            position: relative;
        }

        .alert-custom {
            background-color: #f0ad4e;
            color: white;
            padding: 10px;
            margin-top: 10px;
            display: none;
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
            border-radius: 5px;
        }

.google-button {
    display: flex;
    align-items: center;
    background-color: white; /* Fundo branco */
    color: #4285F4; /* Cor do texto */
    border: 1px solid #dcdcdc; /* Borda cinza clara */
    border-radius: 5px;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra para efeito de elevação */
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.google-button img {
    width: 20px;
    height: 20px;
    margin-right: 10px;
}

.google-button:hover {
    background-color: #f7f7f7; /* Fundo um pouco mais escuro ao passar o mouse */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Aumenta a sombra ao passar o mouse */
}

#user-info {
    text-align: center;
}

.logout-button {
    background-color: #f44336;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    font-size: 16px;
    cursor: pointer;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease;
    margin-top: 10px;
}

.logout-button:hover {
    background-color: #d32f2f;
}


    </style>
</head>