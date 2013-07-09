<?php

/*
 * @author Chariss
 */

class PortfoliosController extends AppController
{

    var $layout = 'document';
    
    public function beforeFilter()
    {
        $this->Auth->allow('index', 'view', 'gallery');
    }

    public function listing($id)
    {
        $portfolio = $this->Portfolio->find('all', array(
            'conditions' => array('Portfolio.sponsee_id' => $id),
            'order' => array('Portfolio.category_id')
        ));

        $this->set("listing", $portfolio);
    }
    
    public function index() {
        $this->loadModel('Sponsee');
        $sponsee = $this->Sponsee->find('all');
        if ($sponsee) {
            $this->set("sponseelist", $sponsee);
        }
        else {
            $this->render('/Errors/notFound');
        }
    }
    
    public function view($id) {
        $portfolio = $this->Portfolio->find('all', array(
            'conditions' => array('Portfolio.sponsee_id' => $id),
            'order' => array('Portfolio.category_id')
        ));
        
        $this->set("listing", $portfolio);
    }
    
    public function gallery() {

    }

    public function add($id) {
        if ($this->request->is('post')) {
            $this->Portfolio->create();
            if ($this->Portfolio->save($this->request->data)) {
                $this->Session->setFlash('New record has been saved.');
                $this->redirect(array('action' => 'listing'));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }

    }
}
