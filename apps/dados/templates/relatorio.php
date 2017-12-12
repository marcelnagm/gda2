<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php #include_stylesheets() ?>
        <style type="text/css" media="all">
            html {
                margin:0;
                padding:0;
            }
            body {
                font-family: Verdana, sans-serif;
                padding: 0;
                margin: 60px 0 0 0;
                font-size: 11px;
            }
            .conteudo {
                margin: 1em 0.5em;
            }
            h1,h2,p {
                margin: 3px;
                padding: 0;
            }
            h1,h2,h3 {
                font-style: italic;
                margin:0px;
                padding:0px;
            }


            h1{
                font-size:20px;
            }
            h2{
                font-size:16px;
            }
            h3{
                font-size:14px;
            }

            .lista table{
                font-size: 11px;
                border-collapse: collapse;
                border: 1px solid silver;
            }
            .lista table thead tr {
                text-align: left;
                font-style: italic;
            }
            .lista table thead th{
                background-color: silver;
                padding: 3px 10px 3px 3px;
                vertical-align: bottom;
                margin-top: 3px;
            }
            .lista tbody td{
                padding: 3px 30px 3px 3px;
                white-space: nowrap;
            }
            .lista td,
            .lista th{
                border-top: 1px solid silver;
                border-bottom: 1px solid silver;
            }
            .lista .row-1{
                background-color: #F5F5F5;
            }
            .cabecalho {
                margin-bottom: 2em;
            }
            .cabecalho h1{
                font-style: normal;
                font-size: 16px;
            }
            #assinatura {
                margin-top:5em;
                line-height:1.5em;
                text-align: center;
                font-size: 10px;
            }

            .info {
                margin-bottom: 2em;
            }
            .menu {

                background-color: #EEE;
                vertical-align: middle;
                padding: 2px 10px;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
            }

            .menu .botoes a{
                margin: 2px;
                padding: 2px 5px 2px 20px;
                text-align: center;
                vertical-align: middle;
                /*border: 1px solid silver;*/
                text-decoration: none;
                background-position: 2px center;
                background-repeat: no-repeat;
            }
            .menu .botoes .imprimir{
                background-image: url('/images/icons/printer-small.png');
            }
            .menu .botoes .voltar{
                background-image: url('/images/icons/resultset_previous-small.png');
            }
        </style>
        <style type="text/css" media="print">
            body {
                padding: 0;
                margin: 2px 15px;
            }
            .nao-imprimir,
            #sfWebDebug {
                display: none !important;
            }
        </style>

    </head>
    <body>
        <div class="menu nao-imprimir">
            <div>
                <h1>GDA - Relatório</h1>
            </div>
            <div class="botoes">
                <a class="voltar" href="javascript: history.go(-1)">Voltar</a>
                <a class="imprimir" href="javascript: window.print()">Imprimir</a>
            </div>
        </div>
        <div class="conteudo">
            <?php if ($sf_user->hasFlash('error')): ?>
            <ul class="error_list">
                <h1><?php echo $sf_user->getFlash('error') ?></h1>
            </ul>
            <?php else: ?>
            <div class="cabecalho">
                <h1>
                    Universidade Federal de Roraima
                    <br/>
                    Departamento de Registro e Controle Acadêmico
                </h1>
            </div>
            <div>
                    <?php echo $sf_content ?>
            </div>
            <?php endif; ?>
        </div>
    </body>
</html>