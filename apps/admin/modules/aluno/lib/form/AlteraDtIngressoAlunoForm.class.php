<?php

class AlteraDtIngressoAlunoForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        
        $this->widgetSchema['dt_ingresso'] = new sfWidgetFormDate(array(
                        'format'=>'%day%/%month%/%year%',                        
        ));
        $this->validatorSchema['dt_ingresso'] = new sfValidatorDate(array('required' => 'true'));


        $this->widgetSchema->setNameFormat('AlteraDtIngresso[%s]');

    }

    function save() {

        $values = $this->getValues();

        try {
            $obj = new Tbaluno();
            $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setDtIngresso($values['dt_ingresso']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar nova data de ingresso');
        }
        
    }

}