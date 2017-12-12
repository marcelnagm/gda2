<?php

require_once dirname(__FILE__) . '/../lib/censo2009GeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/censo2009GeneratorHelper.class.php';

/**
 * censo2009 actions.
 *
 * @package    censo2009
 * @subpackage censo2009
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class censo2009Actions extends autoCenso2009Actions {

    public function executeBatchExport($request) {
        $this->forward404Unless($request->isMethod('post'));
        $this->forward('censo2009', 'ExportToTXT');
    }

    function executeMonitoresProcess(sfWebRequest $request) {
        $this->forward('censo2009', 'MonitoresProcessForm');
    }

    function executeMonitoresProcessForm(sfWebRequest $request) {

        $this->ids = $request->getAttribute('ids');
        $form = new MonitoresProcessForm();

        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {

            $form->bind($request->getParameter($form->getName()));

            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Monitores adicionados!');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao executar:' . $exc->getMessage());
                }
            }
            $this->redirect('censo2009/index');
        }

        $this->form = $form;
    }

    public function executeUpdatedCenso(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria->add(Censo2009Peer::ALUNO_C1, 41);
        $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, null);
        $criteria->addAnd(Censo2009Peer::EXPORTADO, true);
//        $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, 42);
//        $criteria->addAnd(Censo2009Peer::EXPORTADO, true);
        $criteria->addAscendingOrderByColumn(Censo2009Peer::ALUNO_C2);
        $criteria->setLimit(2000);

//        $this->setExportValue($criteria, FALSE);

        $this->censo2009s = Censo2009Peer::doSelect($criteria);
        $this->setLayout(false);
    }

    public function executeUpdateCenso(sfWebRequest $request) {
        $c = new Criteria();
        $d = new Criteria();
        $criteria = new Criteria();
        $criteria->add(Censo2009Peer::ALUNO_C1, 41);
        $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, null);
        $criteria->addAnd(Censo2009Peer::EXPORTADO, false);
        $criteria->setLimit(1000);
        $censo = new Censo2009();
        foreach (Censo2009Peer::doSelect($criteria) as $censo) {
            $c->clear();
            $c->add(Censo2009Peer::ALUNO_C1, null);
            $c->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, 42);
            $c->addAnd(Censo2009Peer::ALUNO_C2, $censo->getAlunoC2());
            $vinculo = new Censo2009();
            foreach (Censo2009Peer::doSelect($c) as $vinculo) {
                $d->clear();
//                $d->addSelectColumn(TbalunoPeer::ID_SITUACAO);
                $d->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
                $d->add(TbalunoPeer::CPF, $censo->getAlunoC5Cpf());
                if (Censo2009Peer::doCount($c) > 1) {
                    $d->addAnd(TbcursoversaoPeer::COD_INTEGRACAO, $vinculo->getCursoC2IdInepCurso());
                }
                if (TbalunoPeer::doCount($d) < 1) {
                    echo $censo->getAlunoC5Cpf() . " " . $vinculo->getCursoC2IdInepCurso() . "<br>";
                } else {
                    $aluno = TbalunoPeer::doSelectOne($d);

//                    if ($aluno->getTbcursoversao()->getIdTurno() == 2) {
//                        $vinculo->setCursoC4TurnoAluno(1);
//                    } else if ($aluno->getTbcursoversao()->getIdTurno() == 3) {
//                        $vinculo->setCursoC4TurnoAluno(2);
//                    } else if ($aluno->getTbcursoversao()->getIdTurno() == 5) {
//                        $vinculo->setCursoC4TurnoAluno(3);
//                    } else if ($aluno->getTbcursoversao()->getIdTurno() == 8) {
//                        $vinculo->setCursoC4TurnoAluno(4);
//                    }
                    
//                    if ($aluno->getTbcursoversao()->getIdFormacao() == 4) {
//                        $vinculo->setCursoC50AlunoParfor(0);
//                    }
                    
                    if (in_array($aluno->getIdTipoIngresso(), array(2,33,36,34,35,32,31))) {
                        $vinculo->setCursoC8FormaIngressoSelecaoVestibular(1);
                    } else if (in_array($aluno->getIdTipoIngresso(), array(24,28,29,30,37,38,39))) {
                        $vinculo->setCursoC9FormaIngressoSelecaoEnem(1);
                    } else {
                        $vinculo->setCursoC10FormaIngressoSelecaoOutros(1);
                    }

//                    if (in_array($aluno->getIdSituacao(), array(6, 15, 18, 3, 16, 2, 8, 4))) {
//                        $vinculo->setCursoC5SituacaoVinculo(4);
//                    } else if (in_array($aluno->getIdSituacao(), array(1))) {
//                        $vinculo->setCursoC5SituacaoVinculo(6);
////                        $vinculo->setCursoC49SemestreConclusao($aluno->getDtSituacao('dmY'));
//                    } else if (in_array($aluno->getIdSituacao(), array(10))) {
//                        $vinculo->setCursoC5SituacaoVinculo(7);
//                    } else {
//                        $f = new Criteria();
//                        $f->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
//                        $f->add(TbfilaPeer::MATRICULA, $aluno->getMatricula());
//                        $f->add(TbofertaPeer::COD_DISCIPLINA, 'ST999');
//                        $f->add(TbofertaPeer::ID_PERIODO, 219);
//                        if (TbfilaPeer::doCount($f) > 0) {
//                            $vinculo->setCursoC5SituacaoVinculo(3);
//                        } else {
//                            $vinculo->setCursoC5SituacaoVinculo(2);
//                        }
//                    }
                }
                $vinculo->save();
            }
            $censo->setExportado(true);
            $censo->save();
        }
//        $this->censo2009s = Censo2009Peer::doSelect($criteria);

//        $this->setLayout(false);
        $this->redirect('@censo2009');
    }

    public function executeListUpdateCenso(sfWebRequest $request) {
        $this->forward('censo2009', 'UpdateCenso');
    }

    public function executeListUpdatedCenso(sfWebRequest $request) {
        $this->forward('censo2009', 'UpdatedCenso');
    }

    public function executeExportToTXT($request) {

        $this->setLayout(false);

//        $ids = $request->getParameter('ids');

//        if (count($ids)) {
//            $this->censo2009s = $this->setExportValue($ids, true);
//        } else {
        $criteria = new Criteria();
        $criteria->add(Censo2009Peer::ALUNO_C1, 41);
        $criteria->addAnd(Censo2009Peer::CURSO_C1_TIPO_REG2, 42);
        $criteria->addAnd(Censo2009Peer::EXPORTADO, true);
        $criteria->addAscendingOrderByColumn(Censo2009Peer::ALUNO_C5_CPF);
        $criteria->setLimit(2000);
        $criteria->setDistinct();

//        $this->setExportValue($criteria, FALSE);

        $this->censo2009s = Censo2009Peer::doSelect($criteria);
//        }
    }

    public function executeListExportAll() {
        $this->forward('censo2009', 'ExportToTXT');
    }

    public function executeBatchMarkExported($request) {

        $this->forward404Unless($request->isMethod('post'));
        $ids = $request->getParameter('ids');
        $this->setExportValue($ids, true);
        $this->getUser()->setFlash('notice', 'Os itens selecionados foram marcados como exportados');
        #$this->redirect('censo2009');
    }

    public function executeBatchMarkNotExported($request) {

        $this->forward404Unless($request->isMethod('post'));
        $ids = $request->getParameter('ids');
        $this->setExportValue($ids, false);
        $this->getUser()->setFlash('notice', 'Os itens selecionados foram marcados como não exportados');
        #$this->redirect('censo2009');
    }

    public function setExportValue($criteria, $exportado) {

        $censo2009s = Censo2009Peer::doSelect($criteria);

        foreach ($censo2009s as $c) {
            $c->setExportado($exportado);
            $c->save();
        }

        return $censo2009s;
    }

    public function executeListRepopulation() {

        $con = Propel::getConnection(Censo2009Peer::DATABASE_NAME);



//        $sql = "SELECT setval('public.censo2009_id_seq', 1, true)";
//        $statement = $con->prepare($sql);
//        $resultset = $statement->execute();
//
//
//        $sql = "TRUNCATE TABLE censo2009";
//        $statement = $con->prepare($sql);
//        $resultset = $statement->execute();

        $sql = "
INSERT INTO censo2009(
            aluno_c1, aluno_c2, aluno_c3, aluno_c4_nome, aluno_c5_cpf, aluno_c6_doc_estrangeiro,
            aluno_c7_nascimento, aluno_c8_sexo, aluno_c9_cor_raca, aluno_c10_mae,
            aluno_c11_nacionalidade, aluno_c12_uf_nascimento, aluno_c13_cidade_nascimento,
            aluno_c14_pais_origem, aluno_c15_deficiencia, aluno_c16_def_cegueria,
            aluno_c17_def_baixa_visao, aluno_c18_def_surdez, aluno_c19_def_auditiva,
            aluno_c20_def_fisica, aluno_c21_def_surdocegueira, aluno_c22_def_multipla,
            aluno_c23_def_mental, curso_c1_tipo_reg2, curso_c2_id_inep_curso,
            curso_c3_cod_polo_inep, curso_c4_turno_aluno, curso_c5_situacao_vinculo,
            curso_c6_data_ingresso, curso_c7_aluno_publica, curso_c8_forma_ingresso_selecao_vestibular,
            curso_c9_forma_ingresso_selecao_enem, curso_c10_forma_ingresso_selecao_outros,
            curso_c11_forma_ingresso_selecao_pecg, curso_c12_forma_ingresso_outras,
            curso_c13_programa_reserva_vagas, curso_c14_programa_reserva_vagas,
            curso_c15_programa_reserva_vagas, curso_c16_programa_reserva_vagas,
            curso_c17_programa_reserva_vagas, curso_c18_programa_reserva_vagas,
            curso_c19_financiamento_estudantil, curso_c20_financiamento_estudantil,
            curso_c21_financiamento_estudantil, curso_c22_financiamento_estudantil,
            curso_c23_financiamento_estudantil, curso_c24_financiamento_estudantil,
            curso_c25_financiamento_estudantil, curso_c26_financiamento_estudantil_n_reemb,
            curso_c27_financiamento_estudantil_n_reemb, curso_c28_financiamento_estudantil_n_reemb,
            curso_c29_financiamento_estudantil_n_reemb, curso_c30_financiamento_estudantil_n_reemb,
            curso_c31_financiamento_estudantil_n_reemb, curso_c32_financiamento_estudantil_n_reemb,
            curso_c33_apoio_social, curso_c34_tipo_apoio_social, curso_c35_tipo_apoio_social,
            curso_c36_tipo_apoio_social, curso_c37_tipo_apoio_social, curso_c38_tipo_apoio_social,
            curso_c39_tipo_apoio_social, curso_c40_atividade_complementar,
            curso_c41_atividade_complementar, curso_c42_bolsa, curso_c43_atividade_complementar,
            curso_c44_bolsa, curso_c45_atividade_complementar, curso_c46_bolsa,
            curso_c47_atividade_complementar, curso_c48_bolsa, curso_c49_semestre_conclusao, curso_c50_aluno_parfor, exportado)

SELECT

DISTINCT
41 as aluno_c1,
NULL as aluno_c2,
NULL as aluno_c3,
fun_ret_ace(nome,true) as aluno_c4_nome,
cpf as aluno_c5_cpf,
NULL as aluno_c6_doc_estrangeiro,
to_char(dt_nascimento, 'DDMMYYYY') as aluno_c7_nascimento,
(CASE WHEN sexo='M' THEN 0 ELSE 1 END) as aluno_c8_sexo,
0 as aluno_c9_cor_raca,
(CASE WHEN (cpf ~ '[0-9]+') THEN NULL ELSE fun_ret_ace(mae,true) END) as aluno_c10_mae,
(CASE WHEN (ta.nacionalidade=1 OR ta.nacionalidade=0) THEN 1 ELSE 3 END) as aluno_c11_nacionalidade,
NULL as aluno_c12_uf_nascimento,
NULL as aluno_c13_cidade_nascimento,
(CASE WHEN ( ta.nacionalidade IN (0,1) ) THEN 'BRA' ELSE (SELECT COALESCE(sigla,'BRA') FROM tbpais WHERE id_pais=ta.nacionalidade) END) as aluno_c14_pais_origem,
(CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 1 ELSE 0 END) as aluno_c15_deficiencia,

(CASE WHEN ta.id_neces_especial=4 THEN 1 ELSE
CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END
END) as aluno_c16_def_cegueria,
(CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0  ELSE NULL END) as aluno_c17_def_baixa_visao,
(CASE WHEN ta.id_neces_especial=2 THEN 1 ELSE
CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END
END) as aluno_c18_def_surdez,
(CASE WHEN ta.id_neces_especial=3 THEN 1 ELSE
CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END
END) as aluno_c19_def_auditiva,
(CASE WHEN ta.id_neces_especial IN (1,5) THEN 1 ELSE
CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END
END) as aluno_c20_def_fisica,
(CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END) as aluno_c21_def_surdocegueira,
(CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END) as aluno_c22_def_multipla,
(CASE WHEN ta.id_neces_especial IN (4,2,3,1,5) THEN 0 ELSE NULL END) as aluno_c23_def_mental,


42 as curso_c1_tipo_reg2,
tcv.cod_integracao as curso_c2_id_inep_curso,
NULL as curso_c3_cod_polo_inep,
(
CASE
WHEN (tcv.id_turno IN (2))
THEN 1 -- Matutino
ELSE
	CASE
	WHEN (tcv.id_turno IN (3)) THEN
	2 -- Vespertino
        ELSE
            CASE
            WHEN (tcv.id_turno IN (5)) THEN
            3 -- NOTURNO
            ELSE
                --CASE
                --WHEN (tcv.id_turno IN (8)) THEN
                4 -- INTEGRAL
                --END
            END
	END
END
) as curso_c4_turno_aluno
,(
CASE
WHEN (SELECT true FROM tbfila as f JOIN tboferta o USING (id_oferta) WHERE f.id_situacao=1 AND id_periodo IN (SELECT id_periodo FROM tbperiodo WHERE ano = 2012) AND matricula=ta.matricula LIMIT 1)
THEN 2 -- Cursando
WHEN (SELECT true FROM tbfila as f JOIN tboferta o USING (id_oferta) WHERE o.cod_disciplina = 'ST999' AND id_periodo IN (SELECT id_periodo FROM tbperiodo WHERE ano = 2012) AND matricula=ta.matricula LIMIT 1)
THEN 3 -- Matricula trancada
WHEN (SELECT true FROM tbaluno WHERE ta.id_situacao=1 AND matricula=ta.matricula LIMIT 1)
THEN 6 -- formado
WHEN (SELECT true FROM tbaluno WHERE ta.id_situacao=10 AND matricula=ta.matricula LIMIT 1)
THEN 7 -- falecido
WHEN (SELECT true FROM tbaluno WHERE ta.id_situacao in (6,15,18,3,16,2,8,4) AND matricula=ta.matricula LIMIT 1)
THEN 4 -- falecido
ELSE 2
END
) as curso_c5_situacao_vinculo,

to_char(dt_ingresso, 'DDMMYYYY') as curso_c6_data_ingresso,
2 as curso_c7_aluno_publica,
(case when (ta.id_tipo_ingresso NOT IN (24)) THEN 1 else 0 end) as curso_c8_forma_ingresso_selecao_vestibular,
(case when (ta.id_tipo_ingresso IN (24)) then 1 else 0 end) as curso_c9_forma_ingresso_selecao_enem,
0 as curso_c10_forma_ingresso_selecao_outros,
0 as curso_c11_forma_ingresso_selecao_pecg,
0 as curso_c12_forma_ingresso_outras,
0 as curso_c13_programa_reserva_vagas,
null as curso_c14_programa_reserva_vagas,
null as curso_c15_programa_reserva_vagas,
null as curso_c16_programa_reserva_vagas,
null as curso_c17_programa_reserva_vagas,
null as curso_c18_programa_reserva_vagas,
0 as curso_c19_financiamento_estudantil,
null as curso_c20_financiamento_estudantil,
null as curso_c21_financiamento_estudantil,
null as curso_c22_financiamento_estudantil,
null as curso_c23_financiamento_estudantil,
null as curso_c24_financiamento_estudantil,
null as curso_c25_financiamento_estudantil,
null as curso_c26_financiamento_estudantil_n_reemb,
null as curso_c27_financiamento_estudantil_n_reemb,
null as curso_c28_financiamento_estudantil_n_reemb,
null as curso_c29_financiamento_estudantil_n_reemb,
null as curso_c30_financiamento_estudantil_n_reemb,
null as curso_c31_financiamento_estudantil_n_reemb,
null as curso_c32_financiamento_estudantil_n_reemb,
0 as curso_c33_apoio_social,
null as curso_c34_tipo_apoio_social,
null as curso_c35_tipo_apoio_social,
null as curso_c36_tipo_apoio_social,
null as curso_c37_tipo_apoio_social,
null as curso_c38_tipo_apoio_social,
null as curso_c39_tipo_apoio_social,
0 as curso_c40_atividade_complementar,
null as curso_c41_atividade_complementar,
null as curso_c42_bolsa,
null as curso_c43_atividade_complementar,
null as curso_c44_bolsa,
null as curso_c45_atividade_complementar,
null as curso_c46_bolsa,
null as curso_c47_atividade_complementar,
null as curso_c48_bolsa,
(CASE WHEN (SELECT true FROM tbaluno WHERE ta.id_situacao=1 AND matricula=ta.matricula LIMIT 1)
THEN 6 -- formado
ELSE
null
END) as curso_c49_semestre_conclusao,
null as curso_c50_aluno_parfor,
TRUE as exportado

FROM tbfila tf
JOIN tbaluno ta USING (matricula)
JOIN tbcursoversao tcv USING (id_versao_curso)
JOIN tbcurso tc USING (cod_curso)
JOIN tboferta tbo USING (id_oferta)
JOIN tbperiodo tbp USING (id_periodo)

WHERE
tbp.ano = 2012
AND tcv.cod_integracao IS NOT NULL
AND tcv.cod_integracao in ('1161609','1185527')
";
        
//AND ta.dt_ingresso >= '2011-01-01'
//AND ta.dt_ingresso <= '2011-12-31'
        
//AND ta.cpf not in 
//    (select c29.aluno_c5_cpf 
//    from censo2009 as c29
//    where 
//        c29.aluno_c1=41 
//        and c29.aluno_c5_cpf != '' 
//    group by c29.aluno_c5_cpf) 
//AND tc.id_nivel in (1,2,5,9,14)
//and ta.id_situacao in (0,13) 
//and ta.dt_ingresso < '01-01-2013'

        $statement = $con->prepare($sql);
        $resultset = $statement->execute();

        $this->getUser()->setFlash('notice', 'Lista do censo foi reescrita');
        $this->redirect('censo2009');
    }

}
