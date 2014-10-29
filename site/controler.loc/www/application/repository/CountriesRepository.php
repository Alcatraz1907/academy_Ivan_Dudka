<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 20:59
 */

namespace repository;


use models\Countries;
use models\Studios;

class CountriesRepository extends BaseRepository {

    function getCountryById($id){
        $country = new Countries();
        $rezult = mysql_query("SELECT * FROM countries WHERE id = $id;");
        $data = mysql_fetch_array($rezult);
        $country->id = $data['id'];
        $country->country = $data['country'];

        return $country;
    }

    function AddCountry($country){
        mysql_query("INSERT INTO countries (`id`,`country`)
                         VALUES ('NULL','$$country');");
    }


    function DeleteCountryById($id){
           mysql_query("DELETE FROM countries
                        WHERE id = $id;");
    }


    function DeleteCountryByName($country){
        mysql_query("DELETE FROM countries
                        WHERE country = $country;");
    }


}


?>