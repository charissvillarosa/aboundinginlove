<?php

class DashboardController extends AppController
{

    var $layout = 'document';
    
    public function index()
    {
        $user = $this->Session->read('Auth.User');
        if ($user && $user['role'] == 'admin') {
            $this->redirect(array('controller'=>'InviteFriends', 'action' => 'listing'));
        }
        else {
            $this->redirect(array('controller'=>'Profile', 'action' => 'index'));
        }
    }

}
