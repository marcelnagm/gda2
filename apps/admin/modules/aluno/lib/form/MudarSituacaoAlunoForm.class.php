<?php

class MudarSituacaoAlunoForm extends sfForm {

    private  $URLPOST = 'aluno/mudarSituacaoAlunoForm';

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));
        

        $this->widgetSchema['id_situacao'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbalunosituacao',
                        'order_by'  => array('Descricao','ASC'),
                        'add_empty' => false,
                        'expanded'  => false,
                        'multiple'  => false,
                        'label'     => 'Situacao do Aluno',
                ),
                array('size' => 8)
        );

        $this->validatorSchema['id_situacao'] = new sfValidatorPropelChoice(array('model' => 'Tbalunosituacao', 'column' => 'id_situacao','required' => 'true'));

        
        $this->widgetSchema['dt_situacao'] = new sfWidgetFormDate(array(
                        'format'=>'%day%/%month%/%year%',                        
        ));
        $this->validatorSchema['dt_situacao'] = new sfValidatorDate(array('required' => 'true'));


        $this->widgetSchema->setNameFormat('mudarVersaoCurso[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $obj = new Tbaluno();
            $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setIdSituacao($values['id_situacao']);
                $obj->setDtSituacao($values['dt_situacao']);
                $obj->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso');
        }
        
    }

    public function getURLPOST(){
        return $this->URLPOST;
    }


}