<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:56
 */

//namespace models;

class ProdusersFilms extends Base{

    private  $film_id;
    private  $producer_id;

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
     * @param mixed $table_name
     */
    public function setTableName($table_name)
    {
        $this->table_name = $table_name;
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->table_name;
    }

    /**
     * @param mixed $producer_id
     */
    public function setProducerId($producer_id)
    {
        $this->producer_id = $producer_id;
    }

    /**
     * @return mixed
     */
    public function getProducerId()
    {
        return $this->producer_id;
    }


    public function __construct(){
        $this->table_name = "producers_films";
    }

    public function addProdusersFilms($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function outputProdusersFilms($date){
        $sql = $this->select($date);
        return mysql_query($sql);
    }
} 