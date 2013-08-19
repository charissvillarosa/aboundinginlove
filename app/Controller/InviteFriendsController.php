<?php

class InviteFriendsController extends AppController
{

    var $layout = 'document';

    public function index()
    {
        
    }
    
    public function save()
    {
        $this->Email->to = 'chariss.villarosa@gmail.com'; 
        $this->Email->subject = 'Cake test template email'; 
        $this->Email->replyTo = 'noreply@example.com'; 
        $this->Email->from = 'Cake Test Account <noreply@example.com>'; 
        $this->Email->template = 'test2'; 
        //Send as 'html', 'text' or 'both' (default is 'text') 
        $this->Email->sendAs = 'both'; 
        //Set view variables as normal 
        $this->set('someValue', 'Cake and cream is good for you'); 
        //Do not pass any args to send() 
        if ( $this->Email->send() ) { 
            $this->Session->setFlash('Template html email sent'); 
        } else { 
            $this->Session->setFlash('Template html email not sent'); 
        } 
//        $this->redirect('/'); 
    }
}
