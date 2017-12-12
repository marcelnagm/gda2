<?php

class AproveitamentoForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $id = $request->getAttribute('id');
        
        $this->widgetSchema['id'] = new sfWidgetFormInputText(array('label' => '<b>Matrícula de Origem</b>'), array('value' => $id));
        $this->validatorSchema['id'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $this->widgetSchema['new'] = new sfWidgetFormInputText(array('label' => '<br><br><b>Matrícula de Destino</b>'));
        $this->validatorSchema['new'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $this->widgetSchema['periodo'] = new sfWidgetFormPropelChoice(array(
                    'model' => 'Tbperiodo',
                    'add_empty' => true,
                    'order_by' => array('Ano', 'DES'),
                    'expanded' => false,
                    'multiple' => false,
                    'label' => 'qual periodo?',
                ));

        $this->validatorSchema['periodo'] = new sfValidatorString();

        $this->widgetSchema->setNameFormat('Aproveitamento[%s]');
    }

    function save() {

        $values = $this->getValues();

        try {
            $new = $values['new'];
            $id = $values['id'];
            $periodo = $values['periodo'];

            $criteria = new Criteria();
            $criteria->add(TbhistoricoPeer::MATRICULA, $id);
            $criteria->add(TbhistoricoPeer::ID_CONCEITO, array(4,8,1,13,7,6), Criteria::IN);
            foreach (TbhistoricoPeer::doSelect($criteria) as $hist) {
                $hist_new = new Tbhistorico();
                $hist_new = $hist->copy();
                $hist_new->setMatricula($new);
                $hist_new->setIdConceito(13);
                $hist_new->setFaltas(0);
                $hist_new->setIdPeriodo($periodo);
                $hist_new->save();
            }
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao salvar histórico');
        }
    }

}