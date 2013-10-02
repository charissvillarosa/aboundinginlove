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

    function upload($sponsee_id, $category_id)
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
                $this->redirect(array('action' => 'upload', $sponsee_id, $category_id));
            }

            unlink($tempName);
            
            $this->PortfolioImage->create();
            $this->PortfolioImage->set('portfolio_id', $category_id);
            $this->PortfolioImage->set('description', $des);
            $this->PortfolioImage->set('content_type', $type);
            $this->PortfolioImage->set('image', $content);
            
            if ($this->PortfolioImage->save()) {
                $this->redirect(array('controller'=>'Portfolios', 'action'=>'listing', $sponsee_id, $category_id));
            } else {
                $this->Session->setFlash('Please correct errors below.');
            }
        }
    }

}
