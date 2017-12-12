<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoDeclaracaoForm extends RelatorioForm {

    protected $tipo = 'Declaracao';
    protected $titulo = 'Declaraçoes';
    protected $descricao = 'Lista de Declarações disponiveis';
    protected $url = 'relatorio/AlunoDeclaracao?f=2';
    protected $stage = '2';
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
                                                              'abandono_curso'=>'Declaração de Abandono de Curso',
                                                              'conclusao_curso'=>'Declaração de Provavel Formando',
                                                              'cancelamento_curso'=>'Declaração de Cancelamento de Curso',                                                              
                                                              'aluno_regular_com'=>'Declaração de Aluno Regular Com Fila Eletrônica',
                                                              'aluno_regular_sem'=>'Declaração de Aluno Outras Situações',
                                                              'aluno_regular_sem_plus'=>'Declaração de Aluno Outras Situações com Fila Eletrônica',
                                                              'aluno_regular_porcentagem'=>'Declaração de Aluno Com Porcentagens'
          )
                                                              
          )

      ,array('default' => '')
      );
      $validators['Tipo_Declaracao']  = new sfValidatorString();

      $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbperiodo',                       
                        'add_empty' => true,
                        'order_by' => array('Ano', 'DES'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'qual periodo?',
      ));

      $validators['periodo'] = new sfValidatorString();

            
      
        

      $this->setWidgets($widgets);
      $this->setValidators($validators);
      
      $this->getValidatorSchema()->setPostValidator(new sfDeclaracaoValidator());

      $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function setAlunosCriteria(Criteria $criteria) {
        $this->criteriaAluno = $criteria;
    }

    public function getAlunosCriteria() {
        return $this->criteriaAluno instanceof Criteria ? $this->criteriaAluno : new Criteria();
    }

    public function getFields() {
        $fields = array();
        $fields['matricula'] = 'ForeignKey';
        $fields['Tipo_Declaracao'] = 'NormalKey';
        $fields['periodo'] = 'NormalKey';


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

    function getStage() {
        return $this->stage;
    }

    function setStage($stage) {
        $this->stage = $stage;        
    }

}
