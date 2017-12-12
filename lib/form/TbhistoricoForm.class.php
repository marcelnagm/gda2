<?php

/**
 * Tbhistorico form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbhistoricoForm extends BaseTbhistoricoForm {

    public function configure() {

        unset($this['carater']);

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(), array('size' => 15));
        $this->widgetSchema['id_periodo'] = new sfWidgetFormPropelChoice(array('model' => 'Tbperiodo', 'add_empty' => true));
        $this->widgetSchema['cod_disciplina'] = new sfWidgetFormPropelChoice(array('model' => 'Tbdisciplina', 'add_empty' => true));
        $this->widgetSchema['id_conceito'] = new sfWidgetFormPropelChoice(array('model' => 'Tbconceito', 'add_empty' => true));
    }

}
