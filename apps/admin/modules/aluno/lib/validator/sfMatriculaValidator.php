<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfMatriculaValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $curso = TbcursoversaoPeer::retrieveByPK($value['id_versao_curso'])->getTbcurso()->getCodCurso();
        $criteria = new Criteria();
        $criteria->add(TbalunoPeer::MATRICULA, $value['ano_ingresso'] . $value['semestre'] . $curso . $value['posicao']);
        if (TbalunoPeer::doCount($criteria) >= 1) {
            throw new sfValidatorError($this, "Este aluno já efetuou a matricula - " . sfContext::getInstance()->getUser()->getAttribute('import') ? $value['matricula'] : TbalunoPeer::retrieveByPK($value['ano_ingresso'] . $value['semestre'] . $curso . $value['posicao']));
        }

        return $value;
    }

}
?>
