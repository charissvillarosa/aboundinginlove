<?php

/*
 * @author jaycverg
 */

class PortfolioImageFoldersController extends AppController
{

    var $layout = 'gallery';
    var $uses = array('PortfolioImageFolder');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    function index($id)
    {
        if (empty($id)) {
            throw new NotFoundException();
        }

        $folder = $this->PortfolioImageFolder->findById($id);
        if (empty($folder)) {
            throw new NotFoundException();
        }

        $this->set('folderModel', $folder);
    }

}
