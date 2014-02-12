<?php

/**
 * @author Chariss
 */
class AboutUsController extends AppController
{

    var $layout = 'document';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'afterPaypalNotification');
    }

    public function index()
    {
        
    }

}
