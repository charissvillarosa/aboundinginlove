<?php

class ProfileController extends AppController {

    var $layout = 'document';

    public function index() {
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
                    'fields' => array('id', 'description')
        )));

        $this->loadModel('User');
        $this->User->id = $this->getCurrentUserId();
        $user = $this->User->read();
        $this->set('user', $user['User']);
        $this->set('userImage', $user['Image']);
    }

    public function edit() {
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
                    'fields' => array('id', 'description')
        )));

        $this->loadModel('User');
        
        $user_id = $this->getCurrentUserId();
        $this->User->id = $user_id;

        $user = $this->User->findById($user_id);
        $this->set('user', $user['User']);
        
        if ($this->request->is('get')) {
            $this->request->data = $user;
        } else {
            $isValid = true;
            if ($this->request->data['action'] == 'password') {
                $user = $this->request->data['User'];
                if ($user['confirmPassword'] != $user['newPassword']) {
                    $this->Session->setFlash('Password and Confirm Password did not matched.');
                    $isValid = false;
                }
            }
            
            // save if no validation error
            if ($isValid) {
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('User record has been updated.');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Unable to update the record.');
                }
            }
        }
    }

    private function getCurrentUserId() {
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        return $sessUser['id'];
    }

}