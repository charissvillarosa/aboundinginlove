<?php

class UsersController extends AppController
{

    var $layout = 'document';

    var $paginate = array(
        'limit' => 10
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('login', 'register'); // Letting users register themselves
    }

    public function index()
    {
        $this->set('users', $this->paginate());
        
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('name','description')
        )));
    }

    public function view($id)
    {
        $user = $this->User->read(null, $id);
        if ($user) {
            $this->set("user", $user['User']);
        }
        else {
            $this->render('/Errors/notFound');
        }
        
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('name','description')
        )));
    }

    public function register()
    {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'login'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }
    
    public function add()
    {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User record has been saved'));
                $this->redirect(array('action' => 'index'));
            }
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        else {
            $this->loadModel('Country');
            $this->set('countryList', $this->Country->find('list', array(
                'fields' => array('name','description')
            )));
        }
        
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('name','description')
        )));
    }

    public function edit($id = null){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->User->id = $id;
        if ($this->request->is('get')) {
            $user = $this->User->read();
            if (!$user) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $user;
            //country list
            $this->loadModel('Country');
            $this->set('countryList', $this->Country->find('list', array(
                'fields' => array('name','description')
            )));
        }
        else {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('User record has been updated.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }
        
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('name','description')
        )));

    }
    
    public function delete($id) {
        if ($this->User->delete($id)) {
            $this->Session->setFlash('User record has been deleted.');
        }
        $this->redirect(array('action' => 'index'));
    }

    public function login()
    {
        $this->layout = 'login';

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            }
            else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

}
