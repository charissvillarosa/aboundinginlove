<?php

class DashboardController extends AppController
{

    var $layout = 'document';
    
    public function index()
    {
        $user = $this->Session->read('Auth.User');
        if ($user && $user['role'] == 'admin') {
            $this->render('admin-index');
        }
        else {
            $this->render('index');
        }
    }

}
