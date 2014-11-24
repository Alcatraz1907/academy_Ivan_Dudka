<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:37
 */

namespace models;


class Films extends Base {

    public $name_producer = array();
    public $last_name = array();
    public $name;
    public $ganres = array();
    public $duretion;
    public $yeat_of_publication;
    public $budget;
    public $studios = array();
    public $delivery_date;

} 