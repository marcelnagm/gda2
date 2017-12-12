<?php
/**
 * Description of DisciplinasOfertadasForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class DisciplinasOfertadasForm extends RelatorioForm {

    protected $tipo      = 'Lista';
    protected $titulo    = 'Lista de Disciplinas Ofertadas';
    protected $descricao = 'Lista de Disciplinas que foram ofertadas por período, curso e/ou professor';

    public function configure() {

        # campos
        $widgets['id_periodo'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbperiodo',
                        'add_empty' => false,
                        'multiple'  => true,
                        'label'     => 'Período(s)'
        ));
        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'add_empty' => false,
//                        'order_by'  => array('Sucinto','ASC'),
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Curso(s)'
        ));
        $widgets['curso_dest'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'add_empty' => false,
//                        'order_by'  => array('Sucinto','ASC'),
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Curso(s)'
        ));
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
        $widgets['show_fields'] = new sfWidgetFormChoice(array(
                        'choices'  => $this->getModelFields(),
                        'expanded' => true,
                        'multiple' => true,
        ));


        # Validadores
        $validators['cod_curso']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false,
                        'multiple' => true
        ));
        $validators['curso_dest']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false,
                        'multiple' => true
        ));
        $validators['matricula_prof']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbprofessor',
                        'column' => 'matricula_prof',
                        'required' => false
        ));
        $validators['id_periodo']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbperiodo',
                        'column' => 'id_periodo',
                        'required' => false,
                        'multiple' => true
        ));
        $validators['show_fields'] = new sfValidatorChoice(array(
                        'choices'  => array_keys($this->getModelFields()),
                        'multiple' => true,
                        'required' => true
        ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'id_periodo'     => 'ForeignKey',
                'cod_curso'      => 'ForeignKey',
                'matricula_prof' => 'ForeignKey',
                'show_fields'    => 'Number',
        );
    }

    /**
     * substituir nomes das chaves estrangeiras para chamar objetos
     *
     */
    function getModelFields() {

        $model_fields = TbofertaPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        unset(
                $model_fields[0],  #  IdOferta
                $model_fields[8],  #  Matriculados
                $model_fields[9],  #  Excesso
                $model_fields[10], #  Trancados
                $model_fields[11], #  Cancelados
                $model_fields[14], #  DtInicio
                $model_fields[15]  #  DtFim
        );

        $f = new tboferta();
        $f->getTbcursoRelatedByCodCurso();
        $f->getTbcursoRelatedByCodCursoDestino();
        $model_fields[1]  = 'Tbperiodo'; #  IdPeriodo
        $model_fields[2]  = 'Tbturno'; #  IdTurno
        $model_fields[3]  = 'TbcursoRelatedByCodCurso'; #  CodCurso
        $model_fields[4]  = 'Tbdisciplina'; #  CodDisciplina
        $model_fields[6]  = 'Turma'; #  IdSala
        $model_fields[7]  = 'Tbsala'; #  IdSala
        $model_fields[12] = 'Tbprofessor'; #  IdMatriculaProf
        $model_fields[13] = 'Tbsetor'; #  IdSetor
        $model_fields[16] = 'Tbofertahorarios';
        $model_fields[20] = 'TbcursoRelatedByCodCursoDestino';
        $model_fields[21] = 'TbcursoRelatedByCodCursoDestino';
        $model_fields[22] = 'Vagas';  #  Vagas

        $model_fields[17] = 'ChDisciplina';
        $model_fields[18] = 'Solicitacoes';
        $model_fields[19] = 'AlunosMatriculados';

        return $model_fields;

    }

    function executaRelatorio() {

        $form_values = $this->getValues();

        try {

            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();


            $criteria = new Criteria();

            if(count($form_values['id_periodo'])) {
                $criteria->add(TbperiodoPeer::ID_PERIODO,$form_values['id_periodo'],Criteria::IN);
                $result['periodos'] = TbperiodoPeer::retrieveByPKs($form_values['id_periodo']);
            }

            if($form_values['cod_curso']!='') {
                $criteria->add(TbofertaPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);
                $result['cursos'] = TbcursoPeer::retrieveByPKs($form_values['cod_curso']);
            }

            if($form_values['curso_dest']!='') {
                $criteria->add(TbofertaPeer::COD_CURSO_DESTINO,$form_values['curso_dest'],Criteria::IN);
//                $result['cursos'] = TbcursoPeer::retrieveByPKs($form_values['curso_dest']);
            }

            if($form_values['matricula_prof']!='') {
                $criteria->add(TbofertaPeer::ID_MATRICULA_PROF,$form_values['matricula_prof']);
            }
            $criteria->addAscendingOrderByColumn('ano');
            $criteria->addAscendingOrderByColumn('semestre');
            $criteria->addAscendingOrderByColumn('periodo');
            $criteria->addAscendingOrderByColumn(TbofertaPeer::COD_DISCIPLINA);
            $criteria->addAscendingOrderByColumn(TbofertaPeer::TURMA);
            $result['list'] = TbofertaPeer::doSelectJoinTbperiodo($criteria);

        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }

        return $result;
    }

}