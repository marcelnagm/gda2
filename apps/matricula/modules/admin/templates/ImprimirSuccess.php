<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
        <TITLE>COMPROVANTE DE SOLICITAÇÃO DE PRÉ-MATRICULA</TITLE>
        <META NAME="GENERATOR" CONTENT="UFRR">
        <META NAME="AUTHOR" CONTENT="DERCA">
        <META NAME="CREATED" CONTENT="20100514;10510000">
        <META NAME="CHANGEDBY" CONTENT="DERCA">
        <META NAME="CHANGED" CONTENT="20120710;17551500">
        <META NAME="Informações 1" CONTENT="">
        <META NAME="Informações 2" CONTENT="">
        <META NAME="Informações 3" CONTENT="">
        <META NAME="Informações 4" CONTENT="">
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
    <BODY LANG="pt-BR" TEXT="#000000" LINK="#0000ff" DIR="LTR" onload="window.print()">
        <div style="width: 100%" align="center">
        <div style="width: 17cm" align="center">
            <DIV align="center">
                <table cellpadding="0" cellspacing="5">
                    <tr>
                        <td><IMG SRC="/matricula/images/brasil.png" alt="figura1" ALIGN=BOTTOM WIDTH=69 HEIGHT=67 BORDER=0></td>
                        <td nowrap="nowrap">
                            <H2 CLASS="western" style="text-align: center">
                                <FONT SIZE=3>UNIVERSIDADE FEDERAL DE RORAIMA</FONT><br>
                                <FONT SIZE=3>PRÓ-REITORIA DE ENSINO E GRADUAÇÃO</FONT><br>
                                <FONT SIZE=3>DEPARTAMENTO DE REGISTRO E CONTROLE ACADÊMICO</FONT>
                            </H2>
                        </td>
                        <td><IMG SRC="/matricula/images/ufrr.png" alt="figura2" WIDTH=105 HEIGHT=73 BORDER=0></td>
                    </tr>
                </table>
            </DIV><SPAN CLASS="sd-abs-pos" STYLE="position: absolute; top: 0.96cm; left: 17.62cm; width: 105px">
            </SPAN>
            <H4 CLASS="western"><A NAME="__DdeLink__3340_2125753545"></A><FONT SIZE=4 STYLE="font-size: 20pt">COMPROVANTE DE SOLICITAÇÃO DE PRÉ-MATRICULA</FONT></H4>
            <DIV ALIGN=RIGHT>
                <TABLE WIDTH=319 BORDER=0 CELLPADDING=0 CELLSPACING=0>
                    <COL WIDTH=166>
                    <COL WIDTH=137>
                    <TR VALIGN=TOP>
                        <TD WIDTH=166>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Número de autenticação:</B></FONT></FONT>
                        </TD>
                        <TD WIDTH=137>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B><?php echo $comprovante->getCodigo();?></B></FONT></FONT>
                        </TD>
                    </TR>
                    <TR VALIGN=TOP>
                        <TD WIDTH=166>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B>Data de emissão:</B></FONT></FONT>
                        </TD>
                        <TD WIDTH=137>
                            <FONT FACE="Arial, sans-serif"><FONT SIZE=2><B><?php echo $comprovante->getDataHora('%d/%m/%Y %H:%M:%S');?></B></FONT></FONT>
                        </TD>
                    </TR>
                </TABLE>
            </DIV>
            <P ALIGN=JUSTIFY STYLE="margin-bottom: 0cm; line-height: 100%">
                <FONT FACE="Arial, sans-serif">
                    <FONT SIZE=2 STYLE="font-size: 10pt"><B>Dados do aluno:</B></FONT>
                </FONT>
            </P>
            <TABLE WIDTH=100% BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0 RULES=NONE>
                <COL WIDTH=103*>
                <COL WIDTH=153*>
                <TR>
                    <TD COLSPAN=2 WIDTH=100% VALIGN=TOP>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=3><B>Nome: <?php echo $aluno->getNome();?></B></FONT></FONT>
                    </TD>
                </TR>
                <TR VALIGN=TOP>
                    <TD WIDTH=45%>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Matrícula: <?php echo $aluno->getMatricula();?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Curso: <?php echo $aluno->getTbcursoversao()->getTbcurso()->getDescricao();?></FONT></FONT><br>
                    </TD>
                    <TD WIDTH=55%>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=2>Mod. Ingresso: <?php echo $aluno->getTbtipoingresso();?></FONT></FONT><br>
                        <FONT FACE="Arial, sans-serif"><FONT SIZE=3><B>Situação do Aluno: <?php echo $comprovante->getSituacao();?>   </B></FONT></FONT>
                    </TD>
                </TR>
            </TABLE>
            <P CLASS="western" STYLE="line-height: 100%"></P>
            <P ALIGN=JUSTIFY STYLE="margin-bottom: 0cm; line-height: 150%"><FONT FACE="Arial, sans-serif" STYLE="font-size: 10pt">
                    <?php echo TbavisoPeer::getText(10); ?>
                </FONT></P>
            <P STYLE="margin-bottom: 0cm; line-height: 100%"><FONT FACE="Arial, sans-serif"><FONT SIZE=2 STYLE="font-size: 10pt">
                <b>Documentos necessários para o cadastramento<a href="#2">²</a>:</b></FONT></FONT></P>
            <ul><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 10pt">
                <li><p align="justify" >Cópia e original de certificado de conclusão do ensino médio ou equivalente;</p></li>
                <li><p align="justify" >Cópia e original do histórico escolar do ensino médio;</p></li>
                <li><p align="justify" >Cópia e original da cédula oficial de identidade;</p></li>
                <li><p align="justify" >Cópia e original do CPF;</p></li>
                <li><p align="justify" >Cópia e original do título de eleitor e comprovante de quitação eleitoral;</p></li>
                <li><p align="justify" >Cópia e original de comprovante de quitação com o serviço militar, se do sexo masculino;</p></li>
                <li><p align="justify" >Cópia e original da certidão de nascimento ou casamento;</p></li>
                <li><p align="justify" >1 (uma) foto 3x4 recente.</p></li>
                <?php if ($aluno->getIdTipoIngresso() == 28) { ?>
                <li><p align="justify" >Cópia e original de laudo médico homologado por perito oficial;</p></li>
                <?php } ?>
                <?php if ($aluno->getIdTipoIngresso() == 29 || $aluno->getIdTipoIngresso() == 37) { ?>
                <li><p align="justify" >Cópia e original de comprovante de renda, referente aos últimos
                        três meses anteriores à data de inscrição do candidato, do requerente e de todos
                        os moradores da casa maiores de 18 anos (recibo, contracheque, CTPS, declaração do
                        órgão ou empresa contratante, declaração de autônomo ou de desemprego);</p></li>
                <?php } ?>
                <?php if ($aluno->getIdTipoIngresso() == 2 && $aluno->getIdVersaoCurso() == 198) { ?>
                <li><p align="justify" >Cópia e original de comprovante de atuação no âmbito do subsistema de saúde indígena;</p></li>
                <?php } ?>
                <?php if (in_array($aluno->getIdTipoIngresso(), array(22,36))) { ?>
                <li><p align="justify" >Cópia e original do Registro Administrativo de Nascimento de Índio – RANI, expedido pela FUNAI;</p></li>
                <?php } ?>
                <?php if (in_array($aluno->getIdTipoIngresso(), array(31,32))) { ?>
                <li><p align="justify" >Cópia e original de comprovante de renda, referente aos últimos
                        três meses anteriores à data de inscrição do candidato, do requerente e de todos
                        os moradores da casa maiores de 18 anos (recibo, contracheque, CTPS, declaração do
                        órgão ou empresa contratante, declaração de autônomo ou de desemprego);</p></li>
                <?php } ?>
            </FONT></FONT></ul>
            <P STYLE="margin-bottom: 0cm; line-height: 0.3cm"><BR>
            </P>
            <P CLASS="western" ALIGN=RIGHT STYLE="text-align: right; margin-bottom: 0cm; line-height: 150%">
                <FONT FACE="Arial, sans-serif" SIZE=2 STYLE="font-size: 10pt"><B>Boa Vista – RR, <?php echo strftime(" %d de %B de %Y");?>.</B></FONT></P>
            <P CLASS="western" ALIGN=RIGHT STYLE="margin-bottom: 0cm; line-height: 150%">
                
            </P>
            <DIV TYPE=FOOTER>
                <P ALIGN=LEFT STYLE="margin-top: 0cm; margin-bottom: 0cm"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>OBSERVAÇÕES:</B></FONT></FONT></P>
                <P ALIGN=LEFT STYLE="margin-bottom: 0cm"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">
                    <B><a name="1">¹</a> O candidato que deixar de comparecer em data, horário e local estabelecidos perderá automaticamente a vaga.</B><br>
                    <B><a name="2">²</a> Cópias autenticadas dispensam a apresentação dos documentos originais.</B><br>
                </FONT></FONT></P>
            </DIV>
        </div>
        </div>
    </BODY>
</HTML>
