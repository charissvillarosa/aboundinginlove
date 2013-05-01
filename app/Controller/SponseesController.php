<?php

/*
 * @author Chariss
 */
class SponseesController extends AppController 
{
    var $layout = 'document';
    
    public function index()
    {
        $list = $this->Sponsee->find('all');
        $this->set("sponseeList", $list);
    }
    
    public function view($id)
    {
        $sponsee = $this->Sponsee->read('null', $id);
        $this->set("sponsee", $sponsee['Sponsee']);
    }
}
