<?php

/**
 * turmaaluno module helper.
 *
 * @package    derca
 * @subpackage turmaaluno
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class turmaalunoGeneratorHelper extends BaseTurmaalunoGeneratorHelper {

    function linkToVoltar($object, $params) {

        $id_turma = $object->getIdTurma() ? $object->getIdTurma() : sfContext::getInstance()->getRequest()->getParameter('id_turma');

        if($id_turma != null)
            return '<li class="sf_admin_action_voltar">'.link_to(__($params['label'], array(), 'sf_admin'), 'turma/edit?id_turma='.$id_turma ).'</li>';
        else
            return '';

    }
   
}
