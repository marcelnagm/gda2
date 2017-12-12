<?php
/**
 * Description of AbandonoDeCursoForm
 *
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AbandonoDeCursoForm extends RelatorioForm {

    protected $tipo      = 'Lista';
    protected $titulo    = 'Lista de Abandono de Curso';
    protected $descricao = 'Lista para mostrar os alunos em situação regular que não efetuaram matrícula nos períodos que forem selecionados na lista abaixo. É considerado "Abandono de curso" a situação onde o aluno deixa de fazer matrícula por dois períodos consecutivos.';

    public function configure() {

        $model_fields = TbalunoPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        unset(
                $model_fields[0], #IdPessoa
                $model_fields[47] #IdAntigo

        );

        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);

//        $widgets['id_periodo']  = new sfWidgetFormPropelChoice(
//                array(
//                        'model'     => 'Tbperiodo',
//                        'add_empty' => false,
//                        'criteria'  => $criteria,
//                        'expanded'  => false,
//                        'multiple'  => true,
//                        'label'     => 'Períodos',
//                ),
//                array('size' => 5)
//        );
        $widgets['dt_ingresso']  = new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false, 'label' => 'Intervalo para checar'));

        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'order_by'  => array('Descricao','ASC'),
                        'add_empty' => false,
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Cursos'
                ),
                array('size' => 5)
        );

//        $widgets['id_aluno_situacao'] = new sfWidgetFormPropelChoice(
//                array(
//                        'model'     => 'Tbalunosituacao',
//                        'method'    =>  'getDescricao',
//                        'add_empty' => false,
//                        'order_by'  => array('Descricao','ASC'),
//                        'expanded'  => false,
//                        'multiple'  => true,
//                ),
//                array('size' => 5)
//        );

        $widgets['show_fields'] = new sfWidgetFormChoice(
                array(
                        'choices'  => $model_fields,
                        'expanded' => true,
                        'multiple' => true,
        ));


        # Validadores
//        $validators['id_periodo']   = new sfValidatorPropelChoice(
//                array(
//                        'model' => 'Tbperiodo',
//                        'column' => 'id_periodo',
//                        'multiple'  => true,
//                        'required' => true
//                )
//        );
        $validators['dt_ingresso']   = new sfValidatorDateRange(
                array(
                        'required' => false,
                        'from_date' => new sfValidatorDate(array('required' => false)),
                        'to_date' => new sfValidatorDate(array('required' => true))
                )
        );
//        $validators['id_aluno_situacao']   = new sfValidatorPropelChoice(
//                array(
//                        'model' => 'Tbalunosituacao',
//                        'column' => 'id_situacao',
//                        'multiple'  => true,
//                        'required' => false
//                )
//        );
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

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->widgetSchema->setNameFormat('report[%s]');

    }
    public function getFields() {
        return array(
//                'id_periodo'  => 'ForeignKey',
                'dt_ingresso'  => 'Date',
                'cod_curso'  => 'ForeignKey',
//                'id_aluno_situacao'  => 'ForeignKey',
                'show_fields' => 'Number',
        );
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     */
    function getModelFields() {

        $model_fields = TbalunoPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        unset(
                $model_fields[0], #IdPessoa
                $model_fields[6], #Foto
                $model_fields[47] #IdAntigo
        );

        $model_fields[7] = 'Tbnecesespecial';
        $model_fields[9] = 'Tbcidade';
        $model_fields[11] = 'Tbpais';
        $model_fields[24] = 'TblogradouroRelatedByCep';
        $model_fields[27] = 'Tbcursoversao';
        $model_fields[28] = 'Tbtipoingresso';
        $model_fields[30] = 'Tbalunosituacao';
        $model_fields[32] = 'TbinstexternaRelatedByIdDestino';
        $model_fields[33] = 'TbinstexternaRelatedById2grau';
        $model_fields[35] = 'TbinstexternaRelatedById3grau';
        $model_fields[37] = 'TbinstexternaRelatedByIdTrabalho';
        $model_fields[38] = 'TblogradouroRelatedByCepTrabalho';

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
            }
            $criteria->addAscendingOrderByColumn(TbcursoPeer::DESCRICAO);
            $result['cursos'] = TbcursoPeer::doSelect($criteria);

            # aluno
            $criteria = new Criteria();
            $criteria->addAscendingOrderByColumn(TbalunoPeer::NOME);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO,TbcursoversaoPeer::ID_VERSAO_CURSO);
            if(count($form_values['cod_curso'])) {
                $criteria->add(TbcursoversaoPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);
            }
//            if(count($form_values['id_aluno_situacao'])) {
//                $criteria->add(TbalunoPeer::ID_SITUACAO,$form_values['id_aluno_situacao'],Criteria::IN);
//            }
//            if(count($form_values['dt_ingresso'])) {
//                $criteria->add(TbalunoPeer::DT_INGRESSO,$form_values['dt_ingresso']['from'],Criteria::GREATER_EQUAL);
//            }
//            $criteria->add(TbalunoPeer::DT_INGRESSO,$form_values['dt_ingresso']['to'],Criteria::LESS_EQUAL);
            $criteria->add(TbalunoPeer::ID_SITUACAO,0); // Aluno regular


//            $criteria->add(TbalunoPeer::MATRICULA,
//                    'matricula NOT IN (
//                        SELECT matricula FROM tbfila
//                        JOIN tboferta USING(id_oferta)
//                        WHERE id_periodo IN ('.implode(',',$form_values['id_periodo']).')
//                        GROUP BY matricula
//                    )',
//                    Criteria::CUSTOM
//            );
            $criteria->add(TbalunoPeer::MATRICULA,
                    "matricula NOT IN (
                        SELECT matricula FROM tbfila
                        WHERE datahora >= '".$form_values['dt_ingresso']['from']."' AND datahora <= '".$form_values['dt_ingresso']['to']."'
                        GROUP BY matricula
                    )",
                    Criteria::CUSTOM
            );

            $criteria->add(TbalunoPeer::DT_INGRESSO,'2008-12-31', Criteria::LESS_EQUAL);



//            $result['alunos'] = TbalunoPeer::doSelectJoinTbcursoversao($criteria);
            $result['list'] = TbalunoPeer::doSelect($criteria);

        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }

        return $result;
    }

}
?>