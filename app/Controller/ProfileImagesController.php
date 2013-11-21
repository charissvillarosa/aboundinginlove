<?php

/*
 * @author Chariss
 */

class ProfileImagesController extends AppController
{

    var $layout = 'document';

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('view');
    }
    
    public function view($id, $hashKey = null)
    {
        $this->autoRender = false;
        
        $this->loadModel('ProfileImage');
        $this->ProfileImage->id = $id;
        $photo = $this->ProfileImage->read();

        // let browser cache it for 1 year
        header('Cache-Control: public, max-age=31536000');

        if ($photo) {
            header('Content-type: ' . $photo['ProfileImage']['content_type']);
            echo $photo['ProfileImage']['image'];
        } else {
            header('Content-type: image/jpg');
            include 'app/webroot/img/sponsees/nophoto.jpg';
        }
        $this->ProfileImage->set('image', $photo);
    }
    
    function upload($id)
    {
        if (empty($this->data)) {
            $this->render();
        } 
        else {
            $tempName = $this->request->data['ProfileImage']['image']['tmp_name'];
            $content = null;
            $type = null;
            
            if (!empty($tempName) && is_uploaded_file($tempName)) {
                $size = $this->request->data['ProfileImage']['image']['size'];
                $maxSize = 1024 * 1024 * 2; // 2 MB
                if ($size > $maxSize) {
                    $this->Session->setFlash('Please upload an image not greater than 2MB.');
                    $this->redirect(array('action' => 'upload', $id));
                }

                // Strip path information
                $type = $this->request->data['ProfileImage']['image']['type'];
                $content = file_get_contents($tempName);
            }
            else {
                $this->Session->setFlash('Choose an image to upload.');
                $this->redirect(array('action' => 'upload', $id));
            }

            unlink($tempName);
            
            $this->ProfileImage->create();
            $this->ProfileImage->set('id', $id);
            $this->ProfileImage->set('content_type', $type);
            $this->ProfileImage->set('image', $content);

            $randomKey = Security::generateAuthKey();
            $hashKey = Security::hash($randomKey, 'sha1');
            $this->ProfileImage->set('hash_key', $hashKey);

            try{
                if ($this->ProfileImage->save()) {
                    $this->Session->setFlash('Profile Image successfully uploaded.');
                    $this->redirect(array('controller'=>'Profile', 'action'=>'index', $id));
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
