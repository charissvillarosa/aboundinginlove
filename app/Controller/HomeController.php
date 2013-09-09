<?php

/**
 * @author Chariss
 */
class HomeController extends AppController
{
    var $paginate = array(
        'SponseeListingItem' => array(
            'limit' => 3,
            'order' => array('SponseeListingItem.id' => 'desc')
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'afterPaypalNotification');
    }

    public function index()
    {
        $this->loadModel('SponseeListingItem');
        $this->set("sponseeList", $this->paginate('SponseeListingItem'));
    }

}
