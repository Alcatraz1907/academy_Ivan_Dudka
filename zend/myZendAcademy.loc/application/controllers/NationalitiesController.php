<?php

class NationalitiesController extends Zend_Controller_Action{

    public function indexAction(){
        $this->view->title = 'Nationalities';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $nationalities = new Application_Model_Nationality();
        $this->view->nationalities = $nationalities->getAllNationalities();
    }

    public function addAction(){
        $this->view->title = 'Add nationality';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $form = new Application_Form_Nationality();

        $this->view->form = $form;

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){
                $nationality = new Application_Model_Nationality();
                $nationality->fill($form->getValues());
              $nationality->save();
            }
        }

    }
    public  function editAction(){
        $this->view->title = 'Edit nationality';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $id = $this->_request->getParam('id');
        $nationality = new Application_Model_Nationality($id);
        $form = new Application_Form_Nationality();
        if($this->getRequest()->isPost())
        {
            if($form->isValid($this->getRequest()->getPost())){
                $nationality->fill($form->getValues());
                $nationality->save();
                $this->_helper->redirector('index');
            }

        }else{
            $form->populate($nationality->populateForm());
        }

        $this->view->form = $form;
    }

    public function deleteAction(){
        $this->view->title = 'Delete Country';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $id = $this->_request->getParam('id');
        $nationality = new Application_Model_Nationality($id);

        $nationality->delete();
        $this->_helper->redirector('index');

    }
}