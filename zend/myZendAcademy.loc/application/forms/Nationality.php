<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 30.11.2014
 * Time: 23:36
 */
class Application_Form_Nationality extends Zend_Form{

    public function init(){

        $this->setName('form_nationality');


        $this->addElements(array(
            new Zend_Form_Element_Text('nationality', array(
                'label'    => 'Nationality',
                'required'   => true,
                'validators'  => array(
                    array('StringLength',   false, array(4, 16)),
                    array('Alnum'),
                )
            )),
            new Zend_Form_Element_Submit('submit',array(
                'label' => 'Add'

            ))
        ));
    }
}