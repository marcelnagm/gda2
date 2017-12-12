<?php

/**
 * Tbturma filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbturmaFormFilter extends BaseTbturmaFormFilter {

    public function configure() {

        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty' => false));
        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorString(array('required' => false)));

        $this->widgetSchema['curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => true));
        $this->validatorSchema['curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso'));

//        $this->widgetSchema['notas_incompleto'] = new sfWidgetFormInputCheckbox(array('label' => 'Notas incompleto'), array());
//        $this->validatorSchema['notas_incompleto'] = new sfValidatorPass(array('required'=>false));
    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['matricula'] = 'Text';
        $fields['curso'] = 'Text';
        return $fields;
    }

    protected function addMatriculaColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->addJoin(TbturmaPeer::ID_TURMA, TbturmaAlunoPeer::ID_TURMA);
            $criteria->add(TbturmaAlunoPeer::MATRICULA, $value['text']);
            return $criteria;
        }
    }

    protected function addCursoColumnCriteria(Criteria $criteria, $field, $values) {
        if (!is_array($values)) {
            $values = array($values);
        }

        if (!count($values)) {
            return;
        }
        $criteria->addJoin(TbofertaPeer::ID_OFERTA, TbturmaPeer::ID_OFERTA);

        $value = array_pop($values);
        $criterion = $criteria->getNewCriterion(TbofertaPeer::COD_CURSO, $value);

        foreach ($values as $value) {
            $criterion->addOr($criteria->getNewCriterion(TbofertaPeer::COD_CURSO, $value));
        }

        $criteria->add($criterion);
    }

//    protected function addNotasIncompletoColumnCriteria(Criteria $criteria, $field, $value) {
//        if (!empty($value) && $value == true) {
//
//            $countSql = "(
//                id_turma IN ( SELECT id_turma FROM tbturma_aluno WHERE id_conceito IS NULL GROUP BY id_turma )
//                OR
//                (coalesce((SELECT SUM(valor)
//                    FROM tbturma_nota
//                    JOIN tbturma_aluno USING(id_aluno)
//                    JOIN tbturma t2 USING (id_turma)
//                    WHERE id_turma=tbturma.id_turma),0) <= 0
//                    )
//                    AND (SELECT SUM(faltas)
//                    FROM tbturma_nota
//                    JOIN tbturma_aluno USING(id_aluno) WHERE id_turma=tbturma.id_turma) = 0
//)";
////            $countSql = "id_turma IN ( SELECT id_turma FROM tbturma_aluno WHERE (id_conceito IS NULL OR faltas IS NULL) GROUP BY id_turma )";
//
//            $criteria->add('notas_incompleto', $countSql, Criteria::CUSTOM);
//            return $criteria;
//
//        }
//
//    }//addCodCursoColumnCriteria
}
