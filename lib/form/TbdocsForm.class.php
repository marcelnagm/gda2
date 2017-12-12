<?php

/**
 * Tbdocs form.
 *
 * @package    derca
 * @subpackage form
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbdocsForm extends BaseTbdocsForm
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
