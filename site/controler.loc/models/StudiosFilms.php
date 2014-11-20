<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 13:01
 */

//namespace models;


class StudiosFilms extends Base{

   private $film_id;
   private $studio_id;

    /**
     * @param mixed $film_id
     */
    public function setFilmId($film_id)
    {
        $this->film_id = $film_id;
    }

    /**
     * @return mixed
     */
    public function getFilmId()
    {
        return $this->film_id;
    }

    /**
     * @param mixed $studio_id
     */
    public function setStudioId($studio_id)
    {
        $this->studio_id = $studio_id;
    }

    /**
     * @return mixed
     */
    public function getStudioId()
    {
        return $this->studio_id;
    }


    public function __construct(){
        $this->table_name = "studios_films";
    }

    public function addStudiosFilms($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function outputStudiosFilms($date){
        $sql = $this->select($date);
        return mysql_query($sql);
    }
} 