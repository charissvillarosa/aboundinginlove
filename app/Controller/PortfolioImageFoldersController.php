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

    /**
     * Works like the index function but separated
     * for the permission handling
     */
    function view($id)
    {
        $this->index($id);
    }

    /**
     * AJAX handler for adding/updating portfolio folder
     * @return JSON string
     */
    function save()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $this->PortfolioImageFolder->create();
            $postData = $this->request->data;
            $this->PortfolioImageFolder->set('id', $postData['id']);
            $this->PortfolioImageFolder->set('name', $postData['name']);
            $this->PortfolioImageFolder->set('portfolio_id', $postData['portfolio_id']);

            if ($this->PortfolioImageFolder->save()) {
                $this->response->body(json_encode(array(
                    'success' => true,
                    'message' => __('Record has been saved'),
                    'list' => $this->getFolderArray($postData['portfolio_id'])
                )));
            }
            else {
                $this->response->body(json_encode(array(
                    'success' => true,
                    'message' => __('The record could not be saved. Please, try again.')
                )));
            }
        }
    }

    /**
     * AJAX handler for adding/updating portfolio folder
     * @return JSON string
     */
    function remove()
    {
        $this->autoRender = false;
        
        if (!$this->request->is('post')) return;

        $folderId = $this->request->data['id'];
        $folder = $this->PortfolioImageFolder->findById($folderId);
        
        if ($folder) {
            $this->PortfolioImageFolder->delete($folderId);
        }

        $this->response->body(json_encode(array(
            'success' => true,
            'list' => $this->getFolderArray($folder['PortfolioImageFolder']['portfolio_id'])
        )));
    }

    // helper method
    private function getFolderArray($portfolioId)
    {
        // return the list
        $result = $this->PortfolioImageFolder->find('all', array(
            'conditions' => array(
                'PortfolioImageFolder.portfolio_id' => $portfolioId
            ),
            'order' => 'PortfolioImageFolder.name'
        ));

        $folders = array();
        foreach ($result as $item) {
            array_push($folders, $item['PortfolioImageFolder']);
        }

        return $folders;
    }

}
