<?php
/**
 * Description of GraficoAlunoSituacaoForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class AlunoXSituacaoForm extends RelatorioForm {

    protected $tipo      = 'Relatorio';
    protected $titulo    = 'tabela de situações do aluno x cursos';
    protected $descricao = 'Contagem de alunos por situcação';

    public function configure() {

        # campos
        $widgets['cod_curso'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'Tbcurso',
                        'add_empty' => false,
                        'order_by'  => array('Descricao','ASC'),
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Curso'
        ));

        $widgets['id_situacao'] = new sfWidgetFormPropelChoice(
                array(
                        'model'     => 'tbalunosituacao',
                        'add_empty' => false,
                        'order_by'  => array('Descricao','ASC'),
                        'expanded'  => false,
                        'multiple'  => true,
                        'label'     => 'Situacao'
        ));


        # Validadores
        $validators['cod_curso']   = new sfValidatorPropelChoice(array(
                        'model' => 'Tbcurso',
                        'column' => 'cod_curso',
                        'required' => false ,
                        'multiple' => true
        ));

        $validators['id_situacao']   = new sfValidatorPropelChoice(array(
                        'model' => 'tbalunosituacao',
                        'column' => 'id_situacao',
                        'required' => false   ,
                        'multiple' => true
        ));


        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');

    }

    public function getFields() {
        return array(
                'cod_curso'   => 'ForeignKey',
                'id_situacao'   => 'ForeignKey'
        );
    }

    function executaRelatorio() {


            $alunos = array();
            $form_values = $this->getValues();
            $cursos = array();
            $situacoes = array();
            $situacao = array();
            $total = 0;
            

            # curso
            foreach ($form_values['cod_curso'] as $curso){
            $cursos[$curso] = TbcursoPeer::retrieveByPK($curso)->getDescricao();
                $situacao = array();
                
                foreach ($form_values['id_situacao'] as $id_situacao){                
                $criteria = new Criteria();
                $criteria->add(TbalunoPeer::ID_SITUACAO,$id_situacao);
                $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
                $criteria->add(TbcursoversaoPeer::COD_CURSO,$curso);
                $situacoes[$id_situacao] = TbalunosituacaoPeer::retrieveByPK($id_situacao)->getDescricao();
                $situacao[$id_situacao] = TbalunoPeer::doCount($criteria);
                $total = $situacao[$id_situacao] + $total;
                }
                $alunos[$curso] = $situacao;
            }


      
            $result['cod_curso'] = $cursos;
            $result['id_situacao'] = $situacoes;
            $result['list'] = $alunos;
            $result['total_alunos'] = $total;

   

        return $result;
    }

    function  getTemplate() {
        return 'RelatorioAlunoXSituacao';
    }

    function   getLayout() {
        return 'relatorio';
    }



}
?>