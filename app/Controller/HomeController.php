<?php

/**
 * @author Chariss
 */
class HomeController extends AppController
{

    public function index()
    {
        $this->loadModel('Sponsee');
        $list = $this->Sponsee->find('all');
        $this->set("sponseeList", $list);
    }

}
