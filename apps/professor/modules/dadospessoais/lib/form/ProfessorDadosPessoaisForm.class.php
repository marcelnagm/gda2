<?php

/**
 * Tbprofessor form base class.
 *
 * @method Tbprofessor getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
class ProfessorDadosPessoaisForm extends sfForm {

    public function configure() {

        $widgets['celular']           = new sfWidgetFormInputText();
        $widgets['email']             = new sfWidgetFormInputText();
        $widgets['fone_residencial']  = new sfWidgetFormInputText();


        $validators['celular']          = new sfValidatorRegex(array('pattern' => '/^[0-9]{8,12}$/', 'required' => true));
        $validators['celular']->setMessage('invalid','Número inválido');
        $validators['email']            = new sfValidatorEmail(array('required' => true));
        $validators['email']->setMessage('invalid','E-mail invalido');
        $validators['fone_residencial'] = new sfValidatorRegex(array('pattern' => '/^[0-9]{8,12}$/', 'required' => true));
        $validators['fone_residencial']->setMessage('invalid','Número inválido');

        $this->setWidgets($widgets);

        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('dadospessoais[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    }


}
