<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 27.11.2014
 * Time: 19:04
 */

class Application_Form_User extends Zend_Form{
    public function __construct()
    {
        // print "Hello"; die();
        $this->setName('form_user');
        parent::__construct();

        $username = new Zend_Form_Element_Text('username');

        $username->setLabel('Імя користувача')
                 ->setRequired(true)
                 ->addValidator('NotEmpty')
                 ->addFilter('StringTrim')
                ->addFilter('StripTags');


        $password = new Zend_Form_Element_Password('password');

        $password->setLabel('Пароль')
                ->setRequired(true)
                ->addValidator('NotEmpty');

        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
            ->addValidator('EmailAddress');

        $submit = new Zend_Form_Element_submit('submit');

        $submit->setLabel('Додати');
        $arr = array($username,$password,$email,$submit);

        $this->addElements($arr);
    }

}
?>