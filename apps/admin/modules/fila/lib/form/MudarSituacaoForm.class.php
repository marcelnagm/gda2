<?php

class MudarSituacaoForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        $this->widgetSchema['id_situacao'] = new sfWidgetFormPropelChoice(array('model' => 'Tbfilasituacao', 'add_empty' => false));
        $this->validatorSchema['id_situacao'] = new sfValidatorPropelChoice(array('model' => 'Tbfilasituacao', 'column' => 'id_situacao'));

        $this->widgetSchema->setNameFormat('mudarSituacao[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $list = TbfilaPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setIdSituacao($values['id_situacao']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar situação: '. $exc->getMessage());
        }
        
    }

}