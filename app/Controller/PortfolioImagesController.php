<?php

/*
 * @author Chariss
 */

class PortfolioImagesController extends AppController
{

    var $layout = 'document';

    public function beforeFilter()
    {
        $this->Auth->allow('view', 'upload');
    }

    public function view($id)
    {
        $this->autoRender = false;

        $this->PortfolioImage->id = $id;
        $photo = $this->PortfolioImage->read();

        if ($photo) {
            header('Cache-Control: public');
            header('Cache-Control: max-age=3600');
            header('Content-type: ' . $photo['PortfolioImage']['content_type']);
            echo $photo['PortfolioImage']['image'];
        } else {
            header('Content-type: image/jpg');
            include 'app/webroot/img/sponsees/nophoto.jpg';
        }
    }

    function upload($sponsee_id, $id)
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
            }

            unlink($tempName);
            
            $this->PortfolioImage->create();
            $this->PortfolioImage->set('portfolio_id', $id);
            $this->PortfolioImage->set('description', $des);
            $this->PortfolioImage->set('content_type', $type);
            $this->PortfolioImage->set('image', $content);
            
            if ($this->PortfolioImage->save()) {
                $this->redirect(array('controller'=>'Portfolios', 'action'=>'listing', $sponsee_id, $id));
            } else {
                $this->Session->setFlash('Please correct errors below.');
            }
        }
    }

}
