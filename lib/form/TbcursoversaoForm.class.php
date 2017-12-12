<?php

/**
 * Tbcursoversao form.
 *
 * @package    derca
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbcursoversaoForm extends BaseTbcursoversaoForm {
    public function configure() {
        $situacoes = array('ATIVA', 'INATIVA');
        $this->widgetSchema['situacao'] = new sfWidgetFormChoice(array(
                        'choices' => array_combine($situacoes, $situacoes)
        ));
        
        $tipo_integracao = array(
            'E' => 'E-MEC',
            'C' => 'CAPES',
            'X' => 'Código interno da instituição',
        );
        $this->widgetSchema['cod_integracao_tipo'] = new sfWidgetFormChoice(array(
                        'choices' => $tipo_integracao
        ));
    }

}
