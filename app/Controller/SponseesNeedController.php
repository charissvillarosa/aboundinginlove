<?php

/*
 * @author Chariss
 */
class SponseesNeedController extends AppController 
{
    var $adminActions = array('add', 'edit');    
    var $layout = 'document';

    var $paginate = array(
        'limit' => 5
    );

    public function beforeFilter()
    {
        $this->Auth->allow('view', 'index');
    }

    public function isAuthorized($user)
    {
        // allow only admin role to access the adimin actions
        if ($user['role'] != 'admin' && in_array($this->action, $this->adminActions))
        {
            return false;
        }

        return true;
    }
    
    public function viewlisting($id) {
        $this->set("sponseesneed", $this->paginate());
         
        $sponseeneeds = $this->SponseesNeed->read(null, $id);
        if ($sponseeneeds) {
            $this->set("$sponseesneed", $sponseeneed['description']);
        }
        else {
            $this->render('/Errors/notFound');
        }
	}

}
