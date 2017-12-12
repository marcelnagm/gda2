<?php

/**
 * Description of AlunosPorCursoForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunosPorCursoForm extends RelatorioForm {

    protected $tipo = 'Lista';
    protected $titulo = 'Lista de alunos por curso';
    protected $descricao = 'Relação de alunos cadastrados nos cursos';

    public function configure() {

        # Campos
        $widgets['dt_ingresso'] = new sfWidgetFormDate();
        $widgets['dt_ingresso2'] = new sfWidgetFormDate();
        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(array(
                    'label' => 'Curso(s)',
                    'model' => 'Tbcurso',
                    'add_empty' => false,
                    'order_by' => array('Descricao', 'ASC'),
                    'expanded' => false,
                    'multiple' => true,
                ));
        $widgets['ano'] = new sfWidgetFormInput();
        $widgets['semestre'] = new sfWidgetFormInput();
        $widgets['periodo'] = new sfWidgetFormInput();
        $widgets['id_fila_situacao'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbfilasituacao',
                    'method' => 'getDescricao',
                    'add_empty' => true,
                    'order_by' => array('Descricao', 'ASC'),
                    'expanded' => false,
                    'multiple' => false,
                ));

        $widgets['id_aluno_situacao'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbalunosituacao',
                    'method' => 'getDescricao',
                    'add_empty' => false,
                    'order_by' => array('Descricao', 'ASC'),
                    'expanded' => false,
                    'multiple' => true,
                ));


        $widgets['porcentagem_ch_cursada'] = new sfWidgetFormSchema(array(
                    'minimo' => new sfWidgetFormInputText(array(), array('size' => 20)),
                    'maximo' => new sfWidgetFormInputText(array(), array('size' => 20))
                ));


        $widgets['show_fields'] = new sfWidgetFormChoice(array(
                    'choices' => $this->getModelFields(),
                    'expanded' => true,
                    'multiple' => true,
                ));

        $widgets['deficiencia'] = new sfWidgetFormChoice(array('choices' => array("",
                        'sim' => 'sim' ,
                        'nao' => 'nao'
                        ))
                        , array('default' => '','label' => 'Possui Deficiencia?')
        );


        # Validadores

        $validators['deficiencia']  = new sfValidatorString();
        $validators['dt_ingresso'] = new sfValidatorDate(array('required' => false));
        $validators['dt_ingresso2'] = new sfValidatorDate(array('required' => false));

        $validators['cod_curso'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbcurso',
                    'column' => 'cod_curso',
                    'required' => true,
                    'multiple' => true
                ));
        $validators['ano'] = new sfValidatorInteger(array('min' => 1990, 'max' => date('Y'), 'required' => false));
        $validators['semestre'] = new sfValidatorInteger(array('min' => 0, 'max' => 2147483647, 'required' => false));
        $validators['periodo'] = new sfValidatorInteger(array('min' => 0, 'max' => 2147483647, 'required' => false));
        $validators['id_fila_situacao'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbfilasituacao',
                    'column' => 'id_situacao',
                    'multiple' => true,
                    'required' => false
                ));
        $validators['id_aluno_situacao'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbalunosituacao',
                    'column' => 'id_situacao',
                    'multiple' => true,
                    'required' => false
                ));

        $validators['porcentagem_ch_cursada'] = new sfValidatorSchema(array(
                    'minimo' => new sfValidatorInteger(array('min' => 0, 'max' => 200, 'required' => false)),
                    'maximo' => new sfValidatorInteger(array('min' => 0, 'max' => 200, 'required' => false))
                ));

        $validators['show_fields'] = new sfValidatorChoice(array(
                    'choices' => array_keys($this->getModelFields()),
                    'multiple' => true,
                    'required' => true
                ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    public function getFields() {
        return array(
            'cod_curso' => 'ForeignKey',
            'id_aluno_situacao' => 'Number',
            'deficiencia' => 'String',
            'porcentagem_ch_cursada' => 'Number',
            'id_fila_situacao' => 'Number',
            'dt_ingresso' => 'Date',
            'dt_ingresso2' => 'Date',
            'ano' => 'Number',
            'semestre' => 'Number',
            'periodo' => 'Number',
            'show_fields' => 'Number'            
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

        $model_fields[48] = 'PorcentagemChCursada';
        
        $model_fields[54] = 'Tbalunoracacor';
        $model_fields[55] = 'Curso';
        $model_fields[56] = 'CursoTurno';
        $model_fields[57] = 'Tbpolos';

        return $model_fields;
    }

    function executaRelatorio() {

        try {

            $form_values = $this->getValues();

            $result['show_fields'] = $form_values['show_fields'];
            $result['data_fields'] = $this->getModelFields();

            # curso
            $criteria = new Criteria();
            $criteria->add(TbcursoPeer::COD_CURSO, $form_values['cod_curso'], Criteria::IN);
            $criteria->addAscendingOrderByColumn(TbcursoPeer::DESCRICAO);
            $result['cursos'] = TbcursoPeer::doSelect($criteria);

            # aluno
            $criteria = new Criteria();
            $criteria->addAscendingOrderByColumn(TbalunoPeer::MATRICULA);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO, $form_values['cod_curso'], Criteria::IN);

            if ($form_values['dt_ingresso'] != '' && $form_values['dt_ingresso2'] != '' ) {
                $criteria->addAnd(TbalunoPeer::DT_INGRESSO, $form_values['dt_ingresso'], Criteria::GREATER_EQUAL);
                $criteria->addAnd(TbalunoPeer::DT_INGRESSO, $form_values['dt_ingresso2'], Criteria::LESS_EQUAL);
            }
            if ($form_values['id_aluno_situacao'] != '') {
                $criteria->add(TbalunoPeer::ID_SITUACAO, $form_values['id_aluno_situacao'], Criteria::IN);
            }
            if ($form_values['porcentagem_ch_cursada']['minimo'] != '' || $form_values['porcentagem_ch_cursada']['maximo'] != '') {
                $criteria->add('porcentagem_ch_cursada', '(porcentagem_ch_cursada(matricula) >= ' . $form_values['porcentagem_ch_cursada']['minimo'] . ' AND porcentagem_ch_cursada(matricula) <= ' . $form_values['porcentagem_ch_cursada']['maximo'] . ')', Criteria::CUSTOM);
            }

            # fila
            if ($form_values['id_fila_situacao'] != '') {

                $criteria->addJoin(TbalunoPeer::MATRICULA, TbfilaPeer::MATRICULA);

                $criteria->add(TbfilaPeer::ID_SITUACAO, $form_values['id_fila_situacao'], Criteria::IN);

                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);

                if ($form_values['ano'] != '') {
                    $criteria->add(TbperiodoPeer::ANO, $form_values['ano']);
                    #$criteria->addAscendingOrderByColumn('ano');
                    $result['ano'] = $form_values['ano'];
                }
                if ($form_values['semestre'] != '') {
                    $criteria->add(TbperiodoPeer::SEMESTRE, $form_values['semestre']);
                    #$criteria->addAscendingOrderByColumn('semestre');
                    $result['semestre'] = $form_values['semestre'];
                }
                if ($form_values['periodo'] != '') {
                    $criteria->add(TbperiodoPeer::PERIODO, $form_values['periodo']);
                    #$criteria->addAscendingOrderByColumn('periodo');
                    $result['periodo'] = $form_values['periodo'];
                }
                if ($form_values['deficiencia'] != '') {
                    $tipo = array();
                    if($form_values['deficiencia'] =='sim'){
                    $criteria->add(TbalunoPeer::ID_NECES_ESPECIAL, '0', Criteria::NOT_EQUAL);
                    }else{
                    $criteria->add(TbalunoPeer::ID_NECES_ESPECIAL, '0');
                    }

                    #$criteria->addAscendingOrderByColumn('periodo');
                    $result['periodo'] = $form_values['deficiencia'];
                }
            }

            $criteria->setDistinct();
//
//            $cod_ignora = array();
//            $ta = new Tbaluno();
//            foreach (TbalunoPeer::doSelectJoinTbcursoversao($criteria) as $ta) {
//                $cod_ignora[] = $ta->getMatricula();
//            }

//            $criteria = new Criteria();
//            $criteria->addAscendingOrderByColumn(TbalunoPeer::NOME);
//            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
//            $criteria->add(TbcursoversaoPeer::COD_CURSO, $form_values['cod_curso'], Criteria::IN);
//
//            if ($form_values['id_aluno_situacao'] != '') {
//                $criteria->add(TbalunoPeer::ID_SITUACAO, $form_values['id_aluno_situacao'], Criteria::IN);
//            }
//            if ($form_values['porcentagem_ch_cursada']['minimo'] != '' || $form_values['porcentagem_ch_cursada']['maximo'] != '') {
//                $criteria->add('porcentagem_ch_cursada', '(porcentagem_ch_cursada_ignora(matricula) >= ' . $form_values['porcentagem_ch_cursada']['minimo'] . ' AND porcentagem_ch_cursada_ignora(matricula) <= ' . $form_values['porcentagem_ch_cursada']['maximo'] . ')', Criteria::CUSTOM);
//            }
//
//            # fila
//            if ($form_values['id_fila_situacao'] != '') {
//
//                $criteria->addJoin(TbalunoPeer::MATRICULA, TbfilaPeer::MATRICULA);
//
//                $criteria->add(TbfilaPeer::ID_SITUACAO, $form_values['id_fila_situacao'], Criteria::IN);
//
//                $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
//                $criteria->addJoin(TbofertaPeer::ID_PERIODO, TbperiodoPeer::ID_PERIODO);
//
//                if ($form_values['ano'] != '') {
//                    $criteria->add(TbperiodoPeer::ANO, $form_values['ano']);
//                    #$criteria->addAscendingOrderByColumn('ano');
//                    $result['ano'] = $form_values['ano'];
//                }
//                if ($form_values['semestre'] != '') {
//                    $criteria->add(TbperiodoPeer::SEMESTRE, $form_values['semestre']);
//                    #$criteria->addAscendingOrderByColumn('semestre');
//                    $result['semestre'] = $form_values['semestre'];
//                }
//                if ($form_values['periodo'] != '') {
//                    $criteria->add(TbperiodoPeer::PERIODO, $form_values['periodo']);
//                    #$criteria->addAscendingOrderByColumn('periodo');
//                    $result['periodo'] = $form_values['periodo'];
//                }
//                if ($form_values['deficiencia'] != '') {
//                    $tipo = array();
//                    if($form_values['deficiencia'] =='sim'){
//                    $criteria->add(TbalunoPeer::ID_NECES_ESPECIAL, '0', Criteria::NOT_EQUAL);
//                    }else{
//                    $criteria->add(TbalunoPeer::ID_NECES_ESPECIAL, '0');
//                    }
//
//                    #$criteria->addAscendingOrderByColumn('periodo');
//                    $result['periodo'] = $form_values['deficiencia'];
//                }
//            }
////            $criteria->add(TbalunoPeer::MATRICULA, $cod_ignora, Criteria::NOT_IN);
//            $criteria->setDistinct();

            $result['list'] = TbalunoPeer::doSelectJoinTbcursoversao($criteria);
        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception(utf8_decode($exc->getMessage()));
        }

        return $result;
    }

}

?>