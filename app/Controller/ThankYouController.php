<?php

class ThankYouController extends AppController {

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function index() {
        $this->loadModel('SponseeListingItem');
        $this->set("sponseeList", $this->paginate('SponseeListingItem'));
    }
}