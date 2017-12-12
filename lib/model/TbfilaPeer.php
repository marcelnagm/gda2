<?php

/**
 * Skeleton subclass for performing query and update operations on the 'tbfila' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue May  4 12:14:36 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbfilaPeer extends BaseTbfilaPeer {

    public static function doSelect(Criteria $criteria, PropelPDO $con = null) {
        $criteria->addJoin(self::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);
        $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);
        $criteria->addAscendingOrderByColumn(TbofertaPeer::TURMA);
        $criteria->addJoin(TbalunoPeer::MATRICULA, self::MATRICULA);
        $criteria->addAscendingOrderByColumn(TbalunoPeer::NOME);
        return parent::doSelect($criteria, $con);
    }

    public static function processarFilaPorPeriodo($id_periodo, $funcoes, $fase) {
        $periodo = TbperiodoPeer::retrieveByPK($id_periodo);


        if (is_array($funcoes)) {
            $sql = '';
            $result = array();

            try {

                $con = Propel::getConnection();

                $con->beginTransaction();

                foreach ($funcoes as $f) {

                    switch ($f) {
                        case 1:
                            $sql = "SELECT set_aceitos(?,?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->bindValue(2, $fase[0]);
                            $stmt->execute();
                            list($result[1]) = $stmt->fetch();
                            break;
                        case 2:
                            $sql = "SELECT set_prerequisitos(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[2]) = $stmt->fetch();
                            break;
                        case 3:
                            $sql = "SELECT set_excesso_ch_eletiva(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[3]) = $stmt->fetch();
                            break;
                        case 4:
                            $sql = "SELECT set_chq_horario(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[4]) = $stmt->fetch();
                            break;
                        case 5:
                            $sql = "SELECT set_ch_rodarfila(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[5]) = $stmt->fetch();
                            break;
                        case 6:
                            $sql = "SELECT set_disc_cursada(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[6]) = $stmt->fetch();
                            break;
                        case 7:
                            $sql = "SELECT set_disc_duplicada(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[7]) = $stmt->fetch();
                            break;
                        case 9:
                            $sql = "SELECT set_formando(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[9]) = $stmt->fetch();
                            break;
                        case 10:
                            $sql = "SELECT set_pontos(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[10]) = $stmt->fetch();
                            break;
                        case 11:
                            $sql = "SELECT set_reprovacoes(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[11]) = $stmt->fetch();
                            break;
                        case 12:
                            $sql = "SELECT set_media_geral(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[12]) = $stmt->fetch();
                            break;
                        case 14:
                            $sql = "SELECT cria_turmas(?)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            list($result[14]) = $stmt->fetch();
//                            $criteria = new Criteria();
//                            $criteria->add(TbofertaPeer::ID_PERIODO, $id_periodo);
//                            $i = 0;
//                            foreach (TbofertaPeer::doSelect($criteria) as $oferta) {
//                                try {
//                                    $oferta->criaTurma();
//                                    $i++;
//                                } catch (Exception $ex) {
//
//                                }
//                            }
//                            sfContext::getInstance()->getUser()->setFlash('notice', 'Turmas criadas: ' . $i);

                            break;
//                    default:
//                        throw new Exception('Processo não implementado');
                        case 15:
                            $sql = "UPDATE tbfila SET id_situacao=0 
                                WHERE id_situacao in (1,2,5) 
                                AND id_oferta IN (SELECT id_oferta FROM tboferta WHERE id_periodo=? AND 
                                cod_disciplina IN (SELECT DISTINCT cod_disciplina FROM tbdisciplinacorequisitos))";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->execute();
                            
                            $codigos = array();
                            $criteria = new Criteria();
                            //pegar disciplinas de corequisitos
                            $criteria->add(TbdisciplinacorequisitosPeer::COD_DISCIPLINA, '%', Criteria::LIKE);
                            $criteria->setDistinct();
                            foreach(TbdisciplinacorequisitosPeer::doSelect($criteria) as $disc) {
                                $codigos[] = $disc->getCodDisciplina();
                            }
                            //pegar ofertas que tem corequisitos
                            $criteria->clear();
                            $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                            $criteria->add(TbofertaPeer::COD_DISCIPLINA, $codigos, Criteria::IN);
                            $criteria->add(TbofertaPeer::ID_PERIODO, $id_periodo, Criteria::EQUAL);
                            $criteria->add(TbfilaPeer::ID_SITUACAO, 0, Criteria::EQUAL);
                            $criteria->addDescendingOrderByColumn(TbfilaPeer::FORMANDO);
                            $criteria->addAscendingOrderByColumn(TbfilaPeer::REPROVACOES);
                            $criteria->addDescendingOrderByColumn(TbfilaPeer::PONTOS);
                            foreach(TbfilaPeer::doSelect($criteria) as $fila) {
                                $corre = new Criteria();
                                $corre->add(TbdisciplinacorequisitosPeer::COD_DISCIPLINA,$fila->getTboferta()->getCodDisciplina());
                                $coreq = new Tbdisciplinacorequisitos();
                                foreach(TbdisciplinacorequisitosPeer::doSelect($corre) as $coreq) {
                                    $onhist = new Criteria();
                                    $onhist->add(TbhistoricoPeer::MATRICULA, $fila->getMatricula());
                                    $onhist->add(TbhistoricoPeer::COD_DISCIPLINA, $coreq->getCodDiscCoRequisito());
                                    $onhist->add(TbhistoricoPeer::ID_CONCEITO, array(1,4,8,13,7,6,11), Criteria::IN);
                                    
                                    $onfila = new Criteria();
                                    $onfila->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                                    $onfila->add(TbfilaPeer::MATRICULA, $fila->getMatricula());
                                    $onfila->add(TbofertaPeer::ID_PERIODO, $id_periodo);
                                    $onfila->add(TbofertaPeer::COD_DISCIPLINA, $coreq->getCodDiscCoRequisito());
                                    $onfila->add(TbfilaPeer::ID_SITUACAO, 1);
                                    
                                    if (TbhistoricoPeer::doCount($onhist)==0 && TbfilaPeer::doCount($onfila)==0) {
                                        $fila->setIdSituacao(2);
                                        $fila->save();
                                    }
                                }
                            }
                            //TODO: pesquisar no historico
                            
                            //TODO: pesquisar na fila
                            list($result[15]) = $stmt->fetch();
                            break;
                        case 16:
                            $sql = "SELECT set_aceitos(?,?,true)";
                            $stmt = $con->prepare($sql);
                            $stmt->bindValue(1, $id_periodo);
                            $stmt->bindValue(2, $fase[0]);
                            $stmt->execute();
                            list($result[16]) = $stmt->fetch();
                            break;
                    }
                }

                $con->commit();

                return $result;
            } catch (Exception $exc) {
                $con->rollBack();
                throw new Exception('Erro ao executar processo(s): ' . $exc->getMessage());
            }
        }
    }

    public static function getDisciplina($matricula, $id_periodo) {
        $criteria = new Criteria();
        $criteria->addJoin(self::ID_OFERTA, TbofertaPeer::ID_OFERTA);
        $criteria->add(TbfilaPeer::MATRICULA, $matricula);
        $criteria->add(TbofertaPeer::ID_PERIODO, $id_periodo);
        return self::doSelect($criteria);
    }

    public static function IsChoqueHorario(tboferta $oferta, $matricula) {

        $con = Propel::getConnection();
        $sql = "SELECT checa_chq_horario(?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $oferta->getIdOferta());
        $stmt->bindValue(2, $matricula);
        $stmt->execute();
        $envia = $stmt->fetch();
        return (boolean) $envia[0];
    }

    public static function IsCursada(tboferta $oferta, $matricula) {
        $criteria = new Criteria();
        if ($oferta->getCodDisciplina() == 'ST999') {
            $criteria->add(TbhistoricoPeer::MATRICULA, $matricula);
            $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
            if (TbhistoricoPeer::doCount($criteria) >= 4) {
                return true;
            } else {
                return false;
            }
        }

        $criteria->add(TbhistoricoPeer::MATRICULA, $matricula);
        $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
        $criteria->add(TbhistoricoPeer::ID_CONCEITO, array(1, 4, 6, 7, 8, 13), Criteria::IN);

        if (TbhistoricoPeer::doCount($criteria) > 0) {
//            $aluno = TbalunoPeer::retrieveByPK($matricula);
//            $criteria->clear();
//            $criteria->addJoin(TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA, TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA);
//            $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
//            $criteria->add(TbgradeEquivalentePeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
//            foreach (TbcurriculodisciplinasPeer::doSelect($criteria) as $grade) {
//                $criteria->clear();
//                $criteria->add(TbhistoricoPeer::MATRICULA, $matricula);
//                $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, $grade->getCodDisciplina());
//                if (TbhistoricoPeer::doCount($criteria) > 0) {
//                    return false;
//                }
//            }
            return true;
        } else {
            $aluno = TbalunoPeer::retrieveByPK($matricula);
            if (in_array($oferta->getCodDisciplina(), $aluno->getDisciplinasEquivalentesCursadas2())) {
                return true;
            }
            return false;
        }

//        if ($oferta->getCodDisciplina() == 'ST999')
//            return 0;
//        $con = Propel::getConnection();
//        $sql = "SELECT checa_disc_cursada(?,?)";
//        $stmt = $con->prepare($sql);
//        $stmt->bindValue(1, $oferta->getCodDisciplina());
//        $stmt->bindValue(2, $matricula);
//        sfContext::getInstance()->getLogger()->debug("sql executado:" . $stmt->queryString);
//        $stmt->execute();
//        $envia = $stmt->fetch();
//
//        return (boolean) $envia[0];
    }

    public static function IsTemPreRequisito(tboferta $oferta, $matricula) {

        $con = Propel::getConnection();
        $sql = "SELECT checa_prerequisitos(?,?)";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(1, $oferta->getCodDisciplina());
        $stmt->bindValue(2, $matricula);
        $stmt->execute();
        $envia = $stmt->fetch();
        return (boolean) $envia[0];
    }

    public static function IsSolicitada(tboferta $oferta, $matricula) {
        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::ID_PERIODO, $oferta->getIdPeriodo());
        $criteria->add(TbofertaPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
        $criteria->add(TbfilaPeer::MATRICULA, $matricula);
        $criteria->add(TbfilaPeer::ID_SITUACAO, array(0,1), Criteria::IN);

        if (TbfilaPeer::doCountJoinTboferta($criteria) >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function IsNivelCorreto(tboferta $oferta, $tbaluno) {

        if ($oferta->getCodDisciplina() == 'ST999')
            return 0;
        if ($tbaluno->getTbcurso()->getIdNivel() == $oferta->getTbcursoRelatedByCodCurso()->getIdNivel()) {
            return 0;
        } else {
            return 1;
        }
    }

    public static function IsTrancamentosMaximo(tboferta $oferta, $matricula) {
        if ($oferta->getCodDisciplina() != 'ST999') {
            return 0;
        } else {
            if (TbalunoPeer::retrieveByPK($matricula)->isCalouro()) {
                sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Calouros não trancam semestre,Baixe e leia a portaria 11 do painel do aluno ');
                return 1;
            }
            $criteria = new Criteria();
            $criteria->add(TbhistoricoPeer::MATRICULA, $matricula);
            $criteria->add(TbhistoricoPeer::COD_DISCIPLINA, 'ST999');
            if (TbhistoricoPeer::doCount($criteria) > 4) {
                return 1;
            } else {
                return 0;
            }
            sfContext::getInstance()->getUser()->setAttribute('fila_horario_erro', 'Numero de Trancamentos Excedidos (Máximo de 4 periodos)<br>Consulte o Regulamento da UFRR (Art 40, Inciso 2, item 1) ');
        }
    }

    public static function IsOfertaCalouros(tboferta $oferta, $matricula) {
        $periodo = TbperiodoPeer::getSemestreAtual($matricula);
//
//        if (strlen(strstr($oferta->getTurma(),'CAL'))>0  && date('d/m/Y') <= $periodo->getDtFimCadastro('d/m/Y') ) {
//            return 1;
//        } else {
        return 0;
//        }
    }

    /**
     *
     * @param Tbaluno $aluno objeto aluno que ira fazer a matricula no semestre inicial
     */
    public static function MatriculaCalouros(Tbaluno $aluno) {


        //pega o semestre atual
        $sem = TbperiodoPeer::getSemestreAtual($aluno)->getSemestre();


        //verifica se a versao de curso em que esta inscrito o aluno começa no semestre atual
        $criteria = new Criteria();
        $criteria->add(TbcursoversaoPeer::SEMESTRE_INICIO, $sem);
        $criteria->add(TbcursoversaoPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
        if (TbcursoversaoPeer::doCount($criteria) == 1) {
            $aluno->setIdSituacao(0);
            $aluno->MatriculaInSemestre(TbperiodoPeer::getSemestreAtual($aluno)->getIdPeriodo());
            $aluno->save();
        } else {
            $aluno->setIdSituacao(0);
//            $aluno->setIdSituacao(13);
            $aluno->save();
        }
        if ($aluno->getIdTipoIngresso() == 6) {
            $aluno->setIdSituacao(12);
            $aluno->save();
        }
    }

}

// TbfilaPeer