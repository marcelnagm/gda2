<?php

/**
 * Tbprofessorticket form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbprofessorticketForm extends BaseTbprofessorticketForm
{
  public function configure()
  {
      unset ($this->validatorSchema);
        $fields = array (
            'created_at',
            'updated_at',
            'usuario',
            'ip'
        );
        foreach($fields as $field) {
            unset($this[$field]);
        }


    $this->setValidators(array(
      'id_professorticket' => new sfValidatorPropelChoice(array('model' => 'Tbprofessorticket', 'column' => 'id_professorticket', 'required' => false)),
      'id_periodo'         => new sfValidatorPropelChoice(array('model' => 'Tbperiodo', 'column' => 'id_periodo')),
      'matricula_prof'     => new sfValidatorPropelChoice(array('model' => 'Tbprofessor', 'column' => 'matricula_prof', 'required' => false)),
      'dt_inicio'          => new sfValidatorDate(array('required' => false)),
      'dt_fim'             => new sfValidatorDate(array('required' => false)),
      'created_at'         => new sfValidatorDate(array('required' => false)),
      'updated_at'         => new sfValidatorDate(array('required' => false)),
      'created_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'updated_by'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));
  
    $this->widgetSchema->setNameFormat('tbprofessorticket[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

  }
}
