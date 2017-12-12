<?php

class ValidarForm extends sfForm {

    private $descricao = 'Description unavailable.';

    function configure() {


        $widgets['id_tipo'] = new sfWidgetFormChoice(array(
                    'choices' => array(
                        '1' => 'DECLARAÇÃO DE MATRÍCULA'
                    ),
                    'expanded' => false,
                    'multiple' => false));
        $widgets['id_tipo']->setLabel('Tipo de declaração');
        $widgets['matricula'] = new sfWidgetFormInput(array(),array('size'=>25));
        $widgets['matricula']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        $widgets['matricula']->setLabel('Matrícula');
        $widgets['num_auth'] = new sfWidgetFormInput(array(),array('size'=>25));
        $widgets['num_auth']->setAttribute('onkeyup', "this.value=this.value.toUpperCase()");
        $widgets['num_auth']->setLabel('Número de autenticação');
        $widgets['data'] = new sfWidgetFormDate();
        $widgets['data']->setLabel('Data da emissão');
        $widgets['hora'] = new sfWidgetFormTime();
        $widgets['hora']->addOption('with_seconds', true);
        $widgets['hora']->setLabel('Hora da emissão');

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
        $validators['id_tipo'] = new sfValidatorChoice(array(
                    'choices' => array('1')));

        $this->setWidgets($widgets);
        $this->setValidators($validators);
        $this->widgetSchema->setNameFormat('validar[%s]');
    }

    public function getDescricao(){
        return $this->descricao;
    }
    
    public function getFields() {
        return array(
            'id_tipo' => 'Text',
            'matricula' => 'Text',
            'num_auth' => 'Text',
            'data' => 'Date',
            'hora' => 'Time',
        );
    }

}

?>
