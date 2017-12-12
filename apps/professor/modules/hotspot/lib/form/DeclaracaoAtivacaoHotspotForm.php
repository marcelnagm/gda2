<?php

class DeclaracaoAtivacaoHotspotForm extends sfForm {

    public function configure() {

        $widgets['aceito'] = new sfWidgetFormInputCheckbox(array('label' => 'Eu li e me comprometo com o que está descrito acima'));

        $validators['aceito'] = new sfValidatorBoolean(array('required' => true), array('required' => 'Leia o texto acima para continuar'));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('declaracao[%s]');
    }

}
?>
