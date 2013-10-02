<?php

/*
 * @author Chariss
 */

class SponseeImagesController extends AppController
{

    var $layout = 'document';

    public function beforeFilter()
    {
        $this->Auth->allow('view');
    }

    public function view($id)
    {
        $this->autoRender = false;

        $this->SponseeImage->id = $id;
        $photo = $this->SponseeImage->read();

        // let browser cache it for 1 year
        header('Cache-Control: public, max-age=31536000');
        
        if ($photo) {
            header('Content-type: ' . $photo['SponseeImage']['content_type']);
            echo $photo['SponseeImage']['image'];
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
            $tempName = $this->request->data['SponseeImage']['image']['tmp_name'];
            $content = null;
            $type = null;
            
            if (!empty($tempName) && is_uploaded_file($tempName)) {
                $size = $this->request->data['SponseeImage']['image']['size'];
                $maxSize = 1024 * 1024 * 2; // 2 MB
                if ($size > $maxSize) {
                    $this->Session->setFlash('Please upload an image not greater than 2MB.');
                    $this->redirect(array('action' => 'upload', $id));
                }

                // Strip path information
                $type = $this->request->data['SponseeImage']['image']['type'];
                $content = file_get_contents($tempName);
            }
            else {
                $this->Session->setFlash('Choose an image to upload.');
                $this->redirect(array('action' => 'upload', $id));
            }

            unlink($tempName);
            
            $this->SponseeImage->create();
            $this->SponseeImage->set('id', $id);
            $this->SponseeImage->set('content_type', $type);
            $this->SponseeImage->set('image', $content);

            $randomKey = Security::generateAuthKey();
            $hashKey = Security::hash($randomKey, 'sha1');
            $this->SponseeImage->set('hash_key', $hashKey);

            try{
                if ($this->SponseeImage->save()) {
                    $this->redirect(array('controller'=>'sponsees', 'action'=>'adminview', $id));
                } else {
                    $this->Session->setFlash('Please correct errors below.');
                }
            }
            catch(Exception $e){
                $this->Session->setFlash('Please upload an image not greater than 2MB.');
            }
        }
    }

}
