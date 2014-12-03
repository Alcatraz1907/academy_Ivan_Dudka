<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 01.12.2014
 * Time: 0:55
 */
class Application_Form_FilmAdd extends Zend_Form{

    public function init(){

        $this->setName('form_films_add');
/*
 * Select producers
 */
        $producer = new Application_Model_Producer();
        $objproducer = $producer->getAllProducerForForm();
        foreach ($objproducer as $p) {
            $arrproducer[$p->id] = $p->name.' '.$p->last_name;

        }

        $producers = new Zend_Form_Element_Multiselect('producers[]');
        $producers->setLabel('Producer');
        $producers->addMultiOptions($arrproducer);
 /*
  * Text name film
  */
        $name_film = new Zend_Form_Element_Text('name');
        $name_film->setLabel('Name')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $ganre = new Application_Model_Ganre();
        $obj_gante = $ganre->getAllGanres();
        foreach($obj_gante as $g){
            $arrganre[$g->id] = $g->ganre;
        }
        $ganres = new Zend_Form_Element_Multiselect('ganres[]');
        $ganres->setLabel('Ganre');
        $ganres->addMultiOptions($arrganre);

        $duration = new Zend_Form_Element_Text('duration');
        $duration->setLabel('Duration')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $year_of_publication = new Zend_Form_Element_Text('year_of_publication');
        $year_of_publication->setLabel('Year of Publication')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $budget = new Zend_Form_Element_Text('budget');
        $budget->setLabel('Budget')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $studio = new Application_Model_Studio();
        $objstudio = $studio->getAllStudioForForm();
        foreach ($objstudio as $s) {
            $arrstudios[$s->id] = $s->name;
        }

        $studios = new Zend_Form_Element_Multiselect('studios[]');
        $studios->setLabel('Producer');
        $studios->addMultiOptions($arrstudios);

        $delivery_date = new Zend_Form_Element_Text('delivery_date');
        $delivery_date->setLabel('Delivery Date')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_submit('submit');
        $submit->setLabel('Add');

        $this->addElements(array($producers,$name_film,$ganres,$duration,$year_of_publication,$budget,$studios,$submit));

    }
}