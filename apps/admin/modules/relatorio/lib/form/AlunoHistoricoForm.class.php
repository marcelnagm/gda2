<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoHistoricoForm extends RelatorioForm {

   protected $tipo = 'Históricos / Diploma';
    protected $titulo = 'Históricos de Aluno / Diploma';
    protected $descricao = '';
    protected $url = 'relatorio/AlunoHistorico/';
    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $criteriaAluno;

    public function configure() {



 $widgets['matricula'] = new sfWidgetFormInput();
//
//
      $validators['matricula'] = new sfValidatorPropelChoice(array(
                        'model' => 'Tbaluno',
                        'column' => 'matricula',
                        'required' => false,
      ));

      $widgets['Tipo_Declaracao'] = new sfWidgetFormChoice( array('choices' =>  array("",                                                              
                                                              'historico'=>'Histórico Comum',
                                                              'historico_final'=>'Histórico Final (Graduação)',
                                                              'historico_final_mestrado'=>'Histórico Final (Mestrado)',
                                                              'historico_final_mestrado_procisa'=>'Histórico Final (Mestrado PROCISA)',
                                                              'historico_final_esp'=>'Histórico Final (Especialização)',
                                                              'historico_final_sequencial'=>'Histórico Final (Sequencial)'
                                                              
                                                           ))

      ,array('default' => '')
      );
      $validators['Tipo_Declaracao']  = new sfValidatorString();

    


      $this->setWidgets($widgets);
      $this->setValidators($validators);
     

      $this->widgetSchema->setNameFormat('relatorio[%s]');
      $this->getValidatorSchema()->setPostValidator(new sfMatriculaValidator());
    }


    public function getFields() {
        $fields = array();
        $fields['matricula'] = 'Normalkey';
        $fields['Tipo_Declaracao'] = 'NormalKey';
        return $fields;
    }

    function getTemplate() {
        return 'AlunoDeclaracao';
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
