<?php

/*
 * @author Chariss
 */
class SponseeNeedCategoriesController extends AppController 
{
    var $adminActions = array('add', 'edit', 'view');    
    var $layout = 'document';

    var $paginate = array(
        'limit' => 5
    );

    public function beforeFilter()
    {
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
        $cat = $this->SponseeNeedCategory->find('all');  
        $this->set("categories", $cat);
	}
    
    public function add()
    {
        if ($this->request->is('post')) {
            $this->SponseeNeedCategory->create();
            if ($this->SponseeNeedCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The Category has been saved'));
                $this->redirect(array('action' => 'listing'));
            }
            else {
                $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
            }
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
            $this->Session->setFlash('Category with id: ' . $id . ' has been deleted.');
        }
        $this->redirect(array('action' => 'listing'));
    }
}
