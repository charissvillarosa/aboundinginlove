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

    function upload($id)
    {
        if (empty($this->data)) {
            $this->render();
        } 
        else {
            $tempName = $this->request->data['PortfolioImage']['image']['tmp_name'];
            $content = null;
            $type = null;
            
            if (!empty($tempName) && is_uploaded_file($tempName)) {
                // Strip path information
                $type = $this->request->data['PortfolioImage']['image']['type'];
                $content = file_get_contents($tempName);
            }

            unlink($tempName);
            
            $this->SponseeImage->create();
            $this->SponseeImage->set('sponsee_id', $id);
            $this->SponseeImage->set('content_type', $type);
            $this->SponseeImage->set('image', $content);
            
            if ($this->SponseeImage->save()) {
                $this->loadModel('Sponsee');
                $this->Sponsee->id = $id;
                $this->Sponsee->read();
                $this->Sponsee->set('primaryimage', $this->PortfolioImage->id);
                $this->Sponsee->save();
                $this->redirect(array('controller'=>'sponsees', 'action'=>'view', $id));
            } else {
                $this->Session->setFlash('Please correct errors below.');
            }
        }
    }

}
