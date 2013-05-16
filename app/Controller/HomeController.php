<?php

/**
 * @author Chariss
 */
class HomeController extends AppController
{
    var $paginate = array(
        'Sponsee' => array(
            'limit' => 3,
            'order' => array('Sponsee.id' => 'desc')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('index');
    }

    public function index()
    {
        $this->loadModel('Sponsee');
        $this->set("sponseeList", $this->paginate('Sponsee'));
        $id=$this->Sponsee->find('list', array(
            'fields' => array('Sponsee.id')
        ));
        
        //to get sponsee needs
        $this->loadModel('SponseeNeeds');
        $sponseeneeds = $this->SponseeNeeds->find('all', array(
            'conditions' => array('SponseeNeeds.sponsee_id' => $id),
            'order' => array('SponseeNeeds.category_id')
        ));
        $this->set("sponseeneeds", $sponseeneeds);
        debug($sponseeneeds);
    }

}
