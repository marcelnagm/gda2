<?php

/**
 * TbmatriculaComprovante filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbmatriculaComprovanteFormFilter extends BaseTbmatriculaComprovanteFormFilter {

    public function configure() {
        $this->widgetSchema['matricula'] = new sfWidgetFormFilterInput();
        $this->validatorSchema['matricula'] = new sfValidatorPass(array('required' => false));
        
        $this->widgetSchema['nome'] = new sfWidgetFormFilterInput();
        $this->validatorSchema['nome'] = new sfValidatorPass(array('required' => false));
        
        $this->widgetSchema['curso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcurso', 'add_empty' => false, 'multiple' => true));
        $this->validatorSchema['curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcurso', 'column' => 'cod_curso', 'multiple' => true));
        
        $this->widgetSchema['ingresso'] = new sfWidgetFormPropelChoice(array('model' => 'Tbtipoingresso', 'add_empty' => false, 'multiple' => true));
        $this->validatorSchema['ingresso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbtipoingresso', 'column' => 'id_tipo_ingresso', 'multiple' => true));
    }
    
    protected function addIngressoColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value) && !empty($value)) {
            $criteria->addJoin(TbalunomatriculaPeer::MATRICULA, TbmatriculaComprovantePeer::MATRICULA);
            $criteria->addJoin(TbalunomatriculaPeer::ID_TIPO_INGRESSO, TbtipoingressoPeer::ID_TIPO_INGRESSO);
            $criteria->add(TbtipoingressoPeer::ID_TIPO_INGRESSO, $value, Criteria::IN);
            return $criteria;
        }
    }
    
    protected function addCursoColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value) && !empty($value)) {
            $criteria->addJoin(TbalunomatriculaPeer::MATRICULA, TbmatriculaComprovantePeer::MATRICULA);
            $criteria->addJoin(TbalunomatriculaPeer::ID_VERSAO_CURSO, TbcursoversaoPeer::ID_VERSAO_CURSO);
            $criteria->add(TbcursoversaoPeer::COD_CURSO, $value, Criteria::IN);
            return $criteria;
        }
    }
    
    protected function addNomeColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->addJoin(TbalunomatriculaPeer::MATRICULA, TbmatriculaComprovantePeer::MATRICULA);
            $criteria->add(TbalunomatriculaPeer::NOME, '%' . $value['text'] . '%', Criteria::ILIKE);
            return $criteria;
        }
    }
    
    protected function addMatriculaColumnCriteria(Criteria $criteria, $field, $value) {
        if (isset($value['text']) && !empty($value['text'])) {
            $criteria->add(TbmatriculaComprovantePeer::MATRICULA, $value['text']);
            return $criteria;
        }
    }

}
