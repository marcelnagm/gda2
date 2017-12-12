<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfFilaValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $oferta = TbofertaPeer::retrieveByPK($value ['id_oferta']);
        $id_situacao = $value ['id_situacao'];
        $matricula = $value ['matricula'];
        $aluno = TbalunoPeer::retrieveByPK($matricula);

        if ($id_situacao == 1) {
            $filaResult = TbfilaPeer::IsChoqueHorario($oferta, $matricula);
            if ($filaResult != '0') {
                throw new sfValidatorError($this, "Disciplina com Choque de horário");
            }
            $filaResult = TbfilaPeer::IsTemPreRequisito($oferta, $matricula);
            if ($filaResult != true) {
                $criteria = new Criteria();
                $criteria->setDistinct();
                $criteria->add(TbdisciplinarequisitosPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
                $criteria->add(TbdisciplinarequisitosPeer::ID_VERSAO_CURSO, $aluno->getIdVersaoCurso());
                //se não possuir pré-requisitos na versao dele então procura geral
                if (TbdisciplinarequisitosPeer::doCount($criteria) == 0) {
                    $criteria->clear();
                    $criteria->setDistinct();
                    $criteria->add(TbdisciplinarequisitosPeer::COD_DISCIPLINA, $oferta->getCodDisciplina());
                    $criteria->add(TbdisciplinarequisitosPeer::ID_VERSAO_CURSO, 0);
                }
                
                $message = 'Disciplina sem pré-requisito' . "\n" . 'Requisitos : ';
                $disciplinas = new Tbdisciplinarequisitos();
                foreach (TbdisciplinarequisitosPeer::doSelect($criteria) as $disciplinas) {
                    $message .= $disciplinas->getTbdisciplinaRelatedByCodDiscRequisito() . ";\n";
                }
                throw new sfValidatorError($this, $message);
            }
            $filaResult = TbfilaPeer::IsCursada($oferta, $matricula);
            if ($filaResult) {
                throw new sfValidatorError($this, "Disciplina ja cursada");
            }
            $filaResult = TbfilaPeer::IsSolicitada($oferta, $matricula);
            if ($filaResult != '0') {
                throw new sfValidatorError($this, "Disciplina ja solicitada");
            }
        }
        $value['id_oferta'] = $oferta->getIdOferta();
        $value ['id_situacao'] = $id_situacao;
        $value ['matricula'] = $matricula;

        return $value;
    }

}

?>
