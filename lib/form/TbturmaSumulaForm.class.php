<?php

/**
 * TbturmaSumula form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbturmaSumulaForm extends BaseTbturmaSumulaForm {

    public function configure() {
        if (sfContext::getInstance()->getUser()->hasAttribute('professor')) {
            $years_range = sfConfig::get('app_years_range', 5);
            $years = range(date('Y'), date('Y') - $years_range);
            $this->widgetSchema['data'] = new sfWidgetFormJQueryDate(array(
                        'culture' => 'pt-BR',
                        'image' => '/images/icons/calendar-small.png',
                        'date_widget' => new sfWidgetFormDate(array(
                            'format' => '%day%/%month%/%year%',
                            'years' => array_combine($years, $years)
                        )),
                    ));
        }
    }

}
