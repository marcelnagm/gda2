<?php

/**
 * Tbalunomatricula filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbalunomatriculaFormFilter extends BaseTbalunomatriculaFormFilter {

    public function configure() {

        unset($this['id_pessoa']);

        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput(array('with_empty' => false));

        $this->widgetSchema['nome']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");

//        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));
        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorString(array('required' => false)));

        $this->widgetSchema['cod_curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => false, 'multiple' => true));
        $this->validatorSchema['cod_curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso', 'multiple' => true));

        $this->widgetSchema['id_tipo_ingresso']->setOption('multiple', true);
        $this->widgetSchema['id_tipo_ingresso']->setOption('add_empty', false);
        $this->validatorSchema['id_tipo_ingresso']->setOption('multiple', true);

        $this->widgetSchema['id_situacao']->setOption('multiple', true);
        $this->widgetSchema['id_situacao']->setOption('add_empty', false);
        $this->validatorSchema['id_situacao']->setOption('multiple', true);

        $this->widgetSchema['id_versao_curso']->setOption('multiple', true);
        $this->widgetSchema['id_versao_curso']->setOption('add_empty', false);
        $this->validatorSchema['id_versao_curso']->setOption('multiple', true);

        $siglaEstados = array('', 'AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO');
        $this->widgetSchema['uf_nascimento'] = new sfWidgetFormFilterSelect(array(
                    'choices' => array_combine($siglaEstados, $siglaEstados)
                ));

        $this->widgetSchema['sexo'] = new sfWidgetFormFilterSelect(array(
                    'choices' => array(
                        '' => '',
                        'M' => 'Masculino',
                        'F' => 'Feminino'
                    )
                ));

        $pingifesSitMatricula = array('APV', 'REP', 'REF', 'ASC', 'TRA', 'DIS', 'ADI');
        $this->widgetSchema['pingifes_sit_matricula'] = new sfWidgetFormFilterSelect(array(
                    'choices' => array_combine($pingifesSitMatricula, $pingifesSitMatricula),
                    'multiple' => true
                ));

        $this->validatorSchema['pingifes_sit_matricula'] = new sfValidatorPass(array('required' => false));
    }

    public function getFields() {
        $fields = parent::getFields();
        $fields['cod_curso'] = 'Text';
        $fields['pingifes_sit_matricula'] = '';
        return $fields;
    }

    protected function addCodCursoColumnCriteria(Criteria $criteria, $field, $value) {
        if (!empty($value)) {
            $criteria->addJoin(TbalunoPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO, $value, Criteria::IN);
            return $criteria;
        }
    }

    protected function addPingifesSitMatriculaColumnCriteria(Criteria $criteria, $field, $value) {
        $choices = array();
        foreach ($value as $v) {
            $choices[] = $v['text'];
        }

        if (!empty($value)) {
            $criteria->setDistinct();
            $criteria->addJoin(TbalunoPeer::MATRICULA, TbturmaAlunoPeer::MATRICULA);
            $criteria->addJoin(TbturmaAlunoPeer::ID_CONCEITO, TbconceitoPeer::ID_CONCEITO);
            $criteria->add(TbconceitoPeer::SIGLA_PINGIFES, $choices, Criteria::IN);
            return $criteria;
        }
    }

//    protected function addIdVersaoCursoListColumnCriteria(Criteria $criteria, $field, $value) {
//        if (!empty($value) && count($value)>=1) {
//
//            $criteria->add(TbalunoPeer::ID_VERSAO_CURSO, $value, Criteria::IN);
//            return $criteria;
//        }
//    }

    protected function addMatriculaColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->add(TbalunoPeer::MATRICULA, $value['text']);
            return $criteria;
        }
    }

}
