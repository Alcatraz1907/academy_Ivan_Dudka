<?php

class ProducersController extends Zend_Controller_Action{
    public function addAction(){
        $this->view->title = 'Add Producer';
        $this->view->headTitle($this->view->title,'PREPEND');

        $form = new Application_Form_ProducerAdd();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){

                $producer = new Application_Model_Producer();
                $producer->fill($form->getValues());
                $producer->save();
            }
        }

    }

    public function indexAction(){
        $this->view->title = 'Producers';
        $this->view->headTitle($this->view->title,'PREPEND');

        $producers = new Application_Model_Producer();
        $this->view->producers = $producers->getAllProducers();

    }
    public function deleteAction(){
        $this->view->title = 'Delete Producer';
        $this->view->headTitle($this->view->title,'PREPEND');
    }
    public  function searchAction(){
        $this->view->title = 'Search Producer';
        $this->view->headTitle($this->view->title,'PREPEND');
    }
    public  function editAction(){
        $this->view->title = 'Search Producer';
        $this->view->headTitle($this->view->title,'PREPEND');

    }
}