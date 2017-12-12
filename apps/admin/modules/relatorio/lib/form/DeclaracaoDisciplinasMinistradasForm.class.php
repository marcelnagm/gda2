<?php
/**
 * Declaração de disciplinas ministradas por professor
 * Está baseada na lista de disciplinas ofertadas
 *
 * TODO: Fazer baseada na lista de turmas
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class DeclaracaoDisciplinasMinistradasForm extends RelatorioForm {

    protected $tipo      = 'Declaracao';
    protected $titulo    = 'Declaração de disciplinas ministradas';
    protected $descricao = 'Lista de Disciplinas que foram ministradas por professor';

    /**
     * Variaveis para o template do ODTPHP
     * @var array
     */
    protected $templateVars = array();

    public function configure() {

        # campos
        $widgets['matricula_prof'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbprofessor',
                        'key_method'=> 'getMatriculaProf',
                        'add_empty' => true,
                        'order_by'  => array('Nome','ASC'),
                        'expanded'  => false,
                        'multiple'  => false,
                        'label'     => 'Professor'
        ));


        # Validadores
        $validators['matricula_prof']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbprofessor',
                        'column' => 'matricula_prof',
                        'required' => false
        ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'matricula_prof' => 'ForeignKey'
        );
    }

    function executaRelatorio() {

        $form_values = $this->getValues();

        try {
            $criteria = new Criteria();

            $criteria->add(TbofertaPeer::ID_MATRICULA_PROF,$form_values['matricula_prof']);
            $this->resultado['matricula_prof'] = $form_values['matricula_prof'];

            $criteria->addAscendingOrderByColumn('ano');
            $criteria->addAscendingOrderByColumn('semestre');
            $criteria->addAscendingOrderByColumn('periodo');
            $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);
            $criteria->addAscendingOrderByColumn(TbofertaPeer::TURMA);

            $this->resultado['disciplinas'] = TbofertaPeer::doSelectJoinTbperiodo($criteria);

        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }


        $professor = TbprofessorPeer::retrieveByPK($form_values['matricula_prof']);
        
        # valores para o template do OdtPHP
        $this->resultado['professor']    = $professor->getNome();
        $this->resultado['nivel']        = 'Graduação'; # TODO: obter o nivel de formação no banco
        $this->resultado['departamento'] = ($professor->getTbsetor() instanceof Tbsetor) ? $professor->getTbsetor()->getDescricao() : '(Setor não definido)';
        $this->resultado['data']         = strftime(" %d de %B de %Y");

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