<?php

/**
 * Skeleton subclass for performing query and update operations on the 'tbturma' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Wed May 12 08:42:49 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class TbturmaPeer extends BaseTbturmaPeer {

    public static function criarTurmaDaFilaOferta($id_oferta) {
        /* TODO: procedimento para criar turma a partir da fila, por oferta */
    }

    public static function criarTurmaDaFilaPeriodo($id_periodo) {
        /* TODO: procedimento para criar turma a partir da fila, por periodo */
    }

    /**
     * Transfere as faltas,media_final,id_conceito das turmas
     * do período de ID $id_periodo para o historico
     *
     * @param int $id_periodo
     */
    public static function transferirNotasHistoricoPorPeriodo($id_periodo) {

        $con = Propel::getConnection();

        try {

            $sql = "SELECT id_turma FROM tbturma
                WHERE notas_no_historico = false AND checa_notas_completo(id_turma) = true AND id_periodo = ?";
            $stmt = $con->prepare($sql);
            $stmt->bindValue(1, $id_periodo);

            $stmt->execute();

            $ids_turma = array();
            while ($result = $stmt->fetch()) {
                $ids_turma[] = $result['id_turma'];
            }


            if (count($ids_turma) == 0) {
                throw new Exception('Nenhuma turma a ser transferida');
            }
        } catch (Exception $exc) {
            throw new Exception('Erro ao listar turmas para transferir:' . $exc->getMessage());
        }


        $erros = array();

        foreach ($ids_turma as $id) {

            try {
                $turma = TbturmaPeer::retrieveByPK($id);
                $turma->setNotasNoHistorico(true);
            } catch (Exception $exc) {
                $erros[] = $exc->getMessage();
            }
        }

        if (count($erros)) {
            $message = implode(';', $erros);
            throw new Exception($message);
        }
    }

    /**
     * Retorna as turmas associadas a um professor
     *
     * @param string $matricula_prof
     * a matricula do professor
     * @return array
     */
    public static function retrieveByProfessor($matricula_prof) {

        if (empty($matricula_prof)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TbturmaPeer::DATABASE_NAME);

            $criteria->addJoin(TbturmaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
            $criteria->addJoin(TbturmaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);

            $criteria->add(TbturmaProfessorPeer::MATRICULA_PROF, $matricula_prof);

            $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO, false);

            $criteria->add(TbperiodoPeer::DT_INICIO_AJUSTE_RESULTADO, date('Y-m-d'), Criteria::LESS_EQUAL);
            $criteria->add(TbperiodoPeer::DT_FIM_NOTAS, date('Y-m-d'), Criteria::GREATER_EQUAL);


            $criteria->addAscendingOrderByColumn(TbturmaPeer::COD_DISCIPLINA);
            $criteria->addAscendingOrderByColumn(TbturmaPeer::TURMA);

            $objs = TbturmaPeer::doSelectJoinAll($criteria);
            $objs = array_merge($objs, TbturmaPeer::getProfessorTicket($matricula_prof));
        }
        return $objs;
    }

    /**
     * Retorna as turmas associadas a um professor
     *
     * @param string $matricula_prof
     * a matricula do professor
     * @return array
     */
    public static function retrieveByProfessorFinalized($matricula_prof) {

        if (empty($matricula_prof)) {
            $objs = array();
        } else {
            $criteria = new Criteria(TbturmaPeer::DATABASE_NAME);

            $criteria->addJoin(TbturmaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
            $criteria->addJoin(TbturmaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);

            $criteria->add(TbturmaProfessorPeer::MATRICULA_PROF, $matricula_prof);

            $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO, true);

            $criteria->add(TbperiodoPeer::DT_INICIO, (date('Y') - 2).'-01-01', Criteria::GREATER_EQUAL);


            $criteria->addDescendingOrderByColumn(TbturmaPeer::ID_PERIODO);
            $criteria->addAscendingOrderByColumn(TbturmaPeer::COD_DISCIPLINA);
            $criteria->addAscendingOrderByColumn(TbturmaPeer::TURMA);

            $objs = TbturmaPeer::doSelectJoinAll($criteria);
            $objs = array_merge($objs, TbturmaPeer::getProfessorTicket($matricula_prof));
        }
        return $objs;
    }

    /**
     * Verifica se o professor é o professor da turma
     * <br>
     * @param string $matricula_prof
     * a matricula do professor
     * @param int $id_turma
     * o id da turma
     * @return boolean
     */
    public static function professorDaTurma($matricula_prof, $id_turma) {

        $criteria = new Criteria();
        $criteria->add(TbturmaProfessorPeer::MATRICULA_PROF, $matricula_prof);
        $criteria->add(TbturmaProfessorPeer::ID_TURMA, $id_turma);

        return (TbturmaProfessorPeer::doCount($criteria) == 1) ? true : false;
    }

    /**
     * Retorna as turmas que podem ser editadas pelo professor, baseado na<br>
     * tabela Tbprofessorticket
     * <br>
     * @param string $matricula_prof
     * a matricula do professor
     * @return array
     */
    public static function getProfessorTicket($matricula_prof) {

        $criteria = new Criteria();
        $criteria->add(TbprofessorticketPeer::MATRICULA_PROF, $matricula_prof);
        $criteria->add(TbprofessorticketPeer::DT_INICIO, date('Y-m-d'), Criteria::LESS_EQUAL);
        $criteria->add(TbprofessorticketPeer::DT_FIM, date('Y-m-d'), Criteria::GREATER_EQUAL);

        $ticket = new Tbprofessorticket();
        $temp = array();
        foreach (TbprofessorticketPeer::doSelect($criteria) as $ticket) {
            $temp[] = $ticket->getIdPeriodo();
        }
        $criteria->clear();
        $criteria->addJoin(TbturmaPeer::ID_TURMA, TbturmaProfessorPeer::ID_TURMA);
        $criteria->add(TbturmaProfessorPeer::MATRICULA_PROF, $matricula_prof);
        $criteria->add(TbturmaPeer::ID_PERIODO, $temp, Criteria::IN);
        $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO, false);

        return TbturmaPeer::doSelect($criteria);
    }

}

// TbturmaPeer
