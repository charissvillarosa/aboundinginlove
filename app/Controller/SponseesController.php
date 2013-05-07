<?php

/*
 * @author Chariss
 */
class SponseesController extends AppController 
{
    var $adminActions = array('add', 'edit');    
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
    
    public function index()
    {
        $this->set("sponseeList", $this->paginate());

        $user = $this->Session->read('Auth.User');
        if ($user && $user['role'] == 'admin') {
            $this->render('admin-index');
        }
        else {
            $this->render('index');
        }
    }
    
    public function view($id)
    {
        $sponsee = $this->Sponsee->read(null, $id);
        if ($sponsee) {
            $this->set("sponsee", $sponsee['Sponsee']);
        }
        else {
            $this->render('/Errors/notFound');
        }
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
    
    public function edit($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->Sponsee->id = $id;
        if ($this->request->is('get')) {
            $sponsee = $this->Sponsee->read();
            if (!$sponsee) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $sponsee;
        }
        else {
            if ($this->Sponsee->save($this->request->data)) {
                $this->Session->setFlash('Sponsee record has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }

    }
    
    public function delete($id) {
        if ($this->Sponsee->delete($id)) {
            $this->Session->setFlash('Sponsee with id: ' . $id . ' has been deleted.');
        }
        $this->redirect(array('action' => 'index'));
    }

}
