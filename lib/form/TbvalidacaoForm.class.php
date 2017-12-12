<?php

/**
 * Tbvalidacao form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbvalidacaoForm extends BaseTbvalidacaoForm {

    public function configure() {
        $fields = array(
            'created_at',
            'updated_at',
            'usuario',
            'ip'
        );
        foreach ($fields as $field) {
            unset($this[$field]);
        }

        $widgets['matricula'] = new sfWidgetFormInput(array(), array('size' => 25));
        $widgets['matricula']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        $widgets['matricula']->setLabel('Matrícula');
        $widgets['num_auth'] = new sfWidgetFormInput(array(), array('size' => 25));
        $widgets['num_auth']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        $widgets['num_auth']->setLabel('Número de autenticação');
        $widgets['data'] = new sfWidgetFormDate();
        $widgets['data']->setLabel('Data da emissão');
        $widgets['hora'] = new sfWidgetFormTime();
        $widgets['hora']->addOption('with_seconds', true);
        $widgets['hora']->setLabel('Hora da emissão');
        $widgets['id_tipo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbvalidacaotipo',
                    'add_empty' => false));
        $widgets['ativo'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        '0' => 'INATIVO',
                        '1' => 'ATIVO'
                    ),
                    'expanded' => false,
                    'multiple' => false));

        $validators['matricula'] = new sfValidatorRegex(
		array('pattern' => '/^[1-9]?(19|20)[0-9]+$/', 'required' => true),
		array('invalid' => 'Número de matrícula inválido'));
        $validators['num_auth'] = new sfValidatorRegex(
		array('pattern' => '/^([0-9]|[A-F])+$/', 'required' => true),
		array('invalid' => 'Número de autenticação inválido'));
        $validators['data'] = new sfValidatorDate(
                array('required' => true),
		array('invalid' => 'Data inválida'));
        $validators['hora'] = new sfValidatorTime(
                array('required' => true),
		array('invalid' => 'Hora inválida'));
        $validators['id_tipo'] = new sfValidatorPropelChoice(array(
                    'model' => 'Tbvalidacaotipo'));
        $validators['ativo'] = new sfValidatorChoice(array(
                    'choices' => array('0','1')));

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->widgetSchema->setNameFormat('validar[%s]');
    }

}
