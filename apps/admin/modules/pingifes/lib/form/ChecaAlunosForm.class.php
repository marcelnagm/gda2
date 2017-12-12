<?php

class ChecaAlunosForm extends sfForm {

    public function configure() {

        $this->widgetSchema['matriculas'] = new sfWidgetFormTextarea(array(),array('rows'=>10, 'cols'=>12));
        $this->widgetSchema['matriculas']->setLabel('Matrículas (uma matrícula por linha)');
        $this->validatorSchema['matriculas'] = new sfvalidatorRegex(array('pattern' => '/^ *[0-9]+ *(\r\n* *[0-9]* *)*$/'));
        
        $this->widgetSchema['mostrarSomentePendentes'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['mostrarSomentePendentes']->setLabel('Mostrar somente pendências');
        $this->validatorSchema['mostrarSomentePendentes'] = new sfValidatorBoolean();

        $this->widgetSchema->setNameFormat('checaAlunos[%s]');
        
    }
    

    public function getFields() {
        return array(
            'matriculas' => 'NormalKey',
            'mostrarSomentePendentes' => 'NormalKey',
        );
    }

}