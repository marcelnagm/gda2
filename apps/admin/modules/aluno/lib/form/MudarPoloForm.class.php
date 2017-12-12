<?php

class MudarPoloForm extends sfForm {

     private  $URLPOST = 'aluno/MudarPoloForm';

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        
        $this->widgetSchema['id_polo'] = new sfWidgetFormPropelChoice(array('model' => 'Tbpolos', 'add_empty' => false));
        $this->validatorSchema['id_polo'] = new sfValidatorPropelChoice(array('model' => 'Tbpolos', 'column' => 'id_polo'));

        $this->widgetSchema->setNameFormat('mudarPolo[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setIdPolo($values['id_polo']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar pólo');
        }
        
    }

     public function getURLPOST(){
        return $this->URLPOST;
    }

}