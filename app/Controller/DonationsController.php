<?php

class DonationsController extends AppController
{

    var $layout = 'donation';
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
    
    public function donor($donor_id){
        $this->layout = null;

        $this->loadModel('User');
        $user = $this->User->read(null, $donor_id);
        if ($user) {
            $this->set("donor", $user['User']);
        }
        else {
            $this->render('/Errors/notFound');
        }
    }

    public function donation()
    {
        $this->User->id = $this->getCurrentUserId();
        $user = $this->User->read();
        $this->set('user', $user['User']);
    }

    public function cancel($id)
    {
        // clean previous pending (cascaded delete)
        $this->SponseeDonation->deleteAll(array(
            'SponseeDonation.sponsee_id' => $id,
            'SponseeDonation.status' => 'pending'
        ), true);

        $this->redirect(array('action'=>'view', $id));
    }

    public function mydonation($id)
    {
        //userid
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $userid = $sessUser['id'];

        $this->loadModel('User');
        $userid = $sessUser['id'];
        $fromdate = date("Y/m/d h:i:s");//get current date

        if ($this->request->isPost()) {
            
            // clean previous pending (cascaded delete)
            $this->SponseeDonation->deleteAll(array(
                    'SponseeDonation.sponsee_id' => $id,
                    'SponseeDonation.status' => 'pending'
            ), true);

            $data = $this->request->data;

            // remove non-selected items
            $selectedItems = array();
            foreach ($data['Items'] as $item) {
                if (isset($item['sponsee_need_id'])) {
                    array_push($selectedItems, $item);
                }
            }

            if(sizeof($selectedItems) === 0){
                $this->Session->setFlash('Please select the amount and no. of months for the donation.');
                $this->redirect(array('action'=>'view', $id));
            }

            foreach ($selectedItems as &$item) {

                if($item['no_of_months'] === ''){
                     $this->Session->setFlash('Please select the amount and no. of months for the donation.');
                     $this->redirect(array('action'=>'view', $id));
                }
                
                //calculate the to value of donation take place
                $month = "+".$item['no_of_months']." month";
                $todate = strtotime(date("Y/m/d", strtotime($fromdate)) . $month);

                $item['date_from'] = $fromdate;
                $item['date_to'] = date("Y/m/d h:i:s",$todate);
            }

            $data['Items'] = $selectedItems;
            $data['SponseeDonation']['sponsee_id'] = $id;
            $data['SponseeDonation']['user_id'] = $userid;
            $data['SponseeDonation']['status'] = 'pending';

            $this->SponseeDonation->saveAssociated($data);
            $this->redirect(array('action'=>'mydonation', $id));
        }
        else {
            // set recursive to 3 to also load the 3rd level associations
            // (i.e SponseeDonation->Item->SponseeNeed->Category)
            $this->SponseeDonation->recursive = 3;

            $donation = $this->SponseeDonation->find('first', array(
                'conditions' => array(
                    'SponseeDonation.user_id' => $userid,
                    'SponseeDonation.sponsee_id' => $id,
                    'SponseeDonation.status' => 'pending'
                 )
            ));

            $this->set('donation', $donation);
        }
    }
    
//    public function donationmethod($id)
//    {
//        //userid
//        $sessUser = $this->Session->read('Auth.User');
//        $this->loadModel('User');
//        $userid = $sessUser['id'];
//
//        if (!$this->request->isGet()) {
//            // validate
//            $methodType = $this->request->data['SponseeDonation']['donation_method'];
//            if ('monthly' == $methodType) {
//                $from = $this->request->data['SponseeDonation']['from'];
//                $to = $this->request->data['SponseeDonation']['from'];
//
//                if (!$from['day'] && !$from['month'] && !$from['year']
//                        && !$to['day'] && !$to['month'] && !$to['year'])
//                {
//                    $this->Session->setFlash('Date from and date to is required.');
//                    $this->redirect(array('action' => 'donationmethod', $id));
//                }
//            }
//
//            // find the pending and update
//            $donation = $this->SponseeDonation->find('first', array(
//                'conditions' => array(
//                    'SponseeDonation.user_id' => $userid,
//                    'SponseeDonation.sponsee_id' => $id,
//                    'SponseeDonation.status' => 'pending'
//                 )
//            ));
//
//            $this->SponseeDonation->set($donation);
//            $this->SponseeDonation->set($this->request->data);
//
//            $this->SponseeDonation->save();
//            $this->redirect(array('action' => 'confirmdonation', $id));
//        }
//        else {
//            // set recursive to 3 to also load the 3rd level associations
//            // (i.e SponseeDonation->Item->SponseeNeed->Category)
//            $this->SponseeDonation->recursive = 3;
//
//            $donation = $this->SponseeDonation->find('first', array(
//                'conditions' => array(
//                    'SponseeDonation.user_id' => $userid,
//                    'SponseeDonation.sponsee_id' => $id,
//                    'SponseeDonation.status' => 'pending'
//                 )
//            ));
//
//            $this->request->data = $donation;
//            $this->set('donation', $donation);
//        }
//    }
//
    public function confirmdonation($id)
    {
        //userid
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $userid = $sessUser['id'];

        if ($this->request->isPost()) {
            $data = $this->request->data;

            if(empty($data)){
                 $this->Session->setFlash('Please select the amount to donate.');
                 $this->redirect(array('action'=>'donationmethod', $id));
            }
            else{
                    $data['SponseeDonation'] = array(
                    'SponseeDonation.user_id' => $userid,
                    'sponsee_id' => $id,
                    'status' => 'complete'
                );

                $this->SponseeDonation->saveAssociated($data);
                $this->redirect(array('action'=>'mydonation', $id));
            }
        }
        else {
            // set recursive to 3 to also load the 3rd level associations
            // (i.e SponseeDonation->Item->SponseeNeed->Category)
            $this->SponseeDonation->recursive = 3;

            $donation = $this->SponseeDonation->find('first', array(
                'conditions' => array(
                    'SponseeDonation.user_id' => $userid,
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

    public function pendingdonation()
    {
        $sessUser = $this->Session->read('Auth.User');
        $this->loadModel('User');
        $id = $sessUser['id'];

        // set recursive to 3 to also load the 3rd level associations
        // (i.e SponseeDonation->Item->SponseeNeed->Category)
        $this->SponseeDonation->recursive = 3;

        $donation = $this->SponseeDonation->find('all', array(
            'conditions' => array(
                'SponseeDonation.user_id' => $id,
                'SponseeDonation.status' => 'pending'
             ),
            'group' => 'SponseeDonation.sponsee_id'
        ));

        $this->request->data = $donation;
        $this->set('donation', $donation);

    }
}
