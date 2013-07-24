<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PortfolioCategoriesController extends AppController {
    var $layout = 'document';
    
    function beforeFilter()
    {
        $this->Auth->allow();
    }

    public function index() {
        $this->loadModel('Sponsee');
        $sponsee = $this->Sponsee->find('all');
        if ($sponsee) {
            $this->set("sponseelist", $sponsee);
        }
        else {
            $this->render('/Errors/notFound');
        }
    }
    public function view($id) {
        $this->loadModel('Sponsee');
        $sponsee = $this->Sponsee->find('all');
        if ($sponsee) {
            $this->set("sponseelist", $sponsee);
        }
        else {
            $this->render('/Errors/notFound');
        }
	}
    public function gallery() {

    }

    public function listing() {
        $name = $this->PortfolioCategory->find('all');
        $this->set("list", $name);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->PortfolioCategory->create();
            if ($this->PortfolioCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The Portfolio name has been saved'));
                $this->redirect(array('action' => 'listing'));
            }
            else {
                $this->Session->setFlash(__('The Portfolio name could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->PortfolioCategory->id = $id;
        $portfolioname = $this->PortfolioCategory->read();

        if ($this->request->is('get')) {
            if (!$portfolioname) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $portfolioname;
        }
        else {
            if ($this->PortfolioCategory->save($this->request->data)) {
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }

        $this->set("list", $portfolioname);
    }

    public function delete($id) {
        if ($this->PortfolioCategory->delete($id)) {
            $this->Session->setFlash('Portfolio name has been deleted.');
        }
        $this->redirect(array('action' => 'listing'));
    }
    
}
