<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 10.11.14
 * Time: 12:19
 */ ?>

<?php

$action = isset($_GET['action']) ? $_GET['action']: 'print';

switch($action){
    case 'add':
        include('../views/addcountry.php');
        break;
}


?>