<?php

/**
 * Tbpendencia form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class PendenciaForm extends sfForm {

    private $URLPOST = 'pendencia/Adicionar';

    public function configure() {

        $this->widgetSchema['resolvido'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['resolvido'] = new sfValidatorBoolean();
        
        $this->widgetSchema['id_tipo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbpendenciatipo',
                    'expanded' => true,
                    'multiple' => true,
                    'add_empty' => false));
        $this->validatorSchema['id_tipo'] = new sfValidatorPropelChoice(array('model' => 'Tbpendenciatipo', 'column' => 'id', 'multiple' => true));

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(), array('size' => 15));
        $this->validatorSchema['matricula'] = new sfValidatorString();

        $this->widgetSchema->setNameFormat('pendencia[%s]');
    }

    public function save() {
        $values = $this->getValues();
        foreach ($values['id_tipo'] as $tipo) {
            $pend = new Tbpendencia();
            $pend->setMatricula($values['matricula']);
            $pend->setResolvido($values['resolvido']);
            $pend->setIdTipo($tipo);
            $pend->save();
        }
    }

    public function getURLPOST() {
        return $this->URLPOST;
    }

    public function getFields() {
        return array(
            'matricula' => 'ForeignKey',
            'id_tipo' => 'Array',
            'resolvido' => 'NormalKey',
        );
    }

}
