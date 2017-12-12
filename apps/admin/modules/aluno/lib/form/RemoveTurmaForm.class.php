<?php

class RemoveTurmaForm extends sfForm {

    public function configure() {


      $widgets['id_periodo'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbperiodo',
                        'add_empty' => true,
                        'order_by' => array('Ano', 'DES'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'qual periodo?',
      ));

      $validators['id_periodo'] = new sfValidatorString();





      $this->setWidgets($widgets);
      $this->setValidators($validators);


    }


}