<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoDiplomaForm extends RelatorioForm {

    protected $tipo = 'Declaracao';
    protected $titulo = 'Declaraçoes';
    protected $descricao = 'Lista de Diplomas disponiveis';
    protected $url = 'relatorio/AlunoDiploma';
    protected $name = 'AlunoDiplomaForm';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    public function configure() {


        $widgets['matricula'] = new sfWidgetFormInput();
//
//
        $validators['matricula'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbaluno',
                    'column' => 'matricula',
                    'required' => false,
                ));

        $widgets['Tipo_Declaracao'] = new sfWidgetFormChoice(array('choices' => array(
                        'diploma' => 'Diploma de Graduação',
                        'diploma_sequencial' => 'Diploma de Sequencial',
                        'diploma_mestrado' => 'Diploma de Mestrado',
                        'diploma_verso' => 'Diploma (Verso)'
                        ))
        );

        $validators['Tipo_Declaracao'] = new sfValidatorString();


        $widgets['data_colacao'] = new sfWidgetFormDate();
        $validators['data_colacao'] = new sfValidatorDate(array(
                    'required' => false,
                ));


        $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => true,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'qual periodo?',
                ));

        $validators['periodo'] = new sfValidatorString(array(
                    'required' => false,
                ));


        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
        $this->getValidatorSchema()->setPostValidator(new sfMatriculaValidator());
    }

    public function getFields() {
        $fields = array();
        $fields['matricula'] = 'String';
        $fields['periodo'] = 'ForeignKey';
        $fields['data_colacao'] = 'Date';
        $fields['Tipo_Declaracao'] = 'String';


        return $fields;
    }

    function getTemplate() {
        return 'AlunoDiploma';
    }

    function getLayout() {
        return false;
    }

    function getURLPost() {
        return $this->url;
    }

    function setURLPost($url) {
        $this->url = $url;
    }

}
