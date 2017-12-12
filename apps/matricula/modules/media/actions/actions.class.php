<?php

/**
 * media actions.
 *
 * @package    derca
 * @subpackage media
 * @author     George Soon Ho Pereira <george.pereira@ufrr.br>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mediaActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        $this->forward('default', 'module');
    }

    public function executeShow(sfWebRequest $request) {
        // being sure no other content wil be output
        $this->setLayout(false);
        sfConfig::set('sf_web_debug', false);

        $pdfpath = sfConfig::get('sf_root_dir') . DIRECTORY_SEPARATOR . 'media'
                . DIRECTORY_SEPARATOR
                . $request->getParameter('filename') . '.pdf';

        // check if the file exists
        $this->forward404Unless(file_exists($pdfpath));

        // Adding the file to the Response object
        $this->getResponse()->clearHttpHeaders();
        $this->getResponse()->setHttpHeader('Pragma: public', true);
        $this->getResponse()->setContentType('application/pdf');
        $this->getResponse()->sendHttpHeaders();
        $this->getResponse()->setContent(readfile($pdfpath));

        return sfView::NONE;
    }

}
