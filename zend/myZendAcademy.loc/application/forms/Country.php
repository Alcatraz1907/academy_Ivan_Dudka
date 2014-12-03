<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.11.2014
 * Time: 21:44
 */

class Application_Form_Country extends Zend_Form{

    public function init(){

        $this->setName('form_country');

        $this->addElements(array(
            new Zend_Form_Element_Text('country', array(
                'label'    => 'Country',
                'required'   => true,
                'validators'  => array(
                   array('Alnum'),
                )
            )),
            new Zend_Form_Element_Submit('submit',array(
                'label' => 'Add'

            ))
        ));
    }
}