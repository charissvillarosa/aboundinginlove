<?php

/*
 * @author Chariss
 */

class PortfolioImagesController extends AppController
{

    var $layout = 'document';

    var $uses = array('PortfolioImage', 'PortfolioImageFolder');

    public function beforeFilter()
    {
        $this->Auth->allow('view', 'upload');
    }

    public function view($id)
    {
        $this->autoRender = false;

        $this->PortfolioImage->id = $id;
        $photo = $this->PortfolioImage->read();

        // let browser cache it for 1 year
        header('Cache-Control: public, max-age=31536000');

        if ($photo) {
            header('Content-type: ' . $photo['PortfolioImage']['content_type']);
            echo $photo['PortfolioImage']['image'];
        } else {
            header('Content-type: image/jpg');
            include 'app/webroot/img/sponsees/nophoto.jpg';
        }
    }

    function upload($folderId)
    {
        if (empty($this->data)) {
            $this->render();
        } 
        else {
            $tempName = $this->request->data['PortfolioImage']['image']['tmp_name'];
            $des = $this->request->data['PortfolioImage']['description'];
            
            $content = null;
            $type = null;
            
            if (!empty($tempName) && is_uploaded_file($tempName)) {
                // Strip path information
                $type = $this->request->data['PortfolioImage']['image']['type'];
                $content = file_get_contents($tempName);
            }
            else {
                $this->Session->setFlash('Please choose an image to be uploaded.');
                $this->redirect(array('action' => 'upload', $folderId));
            }

            unlink($tempName);

            $folder = $this->PortfolioImageFolder->findById($folderId);
            
            $this->PortfolioImage->create();
            $this->PortfolioImage->set('portfolio_id', $folder['PortfolioImageFolder']['portfolio_id']);
            $this->PortfolioImage->set('folder_id', $folderId);
            $this->PortfolioImage->set('description', $des);
            $this->PortfolioImage->set('content_type', $type);
            $this->PortfolioImage->set('image', $content);
            
            if ($this->PortfolioImage->save()) {
                $this->redirect(array('controller'=>'PortfolioImageFolders', 'action'=>'view', $folderId));
            } else {
                $this->Session->setFlash('Please correct errors below.');
            }
        }
    }

    /**
     * AJAX remove handler
     */
    function remove()
    {
        // set the two fields to false
        // to prevent default view and layout rendering
        $this->autoRender = false;
        $this->autoLayout = false;
        
        if (!$this->request->is('post')) return;
        
        $id = $this->request->data['id'];
        $image = $this->PortfolioImage->findById($id);
        
        if ($image) {
            $this->PortfolioImage->delete($id);
        }
        else {
            // throw this exception to allow 
            // the UI to handle the error gracefully
            throw new InternalErrorException();
        }

        // render the list of images for UI update
        $folder = $this->PortfolioImageFolder->findById($image['PortfolioImage']['folder_id']);
        $this->set('folderModel', $folder);

        // we use '..' because this is relative to the current view folder
        $this->render('../PortfolioImageFolders/image-tiles');
    }

}
