<?php

/**
 * TbgradeEquivalente filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbgradeEquivalenteFormFilter extends BaseTbgradeEquivalenteFormFilter {

    public function configure() {
        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false, 'multiple' => true));
        $this->validatorSchema['id_versao_curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso', 'multiple' => true));

        $this->widgetSchema['cod_disciplina_origem'] = new sfWidgetFormInput();
        $this->validatorSchema['cod_disciplina_origem'] = new sfValidatorString(array('required' => false));
//
        $this->widgetSchema['cod_disciplina_equiv'] = new sfWidgetFormInput();
        $this->validatorSchema['cod_disciplina_equiv'] = new sfValidatorString(array('required' => false));
    }

    protected function addIdVersaoCursoColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA,  TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA);
            $criteria->add(TbcurriculodisciplinasPeer::ID_VERSAO_CURSO, $value, Criteria::IN);
            return $criteria;
        }
    }

    protected function addCodDisciplinaOrigemColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbcurriculodisciplinasPeer::ID_CURRICULO_DISCIPLINA,  TbgradeEquivalentePeer::ID_CURRICULO_DISCIPLINA);
            $criteria->add(TbcurriculodisciplinasPeer::COD_DISCIPLINA, $value, Criteria::ILIKE);
            return $criteria;
        }
    }

    protected function addCodDisciplinaEquivColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->add(TbgradeEquivalentePeer::COD_DISCIPLINA, $value, Criteria::ILIKE);
            return $criteria;
        }
    }

}
