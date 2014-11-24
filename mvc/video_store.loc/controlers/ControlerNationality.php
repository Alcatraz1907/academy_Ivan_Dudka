<?php

$action = isset($_GET['action']) ? $_GET['action'] : 'add';

switch($action){
    case 'add':
        include('../views/addNationality.php');
        break;
}