<?php

class CancelamentoForm extends sfForm {

    public function configure() {

        $this->widgetSchema->setNameFormat('cancelar[%s]');
    }

}
?>
