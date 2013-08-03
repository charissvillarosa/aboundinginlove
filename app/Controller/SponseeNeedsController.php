<?php

/*
 * @author Chariss
 */
class SponseeNeedsController extends AppController 
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
    
    public function viewlisting($id) 
    {
        //to get fullname of the sponsee
        $this->loadModel('Sponsee');
        $this->Sponsee->id = $id;
        $sponsee = $this->Sponsee->read();
        $this->set("sponsee", $sponsee);
        
        //category and needs dropbox value
        $this->loadModel('SponseeNeedCategory');
        $categories = $this->SponseeNeedCategory->find('list', array('fields'=>array('id','description')));
        $this->set('categories', $categories);

        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));
        if ($sponseeneeds) {
            $this->set("sponseeneeds", $sponseeneeds);
        }
        
    }
    
    public function add($id)
    {
        //to get fullname of the sponsee
        $this->loadModel('Sponsee');
        $this->Sponsee->id = $id;
        $sponsee = $this->Sponsee->read();
        $this->set("sponsee", $sponsee);
        
        //category and needs dropbox value
        $this->loadModel('SponseeNeedCategory');
        $categories = $this->SponseeNeedCategory->find('list', array('fields'=>array('id','description')));
        $this->set('categories', $categories);
        
        if ($this->request->is('post')) {
            $this->SponseeNeed->create();
            $this->SponseeNeed->set($this->request->data);
            $this->SponseeNeed->set('sponsee_id', $id);
            $this->SponseeNeed->set('added_by', $this->Session->read('Auth.User.id'));
            //$this->SponseeNeed->set('added', DboSource::expression('now()'));
            
            if ($this->SponseeNeed->save()) {
                $this->redirect(array('action' => 'viewlisting', $id));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
    }
    
    public function edit($id, $sponsee_id){
        //category and needs dropbox value
        $this->loadModel('SponseeNeedCategory');
        $categories = $this->SponseeNeedCategory->find('list', array('fields'=>array('id','description')));
        $this->set('categories', $categories);
        
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->SponseeNeed->id = $id;
        $sponseeneed = $this->SponseeNeed->read();
        
        if ($this->request->is('get')) {
            if (!$sponseeneed) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $sponseeneed;
        }
        else {
            if ($this->SponseeNeed->save($this->request->data)) {
                $this->redirect(array('action' => 'viewlisting', $sponsee_id));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }
    }
    
    public function delete($id, $sponsee_id) {
        if ($this->SponseeNeed->delete($id)) {
            $this->Session->setFlash('Record has been deleted.');
        }
        $this->redirect(array('action' => 'viewlisting', $sponsee_id));
    }

}
