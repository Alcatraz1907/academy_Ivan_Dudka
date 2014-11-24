<?php

$action = isset($_GET['action']) ? $_GET['action'] : 'print';

switch($action){
    case 'print':
        include("../views/printFilms.php");
        break;
    case 'add':
        include("../views/addfilm.php");
        break;
    case 'delete':
        include("../views/deleteFilmsByName.php");
        break;
    case 'search':
        include("../views/searchFilmsByName.php");
        break;
}
?>