<?php

class MudarVersaoCursoForm extends sfForm {

     private  $URLPOST = 'aluno/MudarVersaoCursoForm';

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));

        $alunos = TbalunoPeer::retrieveByPKs($ids);
        
        $cursos = array();
        foreach($alunos as $a) {
            $cursos[] = $a->getTbcursoversao()->getCodCurso();
        }

        $criteria = new Criteria();
        $criteria->add(TbcursoversaoPeer::COD_CURSO, $cursos, Criteria::IN);
        $criteria->addAscendingOrderByColumn(TbcursoversaoPeer::DESCRICAO);
        
        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'criteria' => $criteria, 'add_empty' => false));
        $this->validatorSchema['id_versao_curso'] = new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'column' => 'id_versao_curso'));

        $this->widgetSchema->setNameFormat('mudarVersaoCurso[%s]');

    }

    function save() {
        
        $values = $this->getValues();
        
        try {
            $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
            foreach($list as $obj) {
                $obj->setIdVersaoCurso($values['id_versao_curso']);
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