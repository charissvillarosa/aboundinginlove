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
    }

}
