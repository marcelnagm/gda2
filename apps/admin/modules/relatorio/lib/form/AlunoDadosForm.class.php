<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoDadosForm extends RelatorioForm {

   protected $tipo = 'Históricos / Diploma';
    protected $titulo = 'Dados do Aluno';
    protected $descricao = 'Digite a matricula do aluno, e o periodo em que ocorreu a conclusão do curso e Pressione Gerar relatório para obter a os dados completos do aluno';
    protected $url = 'relatorio/AlunoDados/';
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

    $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbperiodo',
                        'add_empty' => true,
                        'order_by' => array('Ano', 'DES'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'qual periodo?',
      ));

      $validators['periodo'] = new sfValidatorString(array('required' => false));

            
$widgets['Tipo_Declaracao'] = new sfWidgetFormChoice( array('choices' =>  array(
                                                              'dados_aluno'=>'Ficha de Dados de Alunos da Graduação',
                                                              'dados_aluno_esp'=>'Ficha de Dados de Alunos da Pós-Graduação'
                                                              )

          )

      ,array('default' => 'dados_aluno')
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
        $fields['periodo'] = 'Normalkey';
        $fields['Tipo_Declaracao'] = 'Normalkey';
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
