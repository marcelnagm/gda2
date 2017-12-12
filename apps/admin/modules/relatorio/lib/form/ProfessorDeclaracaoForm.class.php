<?php
/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class ProfessorDeclaracaoForm extends RelatorioForm {

    protected $tipo      = 'Declaracao';
    protected $titulo    = 'Declaraçoes';
    protected $descricao = 'Lista de Declarações disponiveis';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $templateVars = array();

    public function configure() {


        $widgets['professor'] = new sfWidgetFormPropelChoice(  array(
                        'model'     => 'Tbprofessor',
                        'key_method'=> 'getMatriculaProf',
                        'add_empty' => false,
                        'order_by'  => array('Nome','ASC'),
                        'expanded'  => false,
                        'multiple'  => false,
                        'label'     => 'Professor'
        ));
       $widgets['Tipo_Declaração'] = new sfWidgetFormChoice( array('choices' =>  array('Disciplinas_Ministradas'=>'Declaração de Disciplinas Ministradas','Diversas' =>'Diversas')),array());


        $validators['professor'] = new sfValidatorPropelChoice(array(
                        'model' => 'Tbprofessor',
                        'column' => 'matricula_prof',
                        'required' => false
        ));
        
        $validators['Tipo_Declaração'] = new sfValidatorString();

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
        

    }

    public function getFields() {
        return array(
                'professor' => 'ForeignKey','Tipo_Declaração' => 'Normal'
        );
    }

    function getTemplate() {
        return 'ProfessorDeclaracao';
    }

    function getLayout() {
        return true;
    }

    function getURLPost() {
        return 'relatorio/ProfessorDeclaracao/';
    }

}
