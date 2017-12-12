<?php

/**
 * Description of ProvaveisFormandosForm
 *
 * Validates a report form.
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class RelatorioDisciplinasCursarForm extends RelatorioForm {

    protected $tipo = 'Lista';
    protected $titulo = 'Lista de Disciplinas a Cursar';
    protected $descricao = 'Lista de Disciplinas que faltam ao aluno cursar em relação a curriculo de disciplinas da versão do curso ';
    protected $aluno ;

    public function configure() {

        $widgets['matricula'] = new sfWidgetFormInput();

         $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbperiodo',
                        'add_empty' => true,
                        'order_by' => array('Ano', 'DES'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'qual periodo?',
      ));


        $widgets['show_fields'] = new sfWidgetFormChoice(
                        array(
                            'choices' => $this->getModelFields(),
                            'expanded' => true,
                            'multiple' => true,
                ));
       
        $validators['matricula'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbaluno',
                    'column' => 'matricula',
                    'required' => false,
                ));

        $validators['show_fields'] = new sfValidatorChoice(array(
                    'choices' => array_keys($this->getModelFields()),
                    'multiple' => true,
                    'required' => true
                ));
        $validators['periodo'] = new sfValidatorString();


        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
        $this->getValidatorSchema()->setPostValidator(new sfMatriculaValidator());
    }

    function getModelFields() {
        $t =new Tbdisciplina();

        $model_fields = TbdisciplinaPeer::getFieldNames(BasePeer::TYPE_PHPNAME);
        return $model_fields;
    }

    public function getFields() {
        return array(
            'matricula' => 'String',
            'periodo' => 'String',
            'show_fields' => 'Number'
        );
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     */
    function executaRelatorio() {

        try {
            $form_values = $this->getValues();
            $aluno = TbalunoPeer::retrieveByPK($form_values['matricula']);
            $result['periodo'] = TbperiodoPeer::retrieveByPK($form_values['periodo']);
            $result['idperiodo'] = $form_values['periodo'];
            $result['aluno'] = $aluno;
            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();
            $result['list'] = TbdisciplinaPeer::retrieveByCodDisciplina($aluno->getDisciplinasACursar($form_values['periodo']));
            $result['list2'] = TbdisciplinaPeer::retrieveByCodDisciplina($aluno->getDisciplinasIntbfila($form_values['periodo'])) ;
        } catch (PropelException $exc) {
#throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception(utf8_decode($exc->getMessage()));
        }

        return $result;
    }

}

?>