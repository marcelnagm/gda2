<?php

class TrancamentoRemoveForm extends sfForm {

    public function configure() {
        
        $this->widgetSchema['periodo'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbperiodo',
                        'add_empty' => true,
                        'order_by' => array('Ano', 'DES'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'qual periodo?',
      ));

      $this->validatorSchema['periodo'] = new sfValidatorString();
      $this->widgetSchema->setNameFormat('TrancamentoRemove[%s]');

    }
    
}