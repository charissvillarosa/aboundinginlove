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
        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));
        //to get fullname of the sponsee
        $this->loadModel('Sponsee');
        $this->Sponsee->id = $id;    
        $sponsee = $this->Sponsee->read();
        $this->set("sponseelist", $sponsee);
        
        if ($sponseeneeds) {
            $this->set("sponseeneeds", $sponseeneeds);
        }
        else {
            $this->render('/Errors/notFound');
        }
	}
    
    public function add() {
        if ($this->request->is('post')) {
            $this->SponseeNeed->create();
            if ($this->SponseeNeed->save($this->request->data)) {
                $this->Session->setFlash('New record has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
    }

}
