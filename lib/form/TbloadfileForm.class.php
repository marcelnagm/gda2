<?php

/**
 * Tbloadfile form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbloadfileForm extends BaseTbloadfileForm {

    public function configure() {

        $this->widgetSchema['file'] = new sfWidgetFormInputFile(array(
                    'label' => 'File',
                ));
        $this->validatorSchema['file'] = new sfValidatorFile(array(
                    'required' => true,
                    'path' => sfConfig::get('sf_upload_dir') . '/files',
                ));

        $this->widgetSchema->setHelp('description', 'Short description or filename');
        
    }

}
