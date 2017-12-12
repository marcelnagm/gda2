<?php

class AlteraMatriculaForm extends sfForm {

    public function configure() {

        $request = sfContext::getInstance()->getRequest();
        $id = $request->getAttribute('id');

        $this->widgetSchema['id'] = new sfWidgetFormInputHidden(array(), array('value' => $id));
        $this->validatorSchema['id'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $this->widgetSchema['new'] = new sfWidgetFormInputText();
        $this->validatorSchema['new'] = new sfvalidatorRegex(array('pattern' => '/^[0-9]+(,[0-9]+)*$/'));

        $this->widgetSchema->setNameFormat('AlteraMatricula[%s]');
    }

    function save() {

        $values = $this->getValues();

        try {
            $new = $values['new'];
            $id = $values['id'];

            if (TbalunoPeer::retrieveByPK($new) != null) {
                sfContext::getInstance()->getUser()->setFlash('error', 'Matrícula já existente!');
                return;
            }

            $old = new Tbaluno();
            $old = TbalunoPeer::retrieveByPK($values['id']);

            $newold = $old->copy();
            $newold->setMatricula($new);

            $newold->save();

            $criteria = new Criteria();
            $criteria->add(TbturmaAlunoPeer::MATRICULA, $id);
            foreach (TbturmaAlunoPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbalunodiplomaPeer::MATRICULA, $id);
            foreach (TbalunodiplomaPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbalunosenhaPeer::MATRICULA, $id);
            foreach (TbalunosenhaPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbalunosolicitacaoPeer::MATRICULA, $id);
            foreach (TbalunosolicitacaoPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbbancaPeer::MATRICULA, $id);
            foreach (TbbancaPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbfilaPeer::MATRICULA, $id);
            foreach (TbfilaPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbhistoricoPeer::MATRICULA, $id);
            foreach (TbhistoricoPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }
            $criteria->clear();
            $criteria->add(TbpendenciaPeer::MATRICULA, $id);
            foreach (TbpendenciaPeer::doSelect($criteria) as $oldstuff) {
                $oldstuff->setMatricula($new);
                $oldstuff->save();
            }

            $old->delete();
        } catch (Exception $exc) {
            sfContext::getInstance()->getUser()->setFlash('error', 'Erro ao alterar matrícula');
        }
    }

}