<?php

/*
 * @author Chariss
 */

class SponseeImagesController extends AppController
{
    
    public function beforeFilter() {
        $this->Auth->allow('view');
    }
    
    public function view($id)
    {
        $this->autoRender = false;

        $photo = $this->SponseeImage->read(null, $id);
        if ($photo) {
            header('Cache-Control: public');
            header('Cache-Control: max-age=3600');
            header("content-type: $photo[SponseeImage][image]");
            echo $photo['SponseeImage']['image'];
        }
        else {
            header('content-type: image/jpg');
            include '../webroot/img/sponsees/nophoto.jpg';
        }
    }

}
