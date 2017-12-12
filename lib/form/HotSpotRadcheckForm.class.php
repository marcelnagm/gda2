<?php

/**
 * HotSpotRadcheck form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class HotSpotRadcheckForm extends BaseHotSpotRadcheckForm
{
  public function configure()
  {
        $fields = array (
            'created_at',
            'updated_at',
            'usuario',
            'ip'
        );
        foreach($fields as $field) {
            unset($this[$field]);
        }
  }
}
