<?php

$action = isset($_GET['action']) ? $_GET['action'] : 'print';

switch($action){
    case 'print':
        include('../views/printProducer.php');
        break;
    case 'add':
        include('../views/addproducer.php');
        break;
    case 'printfilmbyproducer':
        include('../views/printFilmsByProducer.php');
        break;
    case 'delete':
        include('../views/deleteProducerByName.php');
        break;
    case 'search':
        include('../views/searchProducerByLN.php');
        break;

}