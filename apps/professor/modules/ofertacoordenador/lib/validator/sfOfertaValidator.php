<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class sfOfertaValidator extends sfValidatorBase {

    protected function configure($options = array(), $messages = array()) {
        parent::configure($options, $messages);
    }

    protected function doClean($value) {

        $oferta = TbofertaPeer::retrieveByPK($value ['id_oferta']);
        if(isset ($oferta)){
        $oferta->setIdSala($value ['id_sala']);
        if ($oferta->getTbsala()->getDescricao() != 'Não definida' || $oferta->getTbsala()->getDescricao() != 'CAUAMÉ'):
            if (!$oferta->checaHorarios()):
                $string = '';
                foreach (TbofertaPeer::retrieveByPKs(sfContext::getInstance()->getUser()->getAttribute('oferta_horario_erro')) as $ofertas){
                    $string = $ofertas.'<br>'.$string;
                }
                    throw new sfValidatorError($this, "Disciplina com conflito de horário com a disciplina: " . $string);
            endif;
        endif;
        }
        $criteria = new Criteria();
        $criteria->add(TbofertaPeer::COD_DISCIPLINA, isset ($oferta) ? $oferta->getCodDisciplina() : $value ['cod_disciplina'] );
        $criteria->add(TbofertaPeer::TURMA,isset ($oferta)? $oferta->getTurma() : $value ['turma'] );
        $criteria->add(TbofertaPeer::ID_PERIODO,isset ($oferta)? $oferta->getIdPeriodo() : $value ['id_periodo'] );
        if(TbofertaPeer::doCount($criteria) >1){
            throw new sfValidatorError($this, "Disciplina com conflito de turma, Disciplina Já cadastrada com a turma ". $value ['turma'] );
        }

        return $value;
    }

}

?>
