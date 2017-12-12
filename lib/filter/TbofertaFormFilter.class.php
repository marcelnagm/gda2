<?php

/**
 * Tboferta filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbofertaFormFilter extends BaseTbofertaFormFilter {

    public function configure() {

        unset($this['matriculados']);
        unset($this['excesso']);
        unset($this['cancelados']);
        unset($this['trancados']);

        $this->widgetSchema['turma']->setAttribute('size', 2);
        $this->widgetSchema['vagas']->setAttribute('size', 2);

        $criteria = new Criteria();
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::ANO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::SEMESTRE);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::PERIODO);
        $criteria->addDescendingOrderByColumn(TbperiodoPeer::DESCRICAO);
        $this->widgetSchema['id_periodo']->setOption('criteria', $criteria);

        $this->widgetSchema['sem_horario'] = new sfWidgetFormInputCheckbox(array('label' => 'Ofertas sem horário'), array());
        $this->validatorSchema['sem_horario'] = new sfValidatorPass(array('required'=>false));

        $choices = sfConfig::get('app_dias_semana');
        $this->widgetSchema['dia'] = new sfWidgetFormChoice(array('label' => 'Dias', 'choices' => $choices, 'expanded' => true, 'multiple' => true), array());
        $this->validatorSchema['dia'] = new sfValidatorPass(array('required'=>false));


    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['dia'] = 'Checkbox';
        $fields['sem_horario'] = 'Checkbox';
        return $fields;
    }

    protected function addSemHorarioColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value) && $value == true) {

            $countSql = "(SELECT count(*) FROM tbofertahorario WHERE id_oferta=tboferta.id_oferta ) = 0";

            $criteria->add('sem_horario', $countSql, Criteria::CUSTOM);
            return $criteria;

        }
    }

    protected function addDiaColumnCriteria(Criteria $criteria, $field, $dias) {
        if (!empty($dias) && is_array($dias)) {

            $countSql = "(SELECT count(dia) FROM tbofertahorario WHERE id_oferta=tboferta.id_oferta AND dia IN (". implode(',',$dias).")) = ".count($dias);
            $criteria->add('dias_no_horario', $countSql, Criteria::CUSTOM);
            return $criteria;

        }
    }

}
