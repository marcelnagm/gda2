<?php

class TermoCompromissoForm extends sfForm {

    public function configure() {

        $widgets['aceito'] = new sfWidgetFormInputCheckbox(array('label' => 'Eu li e concordo com o termo de compromisso acima'));

        $validators['aceito'] = new sfValidatorBoolean(array('required' => true), array('required' => 'Leia o termo de compromisso para continuar'));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('termo[%s]');
    }

}
?>
