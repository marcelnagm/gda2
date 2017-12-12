<?php
/**
 * Description of AbandonoDeCursoForm
 *
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class ListaDeTurmasForm extends RelatorioForm {

    protected $tipo      = 'Lista';
    protected $titulo    = 'Lista de Turmas';
    protected $descricao = 'Lista de Turmas por Curso';

    public function configure() {

        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);

        $widgets['id_periodo']  = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbperiodo',
                        'add_empty' => false,
                        'criteria'  => $criteria,
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Períodos',
                )
        );

        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'order_by'  => array('Descricao','ASC'),
                        'add_empty' => false,
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Cursos',
                ),
                array('size' => 8)
        );


         $widgets['notas_historico'] = new sfWidgetFormChoice( array('choices' =>  array("true" => 'Sim',
                                                              "false" => 'Nao',
                                                              "tf" => 'sim ou Nao'
             )

          )

      ,array('default' => '')
      );

        $model_fields = $this->getModelFields();
        $widgets['show_fields'] = new sfWidgetFormChoice(
                array(
                        'choices'  => $model_fields,
                        'expanded' => true,
                        'multiple' => true,
        ));


        # Validadores
        $validators['id_periodo']   = new sfValidatorPropelChoice(
                array(
                        'model' => 'Tbperiodo',
                        'column' => 'id_periodo',
                        'multiple'  => true,
                        'required' => true
                )
        );

        $validators['cod_curso']   = new sfValidatorPropelChoice(array(
                        'model'    => 'Tbcurso',
                        'column'   => 'cod_curso',
                        'required' => false,
                        'multiple' => true
        ));
        $validators['show_fields'] = new sfValidatorChoice(array(
                        'choices'  => array_keys($model_fields),
                        'multiple' => true,
                        'required' => true
        ));

        $validators['notas_historico']  = new sfValidatorString();
        
        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->widgetSchema->setNameFormat('report[%s]');

    }
    public function getFields() {
        return array(
                'id_periodo'  => 'ForeignKey',
                'cod_curso'  => 'ForeignKey',
            'notas_historico' => 'String',
                'show_fields' => 'Number'
            
        );
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     */
    function getModelFields() {

//        $model_fields = TbturmaPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        $model_fields[] = 'Idturma';
        $model_fields[] = 'CodDisciplina';
        $model_fields[] = 'Turma';
        $model_fields['Oferta'] = 'tboferta';
        $model_fields['Vagas'] = 'Vagas';
        $model_fields['Quantidade de Alunos'] = 'QtdeAlunos';
        $model_fields['Professor da Turma'] = 'Professores';
        $model_fields['Situacao'] = 'Situacao';
//        $model_fields['Alunos'] = 'Alunos';
        $model_fields['QtdeAlunos'] = 'QtdeAlunos';


        return $model_fields;

    }

    function executaRelatorio() {

        $form_values = $this->getValues();        
        try {

            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();

            
            # curso
            $criteria = new Criteria();
            if(count($form_values['cod_curso'])) {
                $criteria->add(TbcursoPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);
                $result['cursos'] = TbcursoPeer::doSelect($criteria);
            }

            $criteria->clear();
            $criteria->addJoin(TbturmaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
            $criteria->add(TbturmaPeer::ID_PERIODO,$form_values['id_periodo'],  Criteria::IN);
            if(count($form_values['cod_curso'])) {
                $criteria->add(TbofertaPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);
            }
            if(isset($form_values['notas_historico']) && $form_values['notas_historico']  != 'tf'){
                $criteria->add(TbturmaPeer::NOTAS_NO_HISTORICO,$form_values['notas_historico']  == 'true' ? true : false);
            }

//            $c = new Tbturma();
//            $c->getQtdeAlunos();
//            $c->getTbturmaProfessors();

            $result['list'] = TbturmaPeer::doSelect($criteria);


        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }

        return $result;
    }

}
?>