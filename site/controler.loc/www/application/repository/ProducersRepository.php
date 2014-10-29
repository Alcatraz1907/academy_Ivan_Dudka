<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 27.10.14
 * Time: 12:10
 */

namespace repository;


use models\Producers;

class ProducersRepository extends BaseRepository{

     function getProducersById($id){
         $producer = new Producers();
         $result = mysql_query("SELECT
                                      p.id,
                                      p.last_name,
                                      p.name,
                                      p.year_of_death,
                                      n.nationality
                                  FROM producers AS p
                                  INNER JOIN nationalities AS n ON
                                  p.nationality_id = n.id
                                  WHERE p.nationality_id = $id;
                                  ");
         $row = mysql_fetch_array($result);

         $producer->last_name = $row['last_name'];
         $producer->last_name = $row['name'];
         $producer->last_name = $row['year_of_death'];
         $producer->last_name = $row['nationality_id'];
         $producer->last_name = $row['nationality'];

         return $producer;
     }
    function addProducer(Producers $producers){
        mysql_query("INSERT INTO `producers`(`id`, `last_name`, `name`, `year_of_birth`, `year_of_death`, `nationality_id`)
                          VALUES ('NULL','$producers->last_name','$producers->name','$producers->year_of_birth','$producers->year_of_death','$producers->nationality_id')");
    }
    function deleteProducerById($id){
        mysql_query("DELETE FROM `producers` WHERE id = $id");
    }

} 