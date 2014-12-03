<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.11.2014
 * Time: 21:44
 */

class Application_Form_FilmDelete extends Zend_Form{

    public function init(){

        $this->setName('form_films_delete');

        $film = new Application_Model_Film();
        $objfilms = $film->getAllFilms();
        foreach($objfilms as $f){
            $arrfilm[$f->id] = $f->name;
        }
        $film_id = new Zend_Form_Element_Select('name');
        $film_id->setLabel('Film');
        $film_id->addMultiOptions($arrfilm);

        $submit = new Zend_Form_Element_Submit('deleteFilm');
        $submit->setLabel('Delete films');

        $this->addElements(array($film_id,$submit));


    }
}