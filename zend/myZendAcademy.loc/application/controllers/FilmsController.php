<?php

class FilmsController extends Zend_Controller_Action{
    public function addAction(){
        $this->view->title = 'Add Films';
        $this->view->headTitle($this->view->title,'PREPEND');

        $form = new Application_Form_FilmAdd();
        $this->view->form = $form;

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){

                $film = new Application_Model_Film();
                $form_data = $form->getValues();
                $produsers_id = $form_data['producers'];
                $ganres_id = $form_data['ganres'];
                $studios_id = $form_data['studios'];

               for($i = 0;$i<count($form_data);$i++) {
                    $array_films_id = array('name' => $form_data['name'],
                                            'duration' =>$form_data['duration'],
                                            'year_of_publication' =>$form_data['year_of_publication'],
                                            'budget' =>$form_data['budget'],
                                            'delivery_date' =>$form_data['delivery_date']
                    );
                }

                    $film->fill($form_data);
                    $film_id = $film->save();
                for($i = 0;$i<count($produsers_id);$i++) {
                    $array_producers_id = array('film_id' => $film_id,
                                                'producer_id' => $produsers_id[$i]
                    );
                    $produsers_films = new Application_Model_ProducerFilm();
                    $produsers_films->fill($array_producers_id);

                    $produsers_films->save();
                }



                for($i = 0;$i<count($ganres_id);$i++) {
                    $array_ganres_id = array('film_id' => $film_id,
                                                'ganre_id' =>$ganres_id[$i]
                    );
                    $ganres_films = new Application_Model_GanreFilm();
                    $ganres_films->fill($array_ganres_id);
                    $ganres_films->save();
                }


                for($i = 0;$i<count($studios_id);$i++) {
                    $array_studios_id = array('film_id' => $film_id,
                        'studio_id' =>$studios_id[$i]
                    );
                    $studios_films = new Application_Model_StudioFilm();
                    $studios_films->fill($array_studios_id);
                    $studios_films->save();
                }

            }
        }

    }

    public function indexAction(){
        $this->view->title = 'Films';
        $this->view->headTitle($this->view->title,'PREPEND');

        $films = new Application_Model_Film();
        $this->view->films = $films->getAllFilms();
    }

    public  function searchAction(){
        $this->view->title = 'Search Films';
        $this->view->headTitle($this->view->title,'PREPEND');

        $form = new Application_Form_FilmSearch();
        $film = new Application_Model_Film();
        $this->view->form = $film->getAllFilms();

    }
    public function editAction(){
        $this->view->title = 'Edit Film';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $id = $this->_request->getParam('id');
        $film = new Application_Model_Film($id);
        $form = new Application_Form_FilmAdd();

        if($this->getRequest()->isPost()){
            if($form->isValid($this->getRequest()->getPost())){

                $film = new Application_Model_Film();
                $form_data = $form->getValues();
                $produsers_id = $form_data['producers'];
                $ganres_id = $form_data['ganres'];
                $studios_id = $form_data['studios'];

                for($i = 0;$i<count($form_data);$i++) {
                    $array_films_id = array('name' => $form_data['name'],
                        'duration' =>$form_data['duration'],
                        'year_of_publication' =>$form_data['year_of_publication'],
                        'budget' =>$form_data['budget'],
                        'delivery_date' =>$form_data['delivery_date']
                    );
                }

                $film->fill($form_data);
                $film_id = $film->save();
                for($i = 0;$i<count($produsers_id);$i++) {
                    $array_producers_id = array('film_id' => $film_id,
                        'producer_id' => $produsers_id[$i]
                    );
                    $produsers_films = new Application_Model_ProducerFilm();
                    $produsers_films->fill($array_producers_id);

                    $produsers_films->save();
                }



                for($i = 0;$i<count($ganres_id);$i++) {
                    $array_ganres_id = array('film_id' => $film_id,
                        'ganre_id' =>$ganres_id[$i]
                    );
                    $ganres_films = new Application_Model_GanreFilm();
                    $ganres_films->fill($array_ganres_id);
                    $ganres_films->save();
                }


                for($i = 0;$i<count($studios_id);$i++) {
                    $array_studios_id = array('film_id' => $film_id,
                        'studio_id' =>$studios_id[$i]
                    );
                    $studios_films = new Application_Model_StudioFilm();
                    $studios_films->fill($array_studios_id);
                    $studios_films->save();
                }
                $this->_helper->redirector('index');
            }
        }else{
            $form->populate($film->populateForm());
        }

        $this->view->form = $form;

    }

    public function deleteAction(){
        $this->view->title = 'Delete Films';
        $this->view->headTitle($this->view->title, 'PREPEND');

        $id = $this->_request->getParam('id');
        $film = new Application_Model_Film($id);
        $film->delete();
        $this->_helper->redirector('index');

    }
}
?>