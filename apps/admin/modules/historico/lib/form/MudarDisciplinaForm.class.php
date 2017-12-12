<?php

class MudarDisciplinaForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        $this->widgetSchema['cod_disciplina'] = new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => false));
        $this->validatorSchema['cod_disciplina'] = new sfValidatorPropelChoice(array('model' => 'Tbdisciplina', 'column' => 'cod_disciplina'));

        $this->widgetSchema->setNameFormat('mudarDisciplina[%s]');

    }

    function save() {        
        $values = $this->getValues();        
        try {
            $list = TbhistoricoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setCodDisciplina($values['cod_disciplina']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar disciplina');
        }
        
    }

}