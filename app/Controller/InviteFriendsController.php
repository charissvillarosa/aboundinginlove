<?php

App::uses('CakeEmail', 'Network/Email');

class InviteFriendsController extends AppController
{
    var $layout = 'document';
    
    var $Email = null;
    
    public function __construct($request = null, $response = null)
    {
        parent::__construct($request, $response);
        
        $this->Email = new CakeEmail();
        $this->Email->config(array(
            'host' => 'smtp.avare-llc.com',
            'port' =>'587',
            'username' => 'aboundinginlove@avare-llc.com',
            'password' =>'Avare123',
            'transport' => 'Smtp'
        ));
        $this->Email->from(array('aboundinginlove@avare-llc.com'=>'AboundingInLove.org'));
    }

    public function index()
    {
        
    }
    
    public function sendMail()
    {
        $user = $this->Session->read('Auth.User');
        $postData = $this->request->data['InviteFriend'];
        
        //sending email
        $this->Email->to($postData['to']);
        $this->Email->subject("$user[firstname] invites you to join AboundingInLove.org");
//        $this->Email->template($this->request->data['InviteFriend']['to']);
        $this->Email->send($postData['message']);
        
        //saving email content into invite table
        if ($this->request->is('post')) {
            $this->InviteFriend->create();
            $this->InviteFriend->set('user_id', $user['id']);
            $this->InviteFriend->set('to', $postData['to']);
            $this->InviteFriend->set('message', "Invited $postData[to]");
            $this->InviteFriend->set('type', 'email');
            $this->InviteFriend->set('status', 'pending');
            
            if ($this->InviteFriend->save()) {
                $this->Session->setFlash('Sponsee record has been saved successfully.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
        
        $this->redirect(array('action' => 'index'));
    }
}
