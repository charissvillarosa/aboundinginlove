<?php

class ProfileController extends AppController
{

    var $layout = 'document';

    public function index()
    {
        $this->loadModel('Country');
        $this->set('countryList', $this->Country->find('list', array(
            'fields' => array('name','description')
        )));
    }
    
}
