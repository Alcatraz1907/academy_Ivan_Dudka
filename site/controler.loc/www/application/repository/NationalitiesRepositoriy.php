<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 27.10.14
 * Time: 11:50
 */

namespace repository;


use models\Nationalities;

class NationalitiesRepositoriy {

    function getNationalitiesById($id){

        $nationality = new Nationalities();
        $result = mysql_query("SELECT * FROM nationalities WHERE id = $id");
        $row = mysql_fetch_array($result);
        $nationality->natiolity = $row['ganre'];

    return $nat;
    }


    function AddToNationalities($nationality){

        mysql_query("INSERT INTO `nationalities`(`id`, `nationality`) VALUES ('NULL','$nationality')");

    }

    function deleteToNationalitiesById($id){
        mysql_query("DELETE FROM * nationalities WHERE id = $id");
    }
    function deleteToNationalitiesByNationality($nationality){
        mysql_query("DELETE FROM * nationalities WHERE nationality = $nationality");
    }


} 