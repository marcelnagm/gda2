<?php

class AlterarSenhaForm extends sfGuardUserAdminForm {

    public function configure() {

        parent::configure();

        $current_user = sfContext::getInstance()->getUser();

        $this->widgetSchema['username']->setAttribute('readonly','readonly');
        $this->validatorSchema['username'] = new sfValidatorCallback(array(
                        'required' => true,
                        'callback'  => 'constantValidatorCallback',
                        'arguments' => array('constant' => $current_user->getUsername()),

        ));

        $this->widgetSchema['password_current'] = new sfWidgetFormInputPassword();
        $this->validatorSchema['password_current'] = new sfValidatorCallback(array(
                        'required' => true,
                        'callback'  => 'passwordValidatorCallback',
                        'arguments' => array('user' => $current_user),

        ));
        $this->validatorSchema['password_current']->setMessage('invalid','Password is invalid');

        $this->widgetSchema->setNameFormat('chgpass[%s]');

    }

    public function save($con = null) {

        try {
            $values = $this->getValues();
            $current_user = sfContext::getInstance()->getUser();
            $sfGuardUser = sfGuardUserPeer::retrieveByPK($current_user->getGuardUser()->getId());
            $sfGuardUser->setPassword($values['password']);
            $sfGuardUser->save($con);
            return $this->getObject();
        } catch(Excetion $exc) {
            throw new sfValidatorError($this->validatorSchema['password'], 'invalid', array('message'=>'Error saving password'));
        }

    }
}


function constantValidatorCallback($validator, $value, $arguments) {
    if ($value != $arguments['constant']) {
        throw new sfValidatorError($validator, 'invalid');
    }
    return $value;
}

function passwordValidatorCallback($validator, $value, $arguments) {
    if ( ! $arguments['user']->checkPassword($value)) {
        throw new sfValidatorError($validator, 'invalid');
    }
    return $value;
}
