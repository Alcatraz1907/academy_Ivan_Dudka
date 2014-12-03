<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 01.12.2014
 * Time: 0:55
 */
class Application_Form_ProducerAdd extends Zend_Form{

    public function init(){

        $this->setName('form_producer_add');

        $name= new Zend_Form_Element_Text('name');
        $name->setLabel('Name')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $last_name = new Zend_Form_Element_Text('last_name');
        $last_name->setLabel('Last Name')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $year_of_birth= new Zend_Form_Element_Text('year_of_birth');
        $year_of_birth->setLabel('YearOfBirth')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $year_of_death = new Zend_Form_Element_Text('year_of_death');
        $year_of_death->setLabel('YearOfFDeath')
            ->setRequired(false)
            ->addValidator('NotEmpty');


        $nationalty = new Application_Model_Nationality();
        $objnationalty = $nationalty->getAllNationalities();
        foreach ($objnationalty  as $s) {
            $arrnationalities[$s->id] = $s->nationality;
        }

        $nationalities = new Zend_Form_Element_Select('nationality_id');
        $nationalities->setLabel('Producer');
        $nationalities->addMultiOptions($arrnationalities);


        $submit = new Zend_Form_Element_submit('submit');
        $submit->setLabel('Add');

        $this->addElements(array($name,$last_name,$year_of_birth,$year_of_death,$nationalities,$submit));

    }
}