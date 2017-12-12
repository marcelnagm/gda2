<?php

class MudarConceitoForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        $this->widgetSchema['id_conceito'] = new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => false));
        $this->validatorSchema['id_conceito'] = new sfValidatorPropelChoice(array('model' => 'Tbconceito', 'column' => 'id_conceito'));

        $this->widgetSchema->setNameFormat('mudarConceito[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $list = TbhistoricoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setIdConceito($values['id_conceito']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar conceito');
        }
        
    }

}