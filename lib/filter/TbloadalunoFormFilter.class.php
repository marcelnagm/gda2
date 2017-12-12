<?php

/**
 * Tbloadaluno filter form.
 *
 * @package    derca
 * @subpackage filter
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormFilterTemplate.php 11675 2008-09-19 15:21:38Z fabien $
 */
class TbloadalunoFormFilter extends BaseTbloadalunoFormFilter {

    public function configure() {

//        $this->widgetSchema['id_versao_curso'] = new sfWidgetFormChoice(array(
//                    'choices' => array(NULL => '',
//                        '12' => 'ADMINISTRAÇÃO',
//                        '34' => 'AGRONOMIA',
//                        '114' => 'ANTROPOLOGIA',
//                        '28' => 'ARQUITETURA E URBANISMO',
//                        '122' => 'ARTES VISUAIS',
//                        '59' => 'BIOLOGIA (B)',
//                        '58' => 'BIOLOGIA (L)',
//                        '23' => 'CIÊNCIAS SOCIAIS',
//                        '96' => 'CIÊNCIAS DA COMPUTAÇÃO',
//                        '18' => 'COMUNICAÇÃO SOCIAL',
//                        '109' => 'CONTABILIDADE',
//                        '47' => 'DIREITO',
//                        '60' => 'ECONOMIA MATUTINO',
//                        '38' => 'ECONOMIA VESP/NOTURNO',
//                        '37' => 'ENGENHARIA CIVIL',
//                        '149' => 'ENGENHARIA ELETRICA',
//                        '50' => 'FÍSICA',
//                        '56' => 'GEOGRAFIA',
//                        '78' => 'GEOLOGIA',
//                        '63' => 'HISTÓRIA MATUTINO',
//                        '64' => 'HISTÓRIA NOTURNO',
//                        '79' => 'INTERCULTURAL',
//                        '110' => 'LETRAS - LITERATURA',
//                        '111' => 'LETRAS - ESPANHOL',
//                        '112' => 'LETRAS - FRANCÊS',
//                        '113' => 'LETRAS - INGLÊS',
//                        '55' => 'MATEMÁTICA (B)',
//                        '51' => 'MATEMÁTICA (L)',
//                        '62' => 'MEDICINA',
//                        '95' => 'PEDAGOGIA',
//                        '29' => 'PSICOLOGIA',
//                        '61' => 'QUÍMICA',
//                        '66' => 'RELAÇÕES INTERNACIONAIS',
//                        '108' => 'SECRETARIADO',
//                        '30' => 'ZOOTECNIA'
//                        )));

//        $this->widgetSchema['opcao'] = new sfWidgetFormChoice(array(
//                    'choices' => array("",
//                        "1%" => '1',
//                        "2%" => '2',
//                        "CHAMADO%" => 'CHAMADO',
//                        "FALTOU%" => 'FALTOU',
//                        "MATRICULA%" => 'MATRICULA',
//                        "ELIMINADO%" => 'ELIMINADO')));

        $this->validatorSchema['matricula'] = new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false)));
    }

}
