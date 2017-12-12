<?php
/**
 * Description of GraficoAlunoSituacaoForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class GraficoAlunoSituacaoPorCursoForm extends RelatorioForm {

    protected $tipo      = 'Grafico';
    protected $titulo    = 'Gráfico de situações do aluno';
    protected $descricao = 'Contagem de alunos por situcação';

    public function configure() {

        # campos
        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'add_empty' => true,
                        'order_by'  => array('Descricao','ASC'),
                        'expanded'  => false,
                        'multiple'  => false,
                        'label'     => 'Curso'
        ));

        $widgets['dt_situacao']  = new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false, 'label' => 'Data da situação'));


        # Validadores
        $validators['cod_curso']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false
        ));

        $validators['dt_situacao']   = new sfValidatorDateRange(
                array(
                        'required' => false,
                        'from_date' => new sfValidatorDate(array('required' => true)),
                        'to_date' => new sfValidatorDate(array('required' => false))
                )
        );

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'cod_curso'   => 'ForeignKey',
                'dt_situacao' => 'Date',
        );
    }

    function executaRelatorio() {

        try {

            $form_values = $this->getValues();

            # curso
            $criteria = new Criteria();
            $criteria->add(TbcursoPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);
            $criteria->addAscendingOrderByColumn(TbcursoPeer::DESCRICAO);
            $result['cursos'] = TbcursoPeer::doSelect($criteria);

            # dados
            $criteria = new Criteria();
            $criteria->addAscendingOrderByColumn(TbalunosituacaoPeer::DESCRICAO);
            $criteria->addGroupByColumn(TbalunosituacaoPeer::DESCRICAO);
            $criteria->addSelectColumn(TbalunosituacaoPeer::DESCRICAO .' AS legenda');
            $criteria->addSelectColumn('count(tbaluno.id_situacao) as contador');
            $criteria->addJoin(TbalunoPeer::ID_SITUACAO,TbalunosituacaoPeer::ID_SITUACAO);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO,TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);

            if($form_values['dt_situacao']['from'] != '') {
                $criteria->add(TbalunoPeer::DT_SITUACAO,$form_values['dt_situacao']['from'],Criteria::GREATER_EQUAL);
            }
            if($form_values['dt_situacao']['to'] != '') {
                $criteria->addAnd(TbalunoPeer::DT_SITUACAO,$form_values['dt_situacao']['to'],Criteria::LESS_EQUAL);
            }
            $stmt_dados = TbalunosituacaoPeer::doSelectStmt($criteria);

            $result['list'] = $stmt_dados->fetchAll(PDO::FETCH_ASSOC);

        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }

        return $result;
    }


}
?>