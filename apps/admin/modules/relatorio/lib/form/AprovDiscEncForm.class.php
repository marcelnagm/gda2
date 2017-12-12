<?php

/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AprovDiscEncForm extends RelatorioForm {

    protected $tipo = 'Aproveitamento de Disciplina';
    protected $titulo = 'Encaminhamento de Aproveitamento de Disciplina';
    protected $descricao = '';
    protected $url = 'relatorio/AprovDiscEnc/';
    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $criteriaAluno;

    public function configure() {

        $widgets['num_processo'] = new sfWidgetFormInput();
        $validators['num_processo'] = new sfValidatorString();

        $widgets['matricula'] = new sfWidgetFormInput();
        $validators['matricula'] = new sfValidatorString();

        $widgets['departamento'] = new sfWidgetFormInput();
        $validators['departamento'] = new sfValidatorString();

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    public function getFields() {
        $fields = array();
        $fields['num_processo'] = 'Número do Processo';
        $fields['matricula'] = 'NormalKey';
        $fields['departamento'] = 'NormalKey';
        return $fields;
    }

    function getTemplate() {
        return 'AprovDiscEnc';
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
