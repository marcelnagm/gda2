<?php
header('Content-type: plain/text');
header("Content-Description: File Transfer");
header('Content-Disposition: attachment; filename=censo2010-ufrr.txt');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
$criteria = new Criteria();
?>
40|789|4
<?php foreach ($censo2009s as $c): ?>
<?php
//$c = new Censo2009();
//    print_r("\n");
    print_r(
            $c->getAlunoC1() . "|" .
            $c->getAlunoC2() . "|" .
            $c->getAlunoC3() . "|" .
            $c->getAlunoC4Nome() . "|" .
            $c->getAlunoC5Cpf() . "|" .
            $c->getAlunoC6DocEstrangeiro() . "|" .
            $c->getAlunoC7Nascimento() . "|" .
            $c->getAlunoC8Sexo() . "|" .
            $c->getAlunoC9CorRaca() . "|" .
            $c->getAlunoC10Mae() . "|" .
            $c->getAlunoC11Nacionalidade() . "|" .
            $c->getAlunoC12UfNascimento() . "|" .
            $c->getAlunoC13CidadeNascimento() . "|" .
            $c->getAlunoC14PaisOrigem() . "|" .
            $c->getAlunoC15Deficiencia() . "|" .
            $c->getAlunoC16DefCegueria() . "|" .
            $c->getAlunoC17DefBaixaVisao() . "|" .
            $c->getAlunoC18DefSurdez() . "|" .
            $c->getAlunoC19DefAuditiva() . "|" .
            $c->getAlunoC20DefFisica() . "|" .
            $c->getAlunoC21DefSurdocegueira() . "|" .
            $c->getAlunoC22DefMultipla() . "|" .
            $c->getAlunoC23DefMental() . ($c->getAlunoC15Deficiencia() == 1 ? "|0|0|0|0|0" : "|||||")
    );

    $criteria->clear();
    $criteria->add(Censo2009Peer::ALUNO_C1, null);
    $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, 42);
    $criteria->addAnd(Censo2009Peer::ALUNO_C2, $c->getAlunoC2());
//    $criteria->setLimit(500);
    foreach (Censo2009Peer::doSelect($criteria) as $d) {
        $aluno_get = new Tbaluno();
//        $aluno_get2 = "";
        if ($d->getCursoC5SituacaoVinculo() == 6) {
            $rci = new Criteria();
            $rci->add(TbalunoPeer::CPF, $c->getAlunoC5Cpf());
            $rci->addAnd(TbalunoPeer::ID_SITUACAO, 1);
            $aluno_get = TbalunoPeer::doSelectOne($rci);
        } else {
//            $rci = new Criteria();
//            $rci->add(TbalunoPeer::CPF, $c->getAlunoC5Cpf());
//            if (TbalunoPeer::doCount($rci) > 1) {
//                $rci->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
//                $rci->addAnd(TbcursoversaoPeer::COD_INTEGRACAO, $d->getCursoC2IdInepCurso());
//            }
//            if (TbalunoPeer::doCount($rci) > 0) {
//                $aluno_get2 = (TbalunoPeer::doSelectOne($rci)->getTbcursoversao()->getIdFormacao() == 4 ? "0" : "");
//            } else {
//                $aluno_get2 = "";
//            }
            
        }
        print_r("\n");
        print_r(
                $d->getCursoC1TipoReg2() . "|" .
                $d->getCursoC2IdInepCurso() . "|" .
                $d->getCursoC3CodPoloInep() . "|" .
                $d->getCursoC4TurnoAluno() . "|" .
                $d->getCursoC5SituacaoVinculo() . "|" .
                ($d->getCursoC5SituacaoVinculo() == 6 ? ($aluno_get->getDtSituacao('m') > 6 ? "2" : "1") : "") . "|" .
                (in_array($d->getCursoC2IdInepCurso(), 
                        array('31229','16898','1185309','24160','71992','16889','22532','68228','22533','16895','68225','1186746','68226','1156313','16896','1186297','16902','52859','118568','118566','16890','1184530','118564','31230')) ? "0" : "" ) . "|" .
                $d->getCursoC6DataIngresso() . "|" .
                $d->getCursoC7AlunoPublica() . "|" .
                $d->getCursoC8FormaIngressoSelecaoVestibular() . "|" .
                $d->getCursoC9FormaIngressoSelecaoEnem() . "|" .
                $d->getCursoC10FormaIngressoSelecaoOutros() . "|" .
                $d->getCursoC11FormaIngressoSelecaoPecg() . "|" .
                $d->getCursoC12FormaIngressoOutras() . "|" .
                $d->getCursoC13ProgramaReservaVagas() . "|" .
                $d->getCursoC14ProgramaReservaVagas() . "|" .
                $d->getCursoC15ProgramaReservaVagas() . "|" .
                $d->getCursoC16ProgramaReservaVagas() . "|" .
                $d->getCursoC17ProgramaReservaVagas() . "|" .
                $d->getCursoC18ProgramaReservaVagas() . "|" .
                $d->getCursoC19FinanciamentoEstudantil() . "|" .
                $d->getCursoC20FinanciamentoEstudantil() . "|" .
                $d->getCursoC21FinanciamentoEstudantil() . "|" .
                $d->getCursoC22FinanciamentoEstudantil() . "|" .
                $d->getCursoC23FinanciamentoEstudantil() . "|" .
                $d->getCursoC24FinanciamentoEstudantil() . "|" .
                $d->getCursoC25FinanciamentoEstudantil() . "|" .
                $d->getCursoC26FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC27FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC28FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC29FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC30FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC31FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC32FinanciamentoEstudantilNReemb() . "|" .
                $d->getCursoC33ApoioSocial() . "|" .
                $d->getCursoC34TipoApoioSocial() . "|" .
                $d->getCursoC35TipoApoioSocial() . "|" .
                $d->getCursoC36TipoApoioSocial() . "|" .
                $d->getCursoC37TipoApoioSocial() . "|" .
                $d->getCursoC38TipoApoioSocial() . "|" .
                $d->getCursoC39TipoApoioSocial() . "|" .
                $d->getCursoC40AtividadeComplementar() . "|" .
                $d->getCursoC41AtividadeComplementar() . "|" .
                $d->getCursoC42Bolsa() . "|" .
                $d->getCursoC43AtividadeComplementar() . "|" .
                $d->getCursoC44Bolsa() . "|" .
                $d->getCursoC45AtividadeComplementar() . "|" .
                $d->getCursoC46Bolsa() . "|" .
                $d->getCursoC47AtividadeComplementar() . "|" .
                $d->getCursoC48Bolsa()
        );
    }
//    $c->setExportado(false);
//    $c->save();
?>

<?php endforeach ?>