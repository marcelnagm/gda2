<?php
/**
 * Classe global para relatorios
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class RelatorioForm extends sfForm {

    /**
     * Tipo do relatório:
     * 1. Grafico
     * 2. Lista
     */
    protected $tipo = null;

    /**
     * Titulo do relatorio
     * @var string
     */
    protected $titulo = null;

    /**
     * Descricao do relatorio
     * @var string
     */
    protected $descricao = null;

    /**
     * Resultado do processo do relatorio
     * @var array
     */
    protected $resultado = array();

    
    public function configure() {

        $this->widgetSchema->setNameFormat('relatorio[%s]');
        
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     * @return string
     */
    function getTipo() {
        if($this->tipo == null) throw new Exception('Tipo de relatorio não definido');
        return $this->tipo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Retorna o nome do relatorio, referencia para o modulo
     *
     * @return string
     */
    function getRelatorioNome() {
        return (string) preg_replace('/Form$/','',get_class($this));
    }

    function getModelFields() {
        throw new Exception('getModelFields nao implementado');
    }

    function executaRelatorio() {
        throw new Exception('executaRelatorio nao implementado');
    }

    function getResultado() {
        return $this->resultado;
    }
    
    function getTemplate() {
        return (string) 'Relatorio'.$this->getTipo();
    }

    function getLayout() {
        return 'relatorio';
    }

    function getURLPost() {
        return 'relatorio/index?nome='.$this->getRelatorioNome();
    }
}