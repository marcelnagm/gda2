<?php
//if (isset($template)) {
//    setlocale(LC_ALL, 'pt_BR');
//
//    require_once(dirname(__FILE__) . '/../../../../../lib/vendor/odtphp/odf_new.php');
//    $odf = new odf(dirname(__FILE__) . "/../lib/vendor/declaracoes/" . $template . ".odt");
//
//    foreach ($values as $key => $value) {
//        $odf->setVars($key, $value);
//    }
//
//    if (isset($disciplinas)) {
//        foreach ($disciplinas AS $disciplina) {
//            $article = $odf->setSegment('L');
//            $article->nomeArticle(utf8_decode($disciplina['descricao']));
//            $article->turmaArticle($disciplina['turma']);
//            $article->codArticle($disciplina['cod']);
//            $article->caraterArticle($disciplina['carater']);
//            $article->situacaoArticle($disciplina['situacao']);
//            $dia = $disciplina['dias'];
//            $article->situacao1Article($dia);
//            $article->merge();
//        }
//        $odf->mergeSegment($article);
//    }
//
//    $odf->setVars('data', strftime(" %d de %B de %Y"));
//
//    $odf->exportAsAttachedFile('declaracao_' . $values['nome'] . '.odt');
//    exit();
//} else {
//    if (isset($message)) {?>
<!--        <div class='error'>Erro Ao tentar gerar declaração!<br>
        </div>-->
<?php
//        echo nl2br($message);
//    }
//}
//?>

<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
        <TITLE> </TITLE>
        <META NAME="GENERATOR" CONTENT="UFRR">
        <META NAME="AUTHOR" CONTENT="DERCA">
        <META NAME="CREATED" CONTENT="20100514;10510000">
        <META NAME="CHANGEDBY" CONTENT="DERCA">
        <META NAME="CHANGED" CONTENT="20120710;17551500">
        <STYLE TYPE="text/css">
            <!--
            @page { margin-left: 2.86cm; margin-right: 1.91cm; margin-top: 0.95cm; margin-bottom: 0.66cm }
            P { direction: ltr; color: #000000; text-align: left; widows: 2; orphans: 2 }
            P.western { font-family: "Times New Roman", serif; font-size: 12pt }
            P.cjk { font-family: "Times New Roman", serif; font-size: 12pt; so-language: zh-CN }
            P.ctl { font-family: "Times New Roman", serif; font-size: 12pt; so-language: ar-SA }
            H1 { direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
            H1.western { font-family: "Arial", sans-serif; font-size: 20pt; font-weight: normal }
            H1.cjk { font-family: "Times New Roman", serif; font-size: 20pt; so-language: zh-CN; font-weight: normal }
            H1.ctl { font-family: "Arial", sans-serif; font-size: 12pt; so-language: ar-SA; font-weight: normal }
            H2 { direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
            H2.western { font-family: "Arial", sans-serif; font-size: 16pt; font-weight: normal }
            H2.cjk { font-family: "Times New Roman", serif; font-size: 16pt; so-language: zh-CN; font-weight: normal }
            H2.ctl { font-family: "Arial", sans-serif; font-size: 12pt; so-language: ar-SA; font-weight: normal }
            H3 { direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
            H3.western { font-family: "Arial", sans-serif; font-weight: normal }
            H3.cjk { font-family: "Times New Roman", serif; so-language: zh-CN; font-weight: normal }
            H3.ctl { font-family: "Arial", sans-serif; font-size: 12pt; so-language: ar-SA; font-weight: normal }
            H4 { direction: ltr; color: #000000; text-align: center; widows: 2; orphans: 2 }
            H4.western { font-family: "Arial", sans-serif; font-size: 24pt; font-weight: normal }
            H4.cjk { font-family: "Times New Roman", serif; font-size: 24pt; so-language: zh-CN; font-weight: normal }
            H4.ctl { font-family: "Arial", sans-serif; so-language: ar-SA; font-weight: normal }
            TD P { direction: ltr; color: #000000; text-align: left}
            TD P.western { font-family: "Times New Roman", serif; font-size: 12pt }
            TD P.cjk { font-family: "Times New Roman", serif; font-size: 12pt; so-language: zh-CN }
            TD P.ctl { font-family: "Times New Roman", serif; font-size: 12pt; so-language: ar-SA }
            A:link { color: #0000ff }
            -->
        </STYLE>
    </HEAD>
    <BODY LANG="pt-BR" TEXT="#000000" LINK="#0000ff" DIR="LTR">
        <div style="width: 100%" align="center">
        <div style="width: 17cm" align="center">
            <DIV align="center">
                <table cellpadding="0" cellspacing="5">
                    <tr>
                        <td><IMG SRC="/aluno/images/brasil.png" alt="figura1" ALIGN=BOTTOM WIDTH=69 HEIGHT=67 BORDER=0></td>
                        <td nowrap="nowrap">
                            <H2 CLASS="western">
                                <FONT SIZE=4 STYLE="font-size: 16pt">UNIVERSIDADE FEDERAL DE RORAIMA</FONT><br>
                                <FONT SIZE=3>PRÓ-REITORIA DE ENSINO E GRADUAÇÃO</FONT><br>
                                <FONT SIZE=3>DEPARTAMENTO DE REGISTRO E CONTROLE ACADÊMICO</FONT>
                            </H2>
                        </td>
                        <td><IMG SRC="/aluno/images/ufrr.png" alt="figura2" WIDTH=105 HEIGHT=73 BORDER=0></td>
                    </tr>
                </table>
            </DIV><SPAN CLASS="sd-abs-pos" STYLE="position: absolute; top: 0.96cm; left: 17.62cm; width: 105px">
            </SPAN>
            <H4 CLASS="western"><A NAME="__DdeLink__3340_2125753545"></A><FONT SIZE=5 STYLE="font-size: 20pt">D E C L A R A Ç Ã O</FONT></H4>
            <DIV ALIGN=RIGHT>
                <TABLE WIDTH=319 BORDER=0 CELLPADDING=0 CELLSPACING=0>
                    <COL WIDTH=166>
                    <COL WIDTH=137>
                    <TR VALIGN=TOP>
                        <TD WIDTH=166>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Número de autenticação:</B></FONT></FONT>
                        </TD>
                        <TD WIDTH=137>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B><?php echo $values['num_auth'];?></B></FONT></FONT>
                        </TD>
                    </TR>
                    <TR VALIGN=TOP>
                        <TD WIDTH=166>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Data de emissão:</B></FONT></FONT>
                        </TD>
                        <TD WIDTH=137>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B><?php echo $values['data_emissao'];?></B></FONT></FONT>
                        </TD>
                    </TR>
                </TABLE>
            </DIV>
            <P ALIGN=JUSTIFY STYLE="margin-bottom: 0cm; line-height: 150%"><FONT FACE="Arial, sans-serif">
                    Declaramos que o(a) discente abaixo discriminado(a) está regularmente
                    matriculado(a) até a presente data, na Universidade Federal de
                    Roraima, conforme os dados abaixo:</FONT></P>
            <P ALIGN=JUSTIFY STYLE="margin-bottom: 0cm; line-height: 100%">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=2 STYLE="font-size: 10pt"><B>Informações sobre o aluno:</B></FONT>
                </FONT>
            </P>
            <TABLE WIDTH=100% BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0 RULES=NONE>
                <COL WIDTH=103*>
                <COL WIDTH=153*>
                <TR>
                    <TD COLSPAN=2 WIDTH=100% VALIGN=TOP>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=3><B>Nome: <?php echo $values['nome'];?></B></FONT></FONT>
                    </TD>
                </TR>
                <TR VALIGN=TOP>
                    <TD WIDTH=45%>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Matricula:<?php echo $values['matricula'];?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>CPF:<?php echo $values['cpf'];?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Curso: <?php echo $values['curso'];?></FONT></FONT><br>
                        <A NAME="__DdeLink__138_20609366741"></A><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Nivel: <?php echo $values['nivel'];?></FONT></FONT><br>
                        <A NAME="__DdeLink__140_20609366741"></A><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Turno:<?php echo $values['turno'];?></FONT></FONT>
                    </TD>
                    <TD WIDTH=55%>
                        <A NAME="__DdeLink__3616_2125753545"></A><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Data de ingresso: <?php echo $values['dt_ingresso'];?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Mod. Ingresso: <?php echo $values['tipo_ingresso'];?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Prazo Mínimo de Conclusão: <?php echo $values['ano_min'];?> Anos</FONT></FONT><br>
                        <span STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Prazo Máximo de Conclusão: <?php echo $values['ano_max'];?> Anos</FONT></FONT></span><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=3><B>Situação do Aluno:<?php echo $values['situacao'];?>   </B></FONT></FONT>
                    </TD>
                </TR>
            </TABLE>
            <P CLASS="western" STYLE="line-height: 100%"></P>
            <P STYLE="margin-bottom: 0cm; line-height: 100%">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=2 STYLE="font-size: 10pt"><B>Informações sobre o curso:</B></FONT>
                </FONT>
            </P>
            <TABLE WIDTH="100%" BORDER=1 BORDERCOLOR="#000000" CELLPADDING=0 CELLSPACING=0 rules="ALL">
                <COL WIDTH=80>
                <COL WIDTH=141>
                <COL WIDTH=144>
                <COL WIDTH=155>
                <TR height="25px">
                    <TD WIDTH=80>
                        <span ALIGN=LEFT><BR></span>
                    </TD>
                    <TD WIDTH=141>
                        <b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>C.H. do Curso</FONT></FONT></div></b>
                    </TD>
                    <TD WIDTH=144>
                        <b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>C.H. Cursada</FONT></FONT></div></b>
                    </TD>
                    <TD WIDTH=155>
                        <b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>C.H. Restante</FONT></FONT></div></b>
                    </TD>
                </TR>
                <TR height="25px">
                    <TD WIDTH=80><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Obrigatória</FONT></FONT></div></TD>
                    <TD WIDTH=141><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_curso_obrig'];?> H/A</FONT></FONT></div></TD>
                    <TD WIDTH=144><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_obr_cursada'];?> H/A</FONT></FONT></div></TD>
                    <TD WIDTH=155><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_restante_obr'];?> H/A</FONT></FONT></div></TD>
                </TR>
                <TR height="25px">
                    <TD WIDTH=80><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Eletiva</FONT></FONT></div></TD>
                    <TD WIDTH=141><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_curso_ele'];?> H/A</FONT></FONT></div></TD>
                    <TD WIDTH=144><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_ele_cursada'];?> H/A</FONT></FONT></div></TD>
                    <TD WIDTH=155>
                        <div ALIGN=CENTER><A NAME="__DdeLink__494_1451027517"></A>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_restante_ele'];?> H/A</FONT></FONT>
                        </div>
                    </TD>
                </TR>
                <TR height="25px">
                    <TD WIDTH=80><b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2>Total</FONT></FONT></div></b></TD>
                    <TD WIDTH=141><b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_curso'];?> H/A</FONT></FONT></div></b></TD>
                    <TD WIDTH=144><b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_total'];?> H/A</FONT></FONT></div></b></TD>
                    <TD WIDTH=155><b><div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><?php echo $values['ch_restante_total'];?> H/A</FONT></FONT></div></b></TD>
                </TR>
            </TABLE>
            <P STYLE="margin-bottom: 0cm; line-height: 100%"><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 10pt">
                <BR><b>Informações sobre as disciplinas solicitadas no semestre <?php echo $values['semestre'];?>:</b></FONT></FONT></P>
            <TABLE WIDTH="100%" BORDER=1 BORDERCOLOR="#000000" CELLPADDING=0 CELLSPACING=0 rules="ALL">
                <COL WIDTH=224>
                <COL WIDTH=68>
                <COL WIDTH=62>
                <COL WIDTH=78>
                <COL WIDTH=116>
                <COL WIDTH=117>
                <TR>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Disciplina</B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Turma</B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Código</B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Caráter</B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Situação</B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Horário</B></FONT></FONT></div>
                    </TD>
                </TR>
                <?php foreach ($disciplinas AS $disciplina) { ?>
                <TR>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent">
                    <?php echo $disciplina['descricao'];?></SPAN></B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent"><?php echo $disciplina['turma'];?></SPAN></B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent"><?php echo $disciplina['cod'];?></SPAN></B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent"><?php echo $disciplina['carater'];?></SPAN></B></FONT></FONT></div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><A NAME="__DdeLink__704_1119989356"></A><A NAME="__DdeLink__935_1119989356"></A>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent"><?php echo $disciplina['situacao'];?>
                                        </SPAN></B></FONT></FONT>
                        </div>
                    </TD>
                    <TD>
                        <div ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1><B><SPAN STYLE="background: transparent">
                            <?php echo $disciplina['dias'];?>
                        <FONT SIZE=1 STYLE="font-size: 2pt"><SPAN STYLE="font-style: normal"></SPAN></FONT></SPAN></B></FONT></FONT></div>
                    </TD>
                </TR>
                <?php } ?>
            </TABLE>
            <P STYLE="margin-bottom: 0cm; line-height: 0.3cm"><BR>
            </P>
            <P CLASS="western" ALIGN=RIGHT STYLE="text-align: right; margin-bottom: 0cm; line-height: 150%">
                <FONT FACE="Arial, sans-serif" SIZE=2 STYLE="font-size: 10pt"><B>Boa Vista – RR, <?php echo strftime(" %d de %B de %Y");?>.</B></FONT></P>
            <P CLASS="western" ALIGN=RIGHT STYLE="margin-bottom: 0cm; line-height: 150%">
                <BR>
            </P>
            <DIV TYPE=FOOTER>
                <P ALIGN=LEFT STYLE="margin-top: 0cm; margin-bottom: 0cm"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>OBSERVAÇÕES:</B></FONT></FONT></P>
                <P ALIGN=LEFT STYLE="margin-bottom: 0cm"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">
                    <B>1. A declaração é válida somente durante o semestre <?php echo $values['semestre2'];?>.</B><br>
                    <B>2. Esta declaração é válida sem rasuras ou emendas.</B><br>
                    <B>3. A autenticidade desta declaração pode ser averiguada no site do DERCA, no endereço http://derca.ufrr.br/aluno/validar.</B>
                </FONT></FONT></P>
            </DIV>
        </div>
        </div>
    </BODY>
</HTML>