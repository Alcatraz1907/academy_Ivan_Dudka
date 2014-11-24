<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:49
 */

//namespace models;



class GanresFilms extends Base{

    public $ganre_id;
    public $film_id;

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
     * @param mixed $ganre_id
     */
    public function setGanreId($ganre_id)
    {
        $this->ganre_id = $ganre_id;
    }

    /**
     * @return mixed
     */
    public function getGanreId()
    {
        return $this->ganre_id;
    }


    public function __construct(){
        $this->table_name = "ganres_films";
    }

    public function addGanresFilms($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function outputGanresFilms($date){
        $sql = $this->select($date);
        return mysql_query($sql);
    }
}