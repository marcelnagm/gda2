<?php

/**
 * TbturmaAluno form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbturmaAlunoForm extends BaseTbturmaAlunoForm {
    public function configure() {
        unset($this['faltas']);
        unset($this['media_parcial']);
        unset($this['exame_recuperacao']);
        unset($this['media_final']);
        unset($this['id_conceito']);

        $this->widgetSchema['matricula'] = new sfWidgetFormInput(array(),array('size' => 10));
//        $this->widgetSchema['matricula'] = new sfWidgetFormJQueryAutocompleter(array('url'=> 'aluno/autocompleteList' ));

        $situacoes_matricula = array(
                0,  // Aluno Regular
                12, // Aluno Especial
        );
        $situacoes_matricula = sfConfig::get('app_situacoes_matricula_turma',$situacoes_matricula);
        $criteria = new Criteria();
        $criteria->add(TbalunoPeer::ID_SITUACAO,$situacoes_matricula,Criteria::IN);
        $this->validatorSchema['matricula'] = new sfValidatorPropelChoice(array(
                        'model' => 'Tbaluno',
                        'column' => 'matricula',
                        'criteria' => $criteria,
                        'required' => true
        ));

        $this->validatorSchema['matricula']->setMessage('invalid','Aluno não pôde ser incluído na turma. Verifique a situação do aluno.');

        if( $this->isNew() ) {

            if(sfContext::getInstance()->getRequest()->hasParameter('id_turma')) {
                $this->widgetSchema['id_turma']->setDefault(intval(sfContext::getInstance()->getRequest()->getParameter('id_turma')));
            }

        }
    }
}
