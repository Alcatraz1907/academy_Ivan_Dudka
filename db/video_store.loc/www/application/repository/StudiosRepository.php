<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 27.10.14
 * Time: 14:15
 */

namespace repository;


use models\Studios;

class StudiosRepository extends BaseRepository{

    function getStudiosById($id){
        $r = new BaseRepository();
        $r->ConnectToDataBase();
        $studio = new Studios();
        $rerult = mysql_query("	SELECT
                                      s.id,
                                      s.name,
                                      cou.country,
                                      s.city,
                                      s.address,
                                      s.postcode,
                                      s.contact_person

                                  FROM studios AS s
                                  INNER JOIN countries AS cou ON
                                  s.country_id = cou.id
                                  WHERE s.id = $id;");
        $row = mysql_fetch_array($rerult);

        $studio->name = $row['name'];
        $studio->country = $row['cointry'];
        $studio->city = $row['city'];
        $studio->address = $row['address'];
        $studio->postcode = $row['postcode'];
        $studio->contact_person = $row['contact_person'];

        return $studio;
    }

    function addStudio(Studios $studios){

        mysql_query("INSERT INTO `studios`(`id`, `name`, `country_id`, `city`, `address`, `postcode`, `contact_person`)
                           VALUES ('NULL','$studios->name','$studios->country_id','$studios->city',
                             '$studios->address','$studios->postcode','$studios->contact_person')");

    }

    function deleteStudioById($id){
        mysql_query("DELETE FROM `studios` WHERE id = $id");
    }
} 