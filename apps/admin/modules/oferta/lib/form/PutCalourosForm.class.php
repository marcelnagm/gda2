<?php

class PutCalourosForm extends sfForm {

    private $URLPOST = 'oferta/PutCalourosForm';

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = $request->getAttribute('ids');

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        $this->widgetSchema['ids']->setDefault(implode(',', $ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $this->widgetSchema['id_periodo'] = new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => false));
        $this->validatorSchema['id_periodo'] = new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo'));

        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false));
        $this->validatorSchema['id_versao_curso'] = new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso'));

        $this->widgetSchema->setNameFormat('putCalouros[%s]');
    }

    function save() {

        $values = $this->getValues();

        $list = TbofertaPeer::retrieveByPKs(explode(',', $values['ids']));
        foreach ($list as $oferta) {
            $obj = new Tbfilacalouros();
            $obj->setIdOferta($oferta->getIdOferta());
            $obj->setIdPeriodo($values['id_periodo']);
            $obj->setIdVersaoCurso($values['id_versao_curso']);
            $obj->save();
        }
    }

    public function getURLPOST() {
        return $this->URLPOST;
    }

    public function getFields() {
        return array(
            'id_periodo' => 'ForeignKey',
            'id_versao_curso' => 'ForeignKey',
            'ids' => 'Array',
        );
    }

}