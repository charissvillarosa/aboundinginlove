<?php

class SendUpdateEmailController extends AppController
{

    var $layout = 'document';
    var $adminActions = array('listing', 'index', 'sendemail');
    var $uses = array('User', 'DonationHistory','DonationRequest');
    
    var $paginate = array(
        'limit' => 10
    );
    
    public function index(){

    }
    
    public function listing()
    {
        $category = '';
        if (isset($this->request->query['cat'])) {
            $category = $this->request->query['cat'];
        }
        
        $this->set('category', $category);

        if ($category) {
            $this->set('donationitems', $this->paginate('DonationHistory', array(
                'DonationHistory.donation_type' => $category
            )));
        }
        else {
            $this->set('donationitems', $this->paginate('DonationHistory'));
        }
         
    }

    public function sendemail(){
       if (!$this->request->is('post')) {
            return;
        }

        $sessUser = $this->Session->read('Auth.User');
        $user = $this->User->findById($sessUser['id']);
        $user = $user['User'];

        $postData = $this->request->data['SendUpdateEmail'];
        $toArray = explode(',', $postData['to']);

        foreach ($toArray as $emailTo) {
            $emailTo = trim($emailTo);
            $tokenId = Security::hash(Security::generateAuthKey(), 'md5');

            try {
                //sending email
                $this->Email->to($emailTo);
                $this->Email->subject("Thank you from Abounding in Love");
                $this->Email->emailFormat('html');
                $this->Email->template('invite');
                $this->Email->viewVars(array(
                    'message' => $postData['message'],
                    'user' => $user,
                    'tokenId' => $tokenId
                ));
                $this->Email->send();

                //saving email content into invite table
                $this->InviteFriend->create();
                $this->InviteFriend->set('token_id', $tokenId);
                $this->InviteFriend->set('user_id', $user['id']);
                $this->InviteFriend->set('to', $emailTo);
                $this->InviteFriend->set('message', $postData['message']);
                $this->InviteFriend->set('type', 'email');
                $this->InviteFriend->set('status', 'pending');

                $this->InviteFriend->save();
            }
            catch(Exception $e) {
                $this->log($e->getMessage(), 'email');
            }
        }

        $this->Session->setFlash('Email has been sent successfully.');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Saves a invitation post data and returns a new tokenId.
     * This method is used for AJAX post requests.
     */
    public function saveInvite()
    {
        // for AJAX requests, set to false
        $this->autoRender = false;

        $sessUser = $this->Session->read('Auth.User');
        $postData = $this->request->data;

        $this->InviteFriend->create();
        $this->InviteFriend->set('token_id', $postData['tokenId']);
        $this->InviteFriend->set('user_id', $sessUser['id']);
        $this->InviteFriend->set('to', $postData['type']);
        $this->InviteFriend->set('message', 'shared to ' . $postData['type']);
        $this->InviteFriend->set('type', $postData['type']);
        $this->InviteFriend->set('status', 'pending');

        // just don't validate when saving
        if ($this->InviteFriend->save(null, false))
            echo 'success';
        else
            debug($this->InviteFriend->validationErrors);
    }

 }
