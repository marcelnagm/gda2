<?php

class VerificaAlunoForm extends sfForm {

    private $URLPOST = 'main/Status';

    public function configure() {

        $this->widgetSchema['matricula'] = new sfWidgetFormInput();
        $this->validatorSchema['matricula'] = new sfValidatorRegex(array('pattern' => '/^[0-9]+$/'));
        
        $this->widgetSchema->setNameFormat('VerificaAluno[%s]');
    }

    function save() {
//        $values = $this->getValues();
//
//        $aluno = TbalunoPeer::retrieveByPK($values['matricula']);
//
//        if ($aluno->getIdSituacao() == 0) {
//            sfContext::getInstance()->getUser()->setAttribute('status', 'ok');
//        } else {
//            sfContext::getInstance()->getUser()->setAttribute('status', 'not');
//        }
//        sfContext::getInstance()->getUser()->setAttribute('matricula', $values['matricula']);
    }

    public function getURLPOST() {
        return $this->URLPOST;
    }

}