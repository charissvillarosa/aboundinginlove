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
        $sponsee = $this->Sponsee->read(null, $id);
        $this->set("sponsee", $sponsee['Sponsee']);
    }
    
    public function listing($id)
    {
        $list = $this->Sponsee->find('all');
        $this->set("sponseeList", $list);
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Sponsee->create();
            if ($this->Sponsee->save($this->request->data)) {
                $this->Session->setFlash('New sponsee record has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
    }
}
