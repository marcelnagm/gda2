<?php

header('Content-type: plain/text');
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename=censo2010-ufrr.txt');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
?>
40|789|4
<?php foreach ($censo2009s as $c): ?>
<?php
//$c = new Censo2009();
print_r(
	$c->getAlunoC1()."|".
	$c->getAlunoC2()."|".
	$c->getAlunoC3()."|".
	$c->getAlunoC4Nome()."|".
	$c->getAlunoC5Cpf()."|".
	$c->getAlunoC6DocEstrangeiro()."|".
	$c->getAlunoC7Nascimento()."|".
	$c->getAlunoC8Sexo()."|".
	$c->getAlunoC9CorRaca()."|".
	$c->getAlunoC10Mae()."|".
	$c->getAlunoC11Nacionalidade()."|".
	$c->getAlunoC12UfNascimento()."|".
	$c->getAlunoC13CidadeNascimento()."|".
	$c->getAlunoC14PaisOrigem()."|".
	$c->getAlunoC15Deficiencia()."|".
	$c->getAlunoC16DefCegueria() ."|".
	$c->getAlunoC17DefBaixaVisao()."|".
	$c->getAlunoC18DefSurdez()."|".
	$c->getAlunoC19DefAuditiva()."|".
	$c->getAlunoC20DefFisica()."|".
	$c->getAlunoC21DefSurdocegueira()."|".
	$c->getAlunoC22DefMultipla()."|".
	$c->getAlunoC23DefMental().($c->getAlunoC15Deficiencia() == 1 ? "|0|0|0|0|0" : "|||||")
);

?>

<?php
    $aluno_get = new Tbaluno();
    if ($c->getCursoC5SituacaoVinculo() == 6) {
        $rci = new Criteria();
        $rci->add(TbalunoPeer::CPF, $c->getAlunoC5Cpf());
        $rci->addAnd(TbalunoPeer::ID_SITUACAO, 1);
        $aluno_get = TbalunoPeer::doSelectOne($rci);
    }
print_r(
	$c->getCursoC1TipoReg2()."|".
	$c->getCursoC2IdInepCurso()."|".
	$c->getCursoC3CodPoloInep()."|".
	$c->getCursoC4TurnoAluno()."|".
	$c->getCursoC5SituacaoVinculo()."|".
        ($c->getCursoC5SituacaoVinculo() == 6 ? ($aluno_get->getDtSituacao('m') > 6 ? "2" : "1") : "") . "|" .
        (in_array($c->getCursoC2IdInepCurso(), 
                        array('31229','16898','1185309','24160','71992','16889','22532','68228','22533','16895','68225','1186746','68226','1156313','16896','1186297','16902','52859','118568','118566','16890','1184530','118564','31230')) ? "0" : "" ) . "|" .
	$c->getCursoC6DataIngresso()."|".
	$c->getCursoC7AlunoPublica()."|".
	$c->getCursoC8FormaIngressoSelecaoVestibular()."|".
	$c->getCursoC9FormaIngressoSelecaoEnem()."|".
	$c->getCursoC10FormaIngressoSelecaoOutros()."|".
	$c->getCursoC11FormaIngressoSelecaoPecg()."|".
	$c->getCursoC12FormaIngressoOutras()."|".
	$c->getCursoC13ProgramaReservaVagas()."|".
	$c->getCursoC14ProgramaReservaVagas()."|".
	$c->getCursoC15ProgramaReservaVagas()."|".
	$c->getCursoC16ProgramaReservaVagas()."|".
	$c->getCursoC17ProgramaReservaVagas()."|".
	$c->getCursoC18ProgramaReservaVagas()."|".
	$c->getCursoC19FinanciamentoEstudantil()."|".
	$c->getCursoC20FinanciamentoEstudantil()."|".
	$c->getCursoC21FinanciamentoEstudantil()."|".
	$c->getCursoC22FinanciamentoEstudantil()."|".
	$c->getCursoC23FinanciamentoEstudantil()."|".
	$c->getCursoC24FinanciamentoEstudantil()."|".
	$c->getCursoC25FinanciamentoEstudantil()."|".
	$c->getCursoC26FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC27FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC28FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC29FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC30FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC31FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC32FinanciamentoEstudantilNReemb()."|".
	$c->getCursoC33ApoioSocial()."|".
	$c->getCursoC34TipoApoioSocial()."|".
	$c->getCursoC35TipoApoioSocial()."|".
	$c->getCursoC36TipoApoioSocial()."|".
	$c->getCursoC37TipoApoioSocial()."|".
	$c->getCursoC38TipoApoioSocial()."|".
	$c->getCursoC39TipoApoioSocial()."|".
	$c->getCursoC40AtividadeComplementar()."|".
	$c->getCursoC41AtividadeComplementar()."|".
	$c->getCursoC42Bolsa()."|".
	$c->getCursoC43AtividadeComplementar()."|".
	$c->getCursoC44Bolsa()."|".
	$c->getCursoC45AtividadeComplementar()."|".
	$c->getCursoC46Bolsa()."|".
	$c->getCursoC47AtividadeComplementar()."|".
	$c->getCursoC48Bolsa()
);

?>

<?php endforeach ?>