<?php require('templates/header.php');?>
<?php require('../models/Base.php'); ?>
<?php require('../conf/conf.php');?>
<?php
$controler = isset($_GET['controler']) ? $_GET['controler']: 'film';

switch($controler){
    case 'films':
        require('../controlers/ControlerFilms.php');
        break;
    case 'producers':
        require('../controlers/ControlerProducers.php');
        break;
    case 'studios':
        require('../controlers/ControlerStudios.php');
        break;
    case 'countries':
        require('../controlers/ControlerCountries.php');
        break;
    case 'nationalities':
        require('../controlers/ControlerNationality.php');
        break;
}

?>
<?php require('templates/footer.php');?>
