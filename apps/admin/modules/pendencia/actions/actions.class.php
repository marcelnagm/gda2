<?php

require_once dirname(__FILE__) . '/../lib/pendenciaGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/pendenciaGeneratorHelper.class.php';

/**
 * pendencia actions.
 *
 * @package    derca
 * @subpackage pendencia
 * @author     Marcelo Matos <marcelo@cecomp.ufrr.br>
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class pendenciaActions extends autoPendenciaActions {

    public function executeAdicionar(sfWebRequest $request) {
        $form = new PendenciaForm();
        if ($request->isMethod(sfRequest::POST) && $request->hasParameter($form->getName())) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                try {
                    $form->save();
                    $this->getUser()->setFlash('notice', 'Pendências adicionadas com sucesso!');
                } catch (Exception $exc) {
                    $this->getUser()->setFlash('error', 'Erro ao adicionar pendências!');
                }
                $this->redirect('pendencia/index');
            }
        }
        $temp = $request->getParameter('matricula');
        if (isset($temp)) {
            $form->setWidget('matricula', new sfWidgetFormInput(array(), array('value' => $temp, 'size' => 15, 'readonly' => 'readonly')));
        }
        $this->form = $form;
    }

    public function executeBatchResolver(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria->add(TbpendenciaPeer::ID, $request->getParameter('ids'), Criteria::IN);
        try {
            foreach (TbpendenciaPeer::doSelect($criteria) as $pendencia) {
                $pendencia->setResolvido(true);
                $pendencia->save();
            }
            $this->getUser()->setFlash('notice', 'Pendências resolvidas!');
        } catch (Exception $exc) {
            $this->getUser()->setFlash('error', 'Erro ao resolver pendências!'."\n".$exc->getMessage());
        }
    }

    public function executeListResolver(sfWebRequest $request) {
        $pendencia = TbpendenciaPeer::retrieveByPK($request->getParameter('id'));
        $pendencia->setResolvido(true);
        try {
            $pendencia->save();
            $this->getUser()->setFlash('notice', 'Pendência resolvida!');
        } catch (Exception $exc) {
            $this->getUser()->setFlash('error', 'Erro ao resolver pendência!'."\n".$exc->getMessage());
        }
        $this->redirect('pendencia/index');
    }

    public function executeBatchUnResolver(sfWebRequest $request) {
        $criteria = new Criteria();
        $criteria->add(TbpendenciaPeer::ID, $request->getParameter('ids'), Criteria::IN);
        try {
            foreach (TbpendenciaPeer::doSelect($criteria) as $pendencia) {
                $pendencia->setResolvido(false);
                $pendencia->save();
            }
            $this->getUser()->setFlash('notice', 'Pendências criadas!');
        } catch (Exception $exc) {
            $this->getUser()->setFlash('error', 'Erro ao criar pendências!'."\n".$exc->getMessage());
        }
    }

    public function executeListUnResolver(sfWebRequest $request) {
        $pendencia = TbpendenciaPeer::retrieveByPK($request->getParameter('id'));
        $pendencia->setResolvido(false);
        try {
            $pendencia->save();
            $this->getUser()->setFlash('notice', 'Pendência criada!');
        } catch (Exception $exc) {
            $this->getUser()->setFlash('error', 'Erro ao criar pendência!'."\n".$exc->getMessage());
        }
        $this->redirect('pendencia/index');
    }

    function executeListPendencia(sfWebRequest $request) {
//        $request->setAttribute('id', $request->getParameter('id'));
        $this->forward('pendencia', 'Adicionar');
    }

}
