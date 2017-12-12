<?php

/**
 * Tbturma form.
 *
 * @package    derca
 * @subpackage form
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TbturmaForm extends BaseTbturmaForm {
    public function configure() {

        unset($this['n_notas']);

        $current_user = sfContext::getInstance()->getUser();

        if($current_user->hasCredential('atualizar_historico') && !$this->isNew()) {
            $this->widgetSchema['notas_no_historico']->setAttribute('onclick', 'if(this.checked==false) alert("Desmarcando esse campo as notas no histórico referente aos alunos desta turma serão APAGADAS. Depois de clicar no botão Salvar a operação não poderá ser desfeita.")');
        } else {
            unset($this['notas_no_historico']);
        }

        $this->widgetSchema['turma']->setAttribute('size', 5);
        $this->widgetSchema['turma']->setAttribute('maxlength',5);

        $this->validatorSchema['turma']->setOption('required' , false);
        $this->validatorSchema['cod_disciplina']->setOption('required' , false);
        $this->validatorSchema['id_periodo']->setOption('required' , false);
        $this->widgetSchema['observacao']->setAttribute('size', 50);

        $criteria_professor_ativo = new Criteria();
        $criteria_professor_ativo->add(TbprofessorPeer::ID_PROF_SIT,1); # ATIVO
        $this->widgetSchema['tbturma_professor_list']->setOption('criteria',$criteria_professor_ativo);
        $this->widgetSchema['tbturma_professor_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');

        $this->validatorSchema['tbturma_professor_list']->setOption('criteria',$criteria_professor_ativo);
    }
}
