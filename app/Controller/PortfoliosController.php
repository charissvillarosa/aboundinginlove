<?php

/*
 * @author Chariss
 */

class PortfoliosController extends AppController
{
    var $layout = 'gallery';
    
    var $uses = array('User', 'Sponsee', 'Portfolio');
    
    var $paginate = array(
        'Sponsee' => array(
            'limit' => 4
        )
    );

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'gallery', 'listing');
    }

    public function listing($id)
    {
        $portfolio = $this->Portfolio->find('all', array(
            'conditions' => array('Portfolio.sponsee_id' => $id),
            'order' => array('Portfolio.category_id')
        ));

        $this->set("sponsee_id", $id);
        $this->set("listing", $portfolio);
        
        //category list
        $this->loadModel('PortfolioCategory');
        $this->set('portfoliolisting', $this->PortfolioCategory->find('list', array(
            'fields' => array('id','description')
        )));
    }
    
    public function index() {
        $this->loadModel('Sponsee');
        $sponsee = $this->Sponsee->find('all');
        if ($sponsee) {
            $this->set('sponseelist', $this->paginate('Sponsee'));
        }
        else {
            $this->render('/Errors/notFound');
        }
    }

    /**
     * Displays the portfolio content based on sponsee_id
     *
     * @param $sponsee_id
     * @param $portfolio_id (optional)
     */
    public function view($sponsee_id, $portfolio_id = null)
    {
        if ($portfolio_id) {
            $portfolio = $this->Portfolio->findByIdAndSponseeId($portfolio_id, $sponsee_id);
        }
        else {
            $portfolio = $this->Portfolio->findBySponseeId($sponsee_id);
        }

        if (empty($portfolio)) {
            $this->render('view-empty');
        }

        $portfolioList = $this->Portfolio->findAllBySponseeId($sponsee_id, 
                array('Portfolio.id', 'Portfolio.description', 'Category.id', 'Category.description'),
                array('Category.id'));

        // in cases that two or more portfolios fall in same cate gory
        // name them like 'Pre Operation - 1', 'Pre Operation - 2', and so on
        $counter = 1;
        for ($i = 0; $i < sizeof($portfolioList); ++$i) {
            if ($i > 0 && $portfolioList[$i]['Category']['id'] == $portfolioList[$i-1]['Category']['id']) {
                $desc = $portfolioList[$i-1]['Category']['description'];
                $portfolioList[$i-1]['Category']['description'] = $desc . ' - ' . $counter;
                $portfolioList[$i]['Category']['description'] = $desc . ' - ' . (++$counter);
            }
            else {
                $counter = 1;
            }
        }

        $this->set('portfolioList', $portfolioList);
        $this->set('portfolioModel', $portfolio);
    }

    public function gallery() {
        $this->layout = 'gallery_images';
    }

    public function add($id) {
        if ($this->request->is('post')) {
            $this->Portfolio->create();
            $this->Portfolio->set('sponsee_id', $id);
            if ($this->Portfolio->save($this->request->data)) {
                $this->Session->setFlash('New record has been saved.');
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to add a new record.');
            }
        }
        //category list
        $this->loadModel('PortfolioCategory');
        $this->set('portfoliolisting', $this->PortfolioCategory->find('list', array(
            'fields' => array('id','description')
        )));

        $this->set("sponsee_id", $id);
    }

    public function edit($id){
        if (!$id) {
            throw new NotFoundException(__('Invalid input'));
        }

        $this->Portfolio->id = $id;
        $portfolioname = $this->Portfolio->read();

        if ($this->request->is('get')) {
            if (!$portfolioname) {
                throw new NotFoundException(__('Invalid input'));
            }
            $this->request->data = $portfolioname;
        }
        else {
            if ($this->Portfolio->save($this->request->data)) {
                $this->redirect(array('action' => 'listing', $id));
            } else {
                $this->Session->setFlash('Unable to update the record.');
            }
        }

        $this->set("list", $portfolioname);
    }
    
    public function delete($id, $sponsee_id) {
        if ($this->Portfolio->delete($id)) {
            $this->Session->setFlash('Record has been successfully deleted.');
        }
        $this->redirect(array('action' => 'listing', $sponsee_id));
    }

    public function itemdelete($id, $sponsee_id) {
        $this->loadModel('PortfolioImage');
        if ($this->PortfolioImage->delete($id)){
            $this->Session->setFlash('Image has been deleted.');
        }
        $this->redirect(array('controller' => 'portfolios', 'action' => 'listing', $sponsee_id));
    }
}
