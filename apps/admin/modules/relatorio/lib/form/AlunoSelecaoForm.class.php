<?php
/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoSelecaoForm extends RelatorioForm {

    protected $tipo      = 'Declaracao';
    protected $titulo    = 'Declarações';
    protected $descricao = 'Lista de Declarações disponiveis';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $templateVars = array();

    public function configure() {



            $widgets['cod_curso'] = new sfWidgetFormPropelChoice(array(
                        'model' => 'Tbcurso',
//                        'method'=> 'getDescricao',
                        'add_empty' => true,
                        'order_by' => array('Descricao', 'ASC'),
                        'expanded' => false,
                        'multiple' => false,
                        'label' => 'Curso'
                    ));


            $validators['cod_curso'] = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false
                    ));


    
        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'cod_curso' => 'ForeignKey'
        );
    }

    function executaRelatorio() {

    }

    /**
     * Retorna as variaveis que serao usadas no
     * template para o OdtPHP, em uma array
     *
     * @return array
     */
    function getTemplateVars() {
        return $this->templateVars;
    }

    function getTemplate() {
        return 'AlunoSelecao';
    }

    function getLayout() {
        return false;
    }


    function getURLPost() {
        return 'relatorio/AlunoDeclaracao?f=1';
    }
    
}