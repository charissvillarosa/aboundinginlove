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

        $this->set("sponsee_id", $id);
        $this->set("listing", $portfolio);
        
        //category list
        $this->loadModel('PortfolioCategory');
        $this->set('portfoliolisting', $this->PortfolioCategory->find('list', array(
            'fields' => array('id','description')
        )));
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
            $this->Portfolio->set('sponsee_id', $id);
            if ($this->Portfolio->save($this->request->data)) {
                $this->Session->setFlash('New record has been saved.');
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
        //category list
        $this->loadModel('PortfolioCategory');
        $this->set('portfoliolisting', $this->PortfolioCategory->find('list', array(
            'fields' => array('id','description')
        )));

        $this->set("sponsee_id", $id);
    }
    
    public function delete($id, $sponsee_id) {
        if ($this->Portfolio->delete($id)) {
            $this->Session->setFlash('Record has been deleted.');
        }
        $this->redirect(array('action' => 'listing', $sponsee_id));
    }
}
