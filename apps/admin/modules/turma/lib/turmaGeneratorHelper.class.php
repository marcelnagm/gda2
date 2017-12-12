<?php

/**
 * turma module helper.
 *
 * @package    derca
 * @subpackage turma
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaGeneratorHelper extends BaseTurmaGeneratorHelper {
    /**
     * Link para acao de apagar aluno da turma
     * Permitir acao apagar somente para conceito diferente de aprovado
     *
     * @param <type> $object
     * @param <type> $params
     * @return <type>
     */
    public function linkToAlunosDelete($object, $params) {

        if ($object->getIdConceito()==1 || $object->getIdConceito()==4 || $object->isNew()) {
            return '';
        }
        return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'tbturma_aluno_delete' , $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
    }

    /**
     * Construtor do link para incluir aluno na turma
     * 
     * @param <type> $object
     * @param <type> $params
     * @return <type>
     */
    public function linkToIncluirAluno($object, $params) {
        return '<li class="sf_admin_action_new">'.link_to(__($params['label'], array(), 'sf_admin'), 'tbturma_aluno_new' , $object).'</li>';
    }

}
