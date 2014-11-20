<?php

$action = isset($_GET['action']) ? $_GET['action'] : 'print';

switch($action){
    case 'print':
        include('../views/printStudios.php');
        break;
    case 'add':
        include('../views/addStudio.php');
        break;
    case 'printfilmsbystudio':
        include('../views/printFilmsByStudio.php');
        break;
    case 'delete':
        include('../views/deleteStodioById.php');
        break;
    case 'search':
        include('../views/searchStudioByName.php');
        break;

}
?>