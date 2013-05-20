<?php

class DonationsController extends AppController
{

    var $layout = 'document';

    var $paginate = array(
        'SponseeListingItem' => array(
            'limit' => 3,
            'order' => array('SponseeListingItem.id' => 'desc')
        )
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index'); // Letting users register themselves
    }

    public function index($id)
    {
        $this->loadModel('SponseeListingItem');
        $sponsee = $this->SponseeListingItem->find('all', array(
            'conditions' => array('SponseeListingItem.id' => $id)
        ));
        $this->set("sponseeList", $sponsee);
        
        //to get sponsee needs
        $this->loadModel('SponseeNeed');
        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));
        
        $this->set("sponseeneeds", $sponseeneeds);
 
        if ($sponseeneeds == '') {
            $this->render('/Errors/notFound');
        }
        
    }
}
