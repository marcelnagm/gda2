<?php
/**
 * Description of GraficoHistoricoConceitoForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class GraficoHistoricoConceitoForm extends RelatorioForm {

    protected $tipo      = 'Grafico';
    protected $titulo    = 'Gráfico de conceitos no histórico';
    protected $descricao = 'Contagem de alunos por conceito';


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

        # Validadores
        $validators['cod_curso']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false
        ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'cod_curso'   => 'ForeignKey',
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
            $criteria->addAscendingOrderByColumn(TbconceitoPeer::DESCRICAO);
            $criteria->addGroupByColumn(TbconceitoPeer::DESCRICAO);
            $criteria->addSelectColumn(TbconceitoPeer::DESCRICAO .' AS legenda');
            $criteria->addSelectColumn('count(tbconceito.id_conceito) as contador');
            $criteria->addJoin(TbhistoricoPeer::ID_CONCEITO,TbconceitoPeer::ID_CONCEITO);
            $criteria->addJoin(TbalunoPeer::MATRICULA,TbhistoricoPeer::MATRICULA);
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO,TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO,$form_values['cod_curso'],Criteria::IN);

            $stmt_dados = TbconceitoPeer::doSelectStmt($criteria);

            $result['list'] = $stmt_dados->fetchAll(PDO::FETCH_ASSOC);

        } catch (PropelException $exc) {
            #throw new Exception( utf8_decode($exc->getMessage())." SQL: ".$criteria->toString() );
            throw new Exception( utf8_decode($exc->getMessage()) );
        }

        return $result;
    }


}
?>