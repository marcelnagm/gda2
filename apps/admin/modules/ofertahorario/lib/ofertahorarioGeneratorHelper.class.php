<?php

/**
 * ofertahorario module helper.
 *
 * @package    derca
 * @subpackage ofertahorario
 * @author     Your name here
 * @version    SVN: $Id: helper.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ofertahorarioGeneratorHelper extends BaseOfertahorarioGeneratorHelper {

    function linkToVoltar($object, $params){

        $id_oferta = $object->getIdOferta() ? $object->getIdOferta() : sfContext::getInstance()->getRequest()->getParameter('id_oferta');

        if($id_oferta != null)
            return '<li class="sf_admin_action_voltar">'.link_to(__($params['label'], array(), 'sf_admin'), 'oferta/edit?id_oferta='.$id_oferta ).'</li>';
        else
            return '';
        
    }
    
}
