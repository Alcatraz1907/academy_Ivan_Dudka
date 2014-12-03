<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.12.2014
 * Time: 21:45
 */
class Application_Form_FilmSearch extends Zend_Form{

    public function init(){

        $this->setName('form_country');

        $this->addElements(array(
            new Zend_Form_Element_Text('name', array(
                'label'    => 'Country',
                'required'   => true,
                'validators'  => array(
                    array('StringLength',   false, array(4, 16)),
                    array('Alnum'),
                )
            )),
            new Zend_Form_Element_Submit('submit',array(
                'label' => 'Search'

            ))
        ));
    }
}