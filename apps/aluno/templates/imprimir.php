<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <link rel="shortcut icon" href="/favicon.ico" />
        <?php #include_stylesheets() ?>
        <?php include_javascripts() ?>
        <link rel="stylesheet" type="text/css" media="screen,print" href="/aluno/css/impressao.css" />


    </head>
    <body>
        <div id="menu">
            <table class="menu" style="background-image: url('/aluno/images/fila/painel.png');" border="0" cellpadding="0" cellspacing="0"><tr>
                    <td width="59%" style="text-align:left;">
                        <h1 class="titulo">
                            <div class="titulo2"><i>Universidade Federal de Roraima - Departamento de Registro e Controle Acadêmico</i></div>
                        </h1>
                    </td>
                    <td align="right">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="80">
                                    <a href="javascript:window.print()" class="botao">
                                        <img src="/aluno/images/fila/printmgr.png" alt="Imprimir"/>
                                        <br />Imprimir
                                    </a>
                                </td>
                                <td width="80">
                                    <a href="javascript:if(window.opener) window.close(); else window.history.go(-1);" class="botao">
                                        <img src="/aluno/images/fila/back.png" alt="Voltar"/>
                                        <br />Voltar
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <div id="conteudo">
            <?php echo $sf_content ?>
        </div>

    </body>
</html>