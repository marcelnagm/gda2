<?php

/**
 * Tbprofessor filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbprofessorFormFilter extends BaseTbprofessorFormFilter {

    public function configure() {

        unset($this['id_pessoa']);
        $this->widgetSchema['matricula_prof'] = new sfWidgetFormFilterInput(array('with_empty' => false));
        $this->validatorSchema['matricula_prof'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));
        $this->validatorSchema['siape'] = new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false)));

        $this->widgetSchema['tbcoordenadorcurso_list'] = new sfWidgetFormPropelChoice(array('model' => 'Tbcursoversao', 'add_empty' => false, 'multiple' => true));
        $this->validatorSchema['tbcoordenadorcurso_list'] = new sfValidatorPropelChoice(array('model' => 'Tbcursoversao', 'required' => false, 'multiple' => true));


//        $this->validatorSchema['id_versao_curso'] = new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tbcursoversao', 'column' => 'id_versao_curso'));
    }

    public function addTbcoordenadorcursoListColumnCriteria(Criteria $criteria, $field, $values) {
        if (!empty($values)) {
            $c = new Criteria();
            $array = array();
            $c->add(TbcoordenadorcursoPeer::ID_VERSAO_CURSO, $values, Criteria::IN);
            $coordenador = new Tbcoordenadorcurso();
            foreach (TbcoordenadorcursoPeer::doSelect($criteria) as $coordenador) {
                if (in_array($coordenador->getIdVersaoCurso(), $values)) {
                    $array[] = $coordenador->getMatriculaProf();
                }
            }
            return $criteria->add(TbprofessorPeer::MATRICULA_PROF, $array, Criteria::IN);
        }
    }

}
