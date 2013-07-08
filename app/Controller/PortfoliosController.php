<?php

/*
 * @author Chariss
 */

class PortfoliosController extends AppController
{

    var $layout = 'document';

    public function beforeFilter()
    {
        $this->Auth->allow('listing');
    }

    public function listing($id)
    {
        $portfolio = $this->Portfolio->find('all', array(
            'conditions' => array('Portfolio.sponsee_id' => $id),
            'order' => array('Portfolio.category_id')
        ));
        
        $this->set("listing", $portfolio);
    }
}
