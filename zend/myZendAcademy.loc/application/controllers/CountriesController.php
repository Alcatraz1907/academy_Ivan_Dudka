<?php
    class CountriesController extends Zend_Controller_Action{

        public function addAction(){
            $this->view->title = 'Add country';
            $this->view->headTitle($this->view->title, 'PREPEND');

            $form = new Application_Form_Country();
            $this->view->form = $form;
              if($this->getRequest()->isPost()){
                  if($form->isValid($this->getRequest()->getPost())){

                      $country = new Application_Model_Country();
                      $country->fill($form->getValues());
                      $country->save();
                  }
              }


        }
        public function indexAction(){
            $this->view->title = 'Country';
            $this->view->headTitle($this->view->title, 'PREPEND');

            $country = new Application_Model_Country();
            $this->view->countries = $country->getAllCountry();
        }
        public function editAction(){
            $this->view->title = 'Edit Country';
            $this->view->headTitle($this->view->title, 'PREPEND');

            $id = $this->_request->getParam('id');
            $country = new Application_Model_Country($id);
            $form = new Application_Form_Country();
            if($this->getRequest()->isPost())
            {
                if($form->isValid($this->getRequest()->getPost())){
                    $country->fill($form->getValues());
                    $country->save();
                    $this->_helper->redirector('index');
                }

            }else{
                $form->populate($country->populateForm());
            }

            $this->view->form = $form;

          //  $this->_helper->redirector('index');
        }
        public function deleteAction(){
            $this->view->title = 'Delete Country';
            $this->view->headTitle($this->view->title, 'PREPEND');

            $id = $this->_request->getParam('id');
            $country = new Application_Model_Country($id);

            $country->delete();
            $this->_helper->redirector('index');

        }
    }
?>