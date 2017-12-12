<?php

/**
 * Tbprofessor form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbprofessorForm extends BaseTbprofessorForm {
    public function configure() {

        unset($this['id_pessoa']);
        unset($this['foto']);
        unset($this['tbturma_professor_list']);
        unset($this['tbcoordenador_list']);

        $this->getWidget('siape')->setAttribute('size', 7);
        $this->getWidget('nome')->setAttribute('size', 50);
        $this->getWidget('email')->setAttribute('size', 50);
        #$this->getWidget('tbturma_professor_list')->setOption('', 'admin_check_list');


        $this->widgetSchema['matricula_prof'] = new sfWidgetFormInput(array(),array('size' => 7));
        $this->validatorSchema['matricula_prof'] = new sfValidatorRegex(array('pattern'=>'/^[0-9]+$/', 'required' => true));

        if( ! $this->isNew() ) {
            $this->widgetSchema['matricula_prof']->setAttribute('readonly','readonly');
        }
    
        $this->widgetSchema['tbcoordenadorcurso_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
    }
}
