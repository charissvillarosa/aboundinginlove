<?php

/*
 * @author Chariss
 */
class SponseesController extends AppController 
{
    var $adminActions = array('add', 'edit');    
    var $layout = 'document';

    var $paginate = array(
        'SponseeListingItem' => array(
            'limit' => 10,
            'order' => array('SponseeListingItem.id' => 'asc')
        )
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
    
    public function index()
    {
        $this->loadModel('SponseeListingItem');
        $this->set("sponseeList", $this->paginate('SponseeListingItem'));
        
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('id','description')
        )));

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
        //to get sponsee needs
        $this->loadModel('SponseeNeed');
        $this->SponseeNeed->id = $id;
        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));

        if ($sponseeneeds) {
            $oneTimeArr = array();
            $monthlyArr = array();

            foreach ($sponseeneeds as $need) {
                $dn = $need['SponseeNeed']['donation_method'];
                if ($dn == 'monthly') {
                    array_push($monthlyArr, $need);
                }
                else {
                    array_push($oneTimeArr, $need);
                }
            }

            $sponseeneeds = array();
            if (count($oneTimeArr) > 0) {
                $sponseeneeds['One Time'] = $oneTimeArr;
            }

            if (count($monthlyArr) > 0) {
                $sponseeneeds['Monthly'] = $monthlyArr;
            }

            $this->set("sponseeneeds", $sponseeneeds);
        }

        if ($sponseeneeds == '') {
            $this->render('/Errors/notFound');
        }

        
        //category and needs dropbox value
        $this->loadModel('SponseeNeedCategory');
        $categories = $this->SponseeNeedCategory->find('list', array('fields'=>array('id','description')));
        $this->set('categories', $categories);
        
        $sponsee = $this->Sponsee->read(null, $id);
        if ($sponsee) {
            $this->set("sponsee", $sponsee['Sponsee']);
            $this->set("sponseeImage", $sponsee['Image']);
        }
        else {
            $this->render('/Errors/notFound');
        }

    }
    public function adminview($id)
    {
        //to get sponsee needs
        $this->loadModel('SponseeNeed');
        $this->SponseeNeed->id = $id;
        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));
        $this->set("sponseeneeds", $sponseeneeds);
        
        //category and needs dropbox value
        $this->loadModel('SponseeNeedCategory');
        $categories = $this->SponseeNeedCategory->find('list', array('fields'=>array('id','description')));
        $this->set('categories', $categories);
        
        $sponsee = $this->Sponsee->read(null, $id);
        if ($sponsee) {
            $this->set("sponsee", $sponsee['Sponsee']);
            $this->set("sponseeImage", $sponsee['Image']);
        }
        else {
            $this->render('/Errors/notFound');
        }
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Sponsee->create();
            if ($this->Sponsee->save($this->request->data)) {
                $this->Session->setFlash('Sponsee record has been saved successfully.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }

        //country list
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('id','description')
        )));
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

        //country list
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('id', 'description')
        )));
    }
    
    public function delete($id) {
        if ($this->Sponsee->delete($id)) {
            $this->Session->setFlash('Sponsee record has been deleted.');
        }
        $this->redirect(array('action' => 'index'));
    }

}
