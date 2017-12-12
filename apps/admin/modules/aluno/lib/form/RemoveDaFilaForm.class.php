<?php

class RemoveDaFilaForm extends sfForm {

    public function configure() {
        
        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));


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

 function save() {

        $values = $this->getValues();

        try {
            $obj = new Tbaluno();
            $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $criteria = new Criteria();
                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->add( TbofertaPeer::ID_PERIODO,$values['id_periodo']);
                foreach ($obj->getTbfilas() as $fila){
                    $fila->delete();
                }                
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso');
        }

    }
}