<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class FrequenciaForm extends RelatorioForm {

    protected $tipo = 'Freqüência dos Servidores';
    protected $titulo = 'Freqüência dos Servidores';
    protected $descricao = '';
    protected $url = 'relatorio/Frequencia/';
    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $criteriaAluno;

    public function configure() {

//        $widgets['mes'] = new sfWidgetFormDate(array('format' => '%month%/%year%'));
        $widgets['mes'] = new sfWidgetFormChoice(array('choices' => array(
            '01' => 'Janeiro',
            '02' => 'Fevereiro',
            '03' => 'Março',
            '04' => 'Abril',
            '05' => 'Maio',
            '06' => 'Junho',
            '07' => 'Julho',
            '08' => 'Agosto',
            '09' => 'Setembro',
            '10' => 'Outubro',
            '11' => 'Novembro',
            '12' => 'Dezembro',
        )));
        $widgets['mes']->setLabel('Mês');
        $validators['mes'] = new sfValidatorString();
        
        $widgets['tipo'] = new sfWidgetFormChoice(array('choices' => array(
            '0' => 'Efetivo',
            '1' => 'Terceirizado',
        )));
        $widgets['tipo']->setLabel('Tipo de Servidor');
        $validators['tipo'] = new sfValidatorString();
        
        $widgets['ano'] = new sfWidgetFormChoice(array('choices' => array(
            '2013' => '2013',
            '2014' => '2014',
            '2015' => '2015',
            '2016' => '2016',
        )));
        $validators['ano'] = new sfValidatorString();
        
        $widgets['nome'] = new sfWidgetFormInput();
        $validators['nome'] = new sfValidatorString();
        
        $widgets['cargo'] = new sfWidgetFormInput();
        $validators['cargo'] = new sfValidatorString();

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    public function getFields() {
        $fields = array();
        $fields['mes'] = 'NormalKey';
        $fields['ano'] = 'NormalKey';
        $fields['nome'] = 'NormalKey';
        $fields['cargo'] = 'NormalKey';
        $fields['tipo'] = 'NormalKey';
        return $fields;
    }

    function getTemplate() {
        return 'Frequencia';
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
