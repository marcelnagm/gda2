<?php

class MudarOfertaForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        
        $criteria = new Criteria();
        $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
        $criteria->add(TbperiodoPeer::ANO, date('Y') - 2, Criteria::GREATER_EQUAL);
        $this->widgetSchema['id_oferta'] = new sfWidgetFormPropelChoice(array('model' => 'Tboferta', 'add_empty' => false, 'criteria' => $criteria));
        $this->validatorSchema['id_oferta'] = new sfValidatorPropelChoice(array('model' => 'Tboferta', 'column' => 'id_oferta'));

        $this->widgetSchema->setNameFormat('mudarOferta[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $list = TbfilaPeer::retrieveByPKs(explode(',', $values['ids']));
            $obj = new Tbfila();
            foreach($list as $obj) {
                $temp = new Tbfila();
                $temp = $obj->copy();
                $obj->delete();
                $temp->setIdOferta($values['id_oferta']);
                $temp->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar oferta: '. $exc->getMessage());
        }
        
    }

}