<?php

class DonationsController extends AppController
{

    var $layout = 'document';
    var $uses = array(
        'User',
        'DonationRequest',
        'SponseeListingItem',
        'SponseeNeed',
        'SponseeDonation',
        'SponseeDonationItem'
    );

    var $paginate = array(
        'SponseeListingItem' => array(
            'limit' => 3
        )
    );

    public function index(){
        
    }
    
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('listing'); // Letting users register themselves
    }

    public function view($id)
    {
        $sponsee = $this->SponseeListingItem->findById($id);
        $this->set("sponsee", $sponsee);
        
        //to get sponsee needs
        $sponseeneeds = $this->SponseeNeed->find('all', array(
            'conditions' => array('SponseeNeed.sponsee_id' => $id),
            'order' => array('SponseeNeed.category_id')
        ));
        
        $this->set("sponseeneeds", $sponseeneeds);
        $this->set("sponseeImage", $sponsee['Image']);
 
        if ($sponseeneeds == '') {
            $this->render('/Errors/notFound');
        }
        
    }
    
    public function listing()
    {
        
    }
    
    public function sponseedonation()
    {
        $this->set("sponseeList", $this->paginate('SponseeListingItem'));
    }
    
    public function donation()
    {
        $this->User->id = $this->getCurrentUserId();
        $user = $this->User->read();
        $this->set('user', $user['User']);
    }

    public function mydonation($id)
    {
        if ($this->request->isPost()) {
            // clean previous pending (cascaded delete)
            $this->SponseeDonation->deleteAll(array(
                'SponseeDonation.sponsee_id' => $id,
                'SponseeDonation.status' => 'pending'
            ), true);

            $data = $this->request->data;
            $data['SponseeDonation'] = array(
                'sponsee_id' => $id,
                'status' => 'pending'
            );

            $this->SponseeDonation->saveAssociated($data);
            $this->redirect(array('action'=>'mydonation', $id));
        }
        else {
            // set recursive to 3 to also load the 3rd level associations
            // (i.e SponseeDonation->Item->SponseeNeed->Category)
            $this->SponseeDonation->recursive = 3;
            
            $donation = $this->SponseeDonation->find('first', array(
                'conditions' => array(
                    'SponseeDonation.sponsee_id' => $id,
                    'SponseeDonation.status' => 'pending'
                 )
            ));

            $this->set('donation', $donation);
        }
    }

    /**
     * AJAX request handler for the action prior to
     * redirecting to the Paypal Website
     */
    public function saveRequest()
    {
        $this->autoRender = false;
        $this->DonationRequest->create();
        $this->DonationRequest->set('user_id', $this->getCurrentUserId());
        $this->DonationRequest->save($this->request->data);
        
        $this->response->body('{"id": ' .$this->DonationRequest->id. '}');
    }

    private function getCurrentUserId() {
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        return $sessUser['id'];
    }
}
