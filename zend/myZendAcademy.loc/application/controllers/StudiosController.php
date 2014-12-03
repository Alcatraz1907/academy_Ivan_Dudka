<?php


class StudiosController extends Zend_Controller_Action{
    public function addAction(){
        $this->view->title = 'Add Studio';
        $this->view->headTitle($this->view->title,'PREPEND');

        $form = new Application_Form_StudioAdd();
        $this->view->form = $form;
        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){

                $studio = new Application_Model_Studio();
                $studio->fill($form->getValues());
                $studio->save();
            }
        }

    }

    public function indexAction(){
        $this->view->title = 'Studios';
        $this->view->headTitle($this->view->title,'PREPEND');

        $studios = new Application_Model_Studio();
        $this->view->studios  = $studios->getAllStudios();

    }
    public function deleteAction(){
        $this->view->title = 'Delete Studio';
        $this->view->headTitle($this->view->title,'PREPEND');
    }
    public  function searchAction(){
        $this->view->title = 'Search Studio';
        $this->view->headTitle($this->view->title,'PREPEND');
    }
    public  function editAction(){
        $this->view->title = 'Search Studio';
        $this->view->headTitle($this->view->title,'PREPEND');
    }
}