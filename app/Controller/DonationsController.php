<?php

class DonationsController extends AppController
{

    var $layout = 'document';

    var $paginate = array(
        'limit' => 5
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index'); // Letting users register themselves
    }

    public function index()
    {
        $this->set('users', $this->paginate());
    }
}
