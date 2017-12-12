<?php

/**
 * Tbsumula form base class.
 *
 * @method Tbsumula getObject() Returns the current form's model object
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
class ProfessorSumulaForm extends sfForm {
    public function configure() {


        $widgets['id_sumula'] = new sfWidgetFormInputHidden();

        $years_range = sfConfig::get('app_years_range',5);
        $years = range(date('Y'), date('Y') - $years_range);
        $widgets['data']      = new sfWidgetFormJQueryDate(array(
                        'culture'=>'pt-BR',
                        'image'=>'/images/icons/calendar-small.png',
                        'date_widget'=> new sfWidgetFormDate(array(
                                'format'=>'%day%/%month%/%year%',
                                'years' => array_combine($years, $years)
                        )),
        ));

//        $widgets['descricao'] = new sfWidgetFormTextarea(array(),array(
//                        'rows' => 10,
//                        'cols' => 50,
//
//        ));

        $widgets['descricao'] = new sfWidgetFormTextareaTinyMCE(array(
                        'width'  => 500,
                        'height' => 200,
                        'config' => '
                            plugins : "paste",
                            invalid_elements: "font,span,style,em,a",
                            paste_auto_cleanup_on_paste : true,
                            theme_advanced_buttons1 : "bold,italic,underline,|,bullist,numlist,|,formatselect,|,removeformat",
                            theme_advanced_buttons2 : "",
                            theme_advanced_buttons3 : "",
                            theme_advanced_buttons4 : "",
                            force_br_newlines : true,
                            force_p_newlines  : false,
                            forced_root_block : "div",
                            entity_encoding : "named"
                            ',
        ));

        $validators['id_sumula'] = new sfValidatorInteger(array('required' => false));
        $validators['data']      = new sfValidatorDate(array('required' => true));
        $validators['descricao'] = new sfValidatorString(array('required' => true));



        $this->setWidgets($widgets);
        $this->setValidators($validators);

        $this->widgetSchema->setNameFormat('sumula[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    }


}
