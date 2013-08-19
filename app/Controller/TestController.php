<?php

App::uses('HttpSocket', 'Network/Http');

class TestController extends AppController
{
    var $Http = null;
        
    function beforeFilter()
    {
        $this->Auth->allow('index');
    }

    function index()
    {
        $this->autoRender = false;
        $server = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
        $this->Http =& new HttpSocket();
        $response = $this->Http->post($server, '');
        debug($response);
    }

}
