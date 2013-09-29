<?php

/*
 * @author Chariss
 */
class SponseeNeedCategoriesController extends AppController 
{
    var $adminActions = array(); // Letting users access the following pages
    var $layout = 'document';

    var $uses = array('SponseeNeedCategory', 'User');
    
    var $paginate = array(
        'limit' => 10
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('view', 'index');
    }

    public function isAuthorized($user)
    {
        // allow only admin role to access the adimin actions
        if ($user['role'] != 'admin' && in_array($this->action, $this->adminActions))
        {
            return false;
        }

        return true;
    }
    
    public function listing() 
    {
        $this->set("categories", $this->paginate('SponseeNeedCategory'));
    }
    
    public function add()
    {
        if ($this->request->is('post')) {
            $this->SponseeNeedCategory->create();
            if ($this->SponseeNeedCategory->save($this->request->data)) {
                $this->Session->setFlash(__('Sponsee need has been successfully saved.'));
            }
            else {
                $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
            }
            $this->redirect(array('action' => 'listing'));
        }
    }
    
    public function edit($id){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->SponseeNeedCategory->id = $id;
        $sponseeneedcategory = $this->SponseeNeedCategory->read();
        
        if ($this->request->is('get')) {
            if (!$sponseeneedcategory) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $sponseeneedcategory;
        }
        else {
            if ($this->SponseeNeedCategory->save($this->request->data)) {
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }
        
        $this->set("categories", $sponseeneedcategory);
    }
    
    public function delete($id) {
        if ($this->SponseeNeedCategory->delete($id)) {
            $this->Session->setFlash('Sponsee need has been deleted.');
        }
        $this->redirect(array('action' => 'listing'));
    }
}
