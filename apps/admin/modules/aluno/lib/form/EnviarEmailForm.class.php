<?php

class EnviarEmailForm extends sfForm {

    private   $URLPOST = 'aluno/EnviarEmail';

    public function configure() {
        
        $request = sfContext::getInstance()->getRequest();
        $ids = ($request->hasAttribute('ids')) ? $request->getAttribute('ids') : array();

        $this->widgetSchema['ids'] = new sfWidgetFormInputHidden();
        if(count($ids)) $this->widgetSchema['ids']->setDefault(implode(',',$ids));
        $this->validatorSchema['ids'] = new sfvalidatorRegex(array('pattern'=>'/^[0-9]+(,[0-9]+)*$/'));


      $widgets['mensagem'] = new sfWidgetFormTextarea(array(),array('columns' => 50 ,'lines' => 10));

      $validators['mensagem'] = new sfValidatorString();

      $widgets['subject'] = new sfWidgetFormInput(array('type' => 'text'));

      $validators['subject'] = new sfValidatorString();





      $this->setWidgets($widgets);
      $this->setValidators($validators);

    }

    function  save(){
        
                    $values = $this->getValues();

                    try {
                        $obj = new Tbaluno();
                        $list = TbalunoPeer::retrieveByPKs(explode(',', $values['ids']));
                        foreach ($list as $obj) {
                          if ($obj->getEmail() != null ){
                           $message = sfContext::getInstance()->getMailer()->compose('derca@ufrr.br', $obj->getEmail(), $values['subject'], $values['mensagem']);
                           sfContext::getInstance()->getMailer()->send($message);
                          }
                        }
                    } catch (Exception $exc) {
                        sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar versão de curso');
                    }
                    $this->getUser()->setFlash('notice', 'Versão de curso trocada');                

    }


    public function getURLPOST(){
        return $this->URLPOST;
    }

}