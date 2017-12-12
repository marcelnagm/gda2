<?php

/**
 * oferta module helper.
 *
 * @package    derca
 * @subpackage oferta
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ofertaGeneratorHelper extends BaseOfertaGeneratorHelper {

    public function linkToHorarioEdit($object, $params) {
        return '<li class="sf_admin_action_edit">'.link_to(__($params['label'], array(), 'sf_admin'), 'tbofertahorario_edit', $object).'</li>';
    }

    public function linkToHorarioDelete($object, $params) {
        if ($object->isNew()) {
            return '';
        }
        return '<li class="sf_admin_action_delete">'.link_to(__($params['label'], array(), 'sf_admin'), 'tbofertahorario_delete' , $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
    }
}
