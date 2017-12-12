<?php

class MatricularNoSemestreForm extends sfForm {

    private $URLPOST = 'aluno/MatricularNoSemestreForm';

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if (count($ids))
            $this->widgetSchema['ids']->setDefault(implode(',', $ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $alunos = TbalunoPeer::retrieveByPKs($ids);

        $this->widgetSchema['periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => true,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'qual periodo?',
                ));

        $this->validatorSchema['periodo'] = new sfValidatorString();
        $this->widgetSchema->setNameFormat('MatricularNoSemestre[%s]');
    }

    function save() {
        $request = sfContext::getInstance()->getRequest();
        $values = $this->getValues();

//        try {
        $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
        foreach ($list as $aluno) {
//            $aluno->MatriculaInSemetre(1,$values['periodo']);
            $aluno->setIdSituacao(0);
            $aluno->MatriculaInSemestre($values['periodo']);
            $aluno->save();
        }
//        } catch (Exception $exc) {
//            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso '.$exc->getTraceAsString());
//        }
    }

    public function getURLPOST() {
        return $this->URLPOST;
    }

}