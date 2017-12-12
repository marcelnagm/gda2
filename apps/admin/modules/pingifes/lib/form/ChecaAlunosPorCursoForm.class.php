<?php

class ChecaAlunosPorCursoForm extends sfForm {

    public function configure() {

        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcursoversao',
                        'add_empty' => true,
                        'order_by'  => array('Descricao','ASC'),
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Curso'
        ));
        
        $this->widgetSchema['id_versao_curso']->setLabel('Cursos');
        $this->validatorSchema['id_versao_curso'] = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcursoversao',
                        'column' => 'id_versao_curso',
                        'multiple' => true,
                        'required' => false
        ));
        
        $this->widgetSchema['mostrarSomentePendentes'] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['mostrarSomentePendentes']->setLabel('Mostrar somente pendências');
        $this->validatorSchema['mostrarSomentePendentes'] = new sfValidatorBoolean();

        $this->widgetSchema->setNameFormat('checaAlunos[%s]');
        
    }
    

    public function getFields() {
        return array(
            'id_versao_curso' => 'ForeingKey',
            'mostrarSomentePendentes' => 'NormalKey',
        );
    }

}