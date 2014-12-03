<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 02.12.2014
 * Time: 18:55
 */
class Application_Form_StudioAdd extends Zend_Form
{

    public function init()
    {

        $this->setName('form_producer_add');

        $name = new Zend_Form_Element_Text('name_studio');
        $name->setLabel('Name')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');

        $country = new Application_Model_Country();
        $objcountry = $country->getAllCountry();
        foreach ($objcountry as $s) {
            $arrcountry[$s->id] = $s->country;
        }

        $countries = new Zend_Form_Element_Select('country_id');
        $countries->setLabel('Country');
        $countries->addMultiOptions($arrcountry);

        $city = new Zend_Form_Element_Text('city');
        $city->setLabel('City')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $address = new Zend_Form_Element_Text('address');
        $address->setLabel('Address')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $postcode = new Zend_Form_Element_Text('postcode');
        $postcode->setLabel('Postcode')
            ->setRequired(false)
            ->addValidator('NotEmpty');

         $contact_person = new Zend_Form_Element_Text('contact_person');
        $contact_person->setLabel('Contact person')
            ->setRequired(false)
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_submit('submit');
        $submit->setLabel('Add');

        $this->addElements(array($name, $countries, $address, $city, $postcode, $contact_person,$submit));

    }
}
