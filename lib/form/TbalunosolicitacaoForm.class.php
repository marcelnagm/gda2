<?php

/**
 * Tbalunosolicitacao form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbalunosolicitacaoForm extends BaseTbalunosolicitacaoForm
{
  public function configure()
  {
        $fields = array (
            'created_at',
            'updated_at',
            'usuario',
            'ip',
            'matricula',
            'data_solicitacao',
            'data_encerrado',
            'situacao',

        );
        foreach($fields as $field) {
            unset($this[$field]);
        }

      $this->widgetSchema['tipo'] = new sfWidgetFormChoice( array('choices' => TbalunosolicitacaoPeer::getChoices() )         
      ,array()
      );

  }
}
