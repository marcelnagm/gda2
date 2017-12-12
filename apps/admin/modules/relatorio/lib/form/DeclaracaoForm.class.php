<?php
/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class DeclaracaoForm extends RelatorioForm {

    protected $tipo      = 'Declaracao';
    protected $titulo    = 'Declarações';
    protected $descricao = 'Lista de Declarações disponiveis';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $templateVars = array();

    public function configure() {

        # campos
        $widgets['Tipo_de_Declaração'] = new sfWidgetFormChoice(
                array('choices' =>  array("", 'Aluno'=>'Declarações de Aluno', 'ProfessorDeclaracao'=>'Declaração de Professor','Diversas' =>'Diversas')),array('default' => '','onChange' => "window.location.href='/admin/relatorio/' + this.options[this.selectedIndex].value + "/"."));
    

        $this->setWidgets($widgets);
        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'Tipo_de_Declaração' => 'NormalKey'
        );
    }

    function executaRelatorio() {

        $form_values = $this->getValues();
            $this->resultado['Tipo_de_Declaração'] = $form_values['Tipo_de_Declaração'];


     
        return $this->resultado;
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
        return 'DeclaracaoDisciplinasMinistradas';
    }

    function getLayout() {
        return false;
    }
    
}