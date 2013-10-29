<?php

App::uses('HttpSocket', 'Network/Http');

class TestController extends AppController
{
    var $autoRender = false;
    var $Http = null;
    var $uses = array('DonationRequest');
        
    function beforeFilter()
    {
        $this->Auth->allow('index', 'test1');
    }

    function index()
    {
        $server = 'https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_notify-validate';
        $this->Http =& new HttpSocket();
        $response = $this->Http->post($server, '');
        debug($response);
    }
    
    function test1()
    {
        $result = $this->DonationRequest->findById('9');
        debug($result);
    }

}
