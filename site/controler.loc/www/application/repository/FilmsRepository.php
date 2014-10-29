<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 21:42
 */

namespace repository;
//require_once "W:/home/controler.loc/www/yourNameSpace/Autoloader.php";

use models\Films;

class FilmsRepository extends BaseRepository{

    function GetFilmsByid($id){

        $r = new BaseRepository();
        $r->ConnectToDataBase();
        $film = new Films();
        $rezult = mysql_query(" SELECT
                              f.name,
                              p.name AS name_producer,
                              p.last_name,
                              f.duration,
                              f.year_of_publication,
                              f.budget,
                              g.ganre,
                              s.name AS studio,
                              f.delivery_date
                            FROM films AS f
                                 INNER JOIN ganres_films AS gf ON f.id = gf.film_id
                                 INNER JOIN ganres AS g ON g.id = gf.ganre_id

                                 INNER JOIN producers_films AS pf ON f.id = pf.film_id
                                 INNER JOIN producers AS p ON p.id = pf.producer_id

                                 INNER JOIN studios_films AS sf ON f.id = sf.film_id
                                 INNER JOIN studios AS s ON s.id = sf.studio_id
                             WHERE f.id = $id;
                                     ");
        $row = mysql_fetch_array($rezult);

        $film->name = $row['name'];
        $film->name_producer = $row['name_producer'];
        $film->last_name = $row['last_name'];
        $film->duretion = $row['duration'];
        $film->yeat_of_publication = $row['year_of_publication'];
        $film->budget = $row['budget'];
        $film->ganres = $row['ganre'];
        $film->studios = $row['studio'];
        $film->delivery_date = $row['delivery_date'];

        return  $film;
    }
    //==================================================================================================================
    function AddToFilm(Films $film){
      $f = $film->name;
         mysql_query("INSERT INTO `films`(`id`, `name`, `duration`, `year_of_publication`, `budget`, `delivery_date`)
        VALUES ('NULL','$film->name','$film->duration',' $film->yeat_of_publication','$film->budget','$film->delivery')");
    }
    //==================================================================================================================
    function DeleteToFilmsById($id){
         mysql_query("DELETE FROM `films` WHERE id = $id");
    }
} 