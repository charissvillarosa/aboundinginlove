<?php

/*
 * @author Chariss
 */

class PortfoliosController extends AppController
{
    var $layout = 'gallery';
    
    var $uses = array('User', 'Sponsee', 'Portfolio');
    
    var $paginate = array(
        'limit' => 4
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'gallery', 'listing');
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
            $this->set('sponseelist', $this->paginate('Sponsee'));
        }
        else {
            $this->render('/Errors/notFound');
        }
    }
    
    public function view($id) {

        $this->Portfolio->id = $id;
        $this->set("listing", $this->paginate('Portfolio', array(
            'Portfolio.sponsee_id' => $id
        )));
    }
    
    public function gallery() {
        $this->layout = 'gallery_images';
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

    public function edit($id){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->Portfolio->id = $id;
        $portfolioname = $this->Portfolio->read();

        if ($this->request->is('get')) {
            if (!$portfolioname) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $portfolioname;
        }
        else {
            if ($this->Portfolio->save($this->request->data)) {
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }

        $this->set("list", $portfolioname);
    }
    
    public function delete($id, $sponsee_id) {
        if ($this->Portfolio->delete($id)) {
            $this->Session->setFlash('Record has been successfully deleted.');
        }
        $this->redirect(array('action' => 'listing', $sponsee_id));
    }

    public function itemdelete($id, $sponsee_id) {
        $this->loadModel('PortfolioImage');
        if ($this->PortfolioImage->delete($id)){
            $this->Session->setFlash('Image has been deleted.');
        }
        $this->redirect(array('controller' => 'portfolios', 'action' => 'listing', $sponsee_id));
    }
}
