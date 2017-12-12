<?php

/**
 * Tbaviso form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbavisoForm extends BaseTbavisoForm {
    public function configure() {
        $this->widgetSchema['texto'] = new sfWidgetFormTextareaTinyMCE(array(
                        'width'  => 450,
                        'height' => 250,
                        'config' => 'theme_advanced_disable: "anchor,image,cleanup,help"',
                        #'languages' => array('pt_BR','pt','en'),
        ));

        $this->getWidget('local')->addOption('expanded', true);
/*
        $this->widgetSchema['local'] = new sfWidgetFormInput(array(
            'type' => 'hidden'
            ));
        $this->getWidget('local')->setHidden(true);
*/

 
    }
}
