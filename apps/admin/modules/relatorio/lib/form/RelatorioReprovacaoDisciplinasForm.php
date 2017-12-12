<?php

/**
 * Description of AlunosPorCursoForm
 *
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 */
class RelatorioReprovacaoDisciplinasForm extends RelatorioForm {

    protected $tipo = 'Lista';
    protected $titulo = 'Lista de Reprovações nas Disciplinas por Curso';
    protected $descricao = 'Relatório de Reprovações nas Disciplinas por Curso';

    public function configure() {

        # Campos
        $widgets['periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => false,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => true,
                    'label' => 'Período',
                ));

        $widgets['cod_disciplinas'] = new sfWidgetFormPropelChoice(array(
                    'label' => 'Disciplinas',
                    'model' => 'Tbdisciplina',
                    'add_empty' => false,
                    'order_by' => array('CodDisciplina', 'ASC'),
                    'expanded' => false,
                    'multiple' => true,
                ));

        # Validadores

        $validators['periodo'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'column' => 'id_periodo',
                    'required' => true,
                    'multiple' => true
                ));

        $validators['cod_disciplinas'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbdisciplina',
                    'column' => 'cod_disciplina',
                    'required' => true,
                    'multiple' => true
                ));

        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('relatorio[%s]');
    }

    public function getFields() {
        return array(
            'cod_disciplinas' => 'ForeignKey',
            'periodo' => 'ForeignKey',
        );
    }

    /**
     * Constroi lista com campos a serem mostrados no relatorio
     *
     */
    function getModelFields() {
        return array('Disciplina', 'Porcentagem',);
    }

    function executaRelatorio() {

        try {

            $form_values = $this->getValues();
            $retorno = array();

            //define o tipo de busca: reprov. por falta, por nota ou trancamentos
            $tipo_falta = array('3');
            $tipo_nota = array('2');
            $tipo_tranc = array('12', '15', '9', '10');

            //criteria para pegar turmas de acordo com os parametros do form
            $criteria = new Criteria();
            $lista = array();

            $disciplinas = array();
            foreach ($form_values['cod_disciplinas'] as $disc) {
                if (!array_search($disc, $disciplinas)) {
                    $disciplinas[] = $disc;
                }
            }

            foreach ($form_values['periodo'] as $idperiodo) {
                $pre_retorno = array();
                $idcont = 0;
                
                foreach ($disciplinas as $disc) {
                    $criteria->clear();
                    $criteria->add(TbhistoricoPeer::ID_PERIODO, $idperiodo);
                    $criteria->addAnd(TbhistoricoPeer::COD_DISCIPLINA, $disc);
                    $all = TbhistoricoPeer::doCount($criteria);

                    $criteria->addAnd(TbhistoricoPeer::ID_CONCEITO, $tipo_falta, Criteria::IN);
                    $faltas = TbhistoricoPeer::doCount($criteria);

                    $criteria->clear();
                    $criteria->add(TbhistoricoPeer::ID_PERIODO, $idperiodo);
                    $criteria->addAnd(TbhistoricoPeer::COD_DISCIPLINA, $disc);
                    $criteria->addAnd(TbhistoricoPeer::ID_CONCEITO, $tipo_nota, Criteria::IN);
                    $notas = TbhistoricoPeer::doCount($criteria);

                    $criteria->clear();
                    $criteria->add(TbhistoricoPeer::ID_PERIODO, $idperiodo);
                    $criteria->addAnd(TbhistoricoPeer::COD_DISCIPLINA, $disc);
                    $criteria->addAnd(TbhistoricoPeer::ID_CONCEITO, $tipo_tranc, Criteria::IN);
                    $trancs = TbhistoricoPeer::doCount($criteria);
                    
                    $total_calc = $trancs;
                    
                    $criteria->clear();
                    $criteria->addJoin(TbfilaPeer::ID_OFERTA, TbofertaPeer::ID_OFERTA);
                    $criteria->add(TbofertaPeer::ID_PERIODO, $idperiodo);
                    $criteria->addAnd(TbofertaPeer::COD_DISCIPLINA, $disc);
                    $criteria->addAnd(TbfilaPeer::ID_SITUACAO, array(10,11,12), Criteria::IN);
                    $trancs += TbfilaPeer::doCount($criteria);

                    if ($all != 0 && ($faltas + $notas + $trancs) != 0) {
                        $temp = array();
                        $temp['disciplina'] = $disc . " - " . TbdisciplinaPeer::retrieveByPK($disc)->getDescricao();
                        $temp['porcentagem'] = intval(($faltas + $notas) / ($all - $total_calc) * 100) . '%';
                        $temp['matriculados'] = $all - $total_calc;
                        $temp['aprovados'] = $all - $total_calc - $faltas - $notas;
                        $temp['rep_nota'] = $notas;
                        $temp['rep_falta'] = $faltas;
                        $temp['rep_tranc'] = $trancs;
                        $pre_retorno[$idcont] = $temp;
                        $idcont++;
                    }
                }
                $pre_retorno = $this->selection_sort($pre_retorno);
                $lista[$idperiodo] = array('lista' => $pre_retorno, 'id' => $idperiodo);
            }
        } catch (PropelException $exc) {
            throw new Exception(utf8_decode($exc->getMessage()));
        }

        $retorno['idsperiodo'] = $form_values['periodo'];
        $retorno['idcurso'] = 'Todos os cursos';
        $retorno['lista'] = $lista;
        return $retorno;
    }

    function selection_sort($array) {
        for ($i = 0; $i < count($array); $i++) {
            $copiado = $array[$i];
            $j = $i;
            while (($j > 0 ) && (intval($copiado['porcentagem']) > intval($array[$j - 1]['porcentagem']))) {
                $array[$j] = $array[$j - 1];
                $j--;
            }
            $array[$j] = $copiado;
        }
        return $array;
    }

}
?>