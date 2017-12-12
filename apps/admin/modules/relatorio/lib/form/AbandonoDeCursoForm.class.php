<?php

/**
 * Description of AbandonoDeCursoForm
 *
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AbandonoDeCursoForm extends RelatorioForm {

    protected $tipo = 'Lista';
    protected $titulo = 'Lista de Provaveis Jubilandos';
    protected $descricao = 'Lista para mostrar os alunos em situação regular que não efetuaram matrícula nos períodos que forem selecionados na lista abaixo. É considerado "Abandono de curso" a situação onde o aluno deixa de fazer matrícula por dois períodos consecutivos.';

    public function configure() {

        $model_fields = TbalunoPeer::getFieldNames(BasePeer::TYPE_PHPNAME);

        unset(
                $model_fields[0], #IdPessoa
                $model_fields[47] #IdAntigo
        );

//        $criteria = new Criteria();
//        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
//        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
//        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);
//        $criteria->add(TbperiodoPeer::DESCRICAO, '%Graduação%',  Criteria::LIKE);

        $widgets['id_periodo'] = new sfWidgetFormPropelChoice(
                        array(
                            'model' => 'Tbperiodo',
                            'add_empty' => false,
//                        'criteria'  => $criteria,
                            'expanded' => false,
                            'multiple' => true,
                            'label' => 'Períodos',
                        ),
                        array('size' => 7)
        );

        $widgets['id_tipo_ingresso'] = new sfWidgetFormPropelChoice(
                        array(
                            'model' => 'Tbtipoingresso',
                            'add_empty' => false,
                            'expanded' => false,
                            'multiple' => true,
                            'label' => 'Tipo de Ingresso',
                        ),
                        array('size' => 7)
        );


//            $criteria = new Criteria();
//            $criteria->addJoin(TbcursoPeer::COD_CURSO,  TbcursoversaoPeer::COD_CURSO); // especialização
//            $criteria->add(TbcursoversaoPeer::ID_FORMACAO, 3); // especialização
//            $criteria->addOr(TbcursoversaoPeer::ID_FORMACAO, 5); // especialização
//        $widgets['dt_ingresso']  = new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false, 'label' => 'Intervalo para checar'));

        $widgets['nivel'] = new sfWidgetFormChoice(
                        array(
                            'choices' =>
                                array(0 => 'Todos',
                                    1 => 'Graduação',
                                    2 => 'Mestrado',
                                    3 => 'Especialização',),
                            'expanded' => true,
                            'multiple' => false,
                ));

        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                        array(
                            'model' => 'Tbcurso',
                            'order_by' => array('Descricao', 'ASC'),
                            'add_empty' => false,
                            'expanded' => false,
                            'multiple' => true,
                            'label' => 'Cursos',
//                         'criteria' => $criteria
                        ),
                        array('size' => 7)
        );


        $widgets['show_fields'] = new sfWidgetFormChoice(
                        array(
                            'choices' => $model_fields,
                            'expanded' => true,
                            'multiple' => true,
                ));

        $widgets['metodo'] = new sfWidgetFormChoice(array('choices' => array(
                        'todos' => 'Todos os métodos',
                        'reprovacoes' => 'Jubilando por numero de reprovações',
                        'tracamentos' => 'Jubilando por numero de trancamentos',
                        'prazo' => 'Jubilando por expirar o prazo máximo',
                        'fila' => 'Jubilando por não apresentar matricula'
                    )
                        )
                        , array('default' => 'todos')
        );



        # Validadores
        $validators['id_periodo'] = new sfValidatorPropelChoice(
                        array(
                            'model' => 'Tbperiodo',
                            'column' => 'id_periodo',
                            'multiple' => true,
                            'required' => true
                        )
        );

        $validators['id_tipo_ingresso'] = new sfValidatorPropelChoice(
                        array(
                            'model' => 'Tbtipoingresso',
                            'column' => 'id_tipo_ingresso',
                            'multiple' => true,
                            'required' => true
                        )
        );

        $validators['metodo'] = new sfValidatorString();

        $validators['cod_curso'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbcurso',
                    'column' => 'cod_curso',
                    'required' => false,
                    'multiple' => true
                ));
        $validators['show_fields'] = new sfValidatorChoice(array(
                    'choices' => array_keys($model_fields),
                    'multiple' => true,
                    'required' => true
                ));
        $validators['nivel'] = new sfValidatorChoice(array(
                    'choices' => array(0,1,2,3),
                    'multiple' => false,
                    'required' => true
                ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->widgetSchema->setNameFormat('report[%s]');
    }

    public function getFields() {
        return array(
            'id_periodo' => 'ForeignKey',
            'nivel' => 'NormalKey',
            'cod_curso' => 'ForeignKey',
            'id_tipo_ingresso' => 'ForeignKey',
            'metodo' => 'NormalKey',
            'show_fields' => 'Number'
        );
    }

//    function getCriteria() {
//        $criteria = new Criteria();
//        $criteria->add(TbcursoversaoPeer::COD_CURSO, 55, Criteria::NOT_EQUAL); // especialização
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 46, Criteria::NOT_EQUAL); // \
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 23, Criteria::NOT_EQUAL); //  \
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 53, Criteria::NOT_EQUAL); //   \__ Mestrado
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 54, Criteria::NOT_EQUAL); //   /
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 82, Criteria::NOT_EQUAL); //  /
//        $criteria->addAnd(TbcursoversaoPeer::ID_VERSAO_CURSO, 62, Criteria::NOT_EQUAL); //   Mestrado
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 99, Criteria::NOT_EQUAL); // Aluno Especial
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 66, Criteria::NOT_EQUAL); // Aluno Especial
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 43, Criteria::NOT_EQUAL); //squencial
//        $criteria->addAnd(TbcursoversaoPeer::COD_CURSO, 90, Criteria::NOT_EQUAL);
//
//        return $criteria;
//    }


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
            
            if (count($form_values['cod_curso'])) {
                $criteria->addAnd(TbcursoPeer::COD_CURSO, $form_values['cod_curso'], Criteria::IN);
            }

            $criteria->addAscendingOrderByColumn(TbcursoPeer::DESCRICAO);
            $result['cursos'] = TbcursoPeer::doSelect($criteria);
            
            $criteria->addJoin(TbcursoversaoPeer::COD_CURSO, TbcursoPeer::COD_CURSO);

            if ($form_values['nivel'] == 1) {
                $criteria->addAnd(TbcursoPeer::ID_NIVEL, array(1, 2), Criteria::IN);
            } else if ($form_values['nivel'] == 2) {
                $criteria->addAnd(TbcursoPeer::ID_NIVEL, 4);
            } else if ($form_values['nivel'] == 3) {
                $criteria->addAnd(TbcursoPeer::ID_NIVEL, 3);
            } else if ($form_values['nivel'] == 0) {
                $criteria->addAnd(TbcursoPeer::ID_NIVEL, array(1, 2, 3, 4), Criteria::IN);
            }

            $versoes = array();
            foreach (TbcursoversaoPeer::doSelect($criteria) as $v) {
                $versoes[] = $v->getCodCurso();
            }


            $result['list'] = TbalunoPeer::getAbandonoDeCurso($versoes, $form_values['id_periodo'], $form_values['metodo'], $form_values['id_tipo_ingresso']);
        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception(utf8_decode($exc->getMessage()));
        }

        return $result;
    }

}
?>