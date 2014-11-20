<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:37
 */

//namespace models;
//require "Base.php";

class Films extends Base {

    private $producer_name;
    private $last_name;
    private $name;
    private $duration;
    private $year_of_publication;
    private $budget;
    private $ganre;
    private $name_studio;
    private $delivery_date;



    public function __construct(){
        $this->table_name = "films";
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $delivery_date
     */
    public function setDeliveryDate($delivery_date)
    {
        $this->delivery_date = $delivery_date;
    }

    /**
     * @return mixed
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $ganre
     */
    public function setGanre($ganre)
    {
        $this->ganre = $ganre;
    }

    /**
     * @return mixed
     */
    public function getGanre()
    {
        return $this->ganre;
    }

    /**
     * @param mixed $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $producer_name
     */
    public function setProducerName($producer_name)
    {
        $this->producer_name = $producer_name;
    }

    /**
     * @return mixed
     */
    public function getProducerName()
    {
        return $this->producer_name;
    }

    /**
     * @param mixed $name_studio
     */
    public function setNameStudio($name_studio)
    {
        $this->name_studio = $name_studio;
    }

    /**
     * @return mixed
     */
    public function getNameStudio()
    {
        return $this->name_studio;
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
     * @param mixed $year_of_publication
     */
    public function setYearOfPublication($year_of_publication)
    {
        $this->year_of_publication = $year_of_publication;
    }

    /**
     * @return mixed
     */
    public function getYearOfPublication()
    {
        return $this->year_of_publication;
    }


    public function addFilms($date){
        $sql =  $this->insert($date);
        return mysql_query("$sql;");
    }

    public function getFilms($flag){
        $request = "
             films.id,
             films.name,
             producers.name AS name_producer,
             producers.last_name,
             films.duration,
             films.year_of_publication,
             films.budget,
             ganres.ganre,
             studios.name AS studio,
             films.delivery_date ";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("ganres_films","film_id","films","id")
               .$this->innerJoin("ganres","id","ganres_films","ganre_id")

               .$this->innerJoin("producers_films","film_id","films","id")
               .$this->innerJoin("producers","id","producers_films","producer_id")

               .$this->innerJoin("studios_films","film_id","films","id")
               .$this->innerJoin("studios","id","studios_films","studio_id")

               ." ORDER BY ".$flag.";";

            $result = mysql_query($sql)or die(mysql_error());

        $array_films = array();

        while($row = mysql_fetch_array($result)){

               $f = new Films();

             $f->last_name = $row['last_name'];
             $f->producer_name = $row['name_producer'];
             $f->name = $row['name'];
             $f->ganre = $row['ganre'];
             $f->duration = $row['duration'];
             $f->year_of_publication = $row['year_of_publication'];
             $f->budget = $row['budget'];
             $f->name_studio = $row['studio'];
             $f->delivery_date = $row['delivery_date'];

                $array_films[] = $f;

             }

        return $array_films;
    }

    public function searchFilms($name){
        $request = "
             films.id,
             films.name,
             producers.name AS name_producer,
             producers.last_name,
             films.duration,
             films.year_of_publication,
             films.budget,
             ganres.ganre,
             studios.name AS studio,
             films.delivery_date ";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("ganres_films","film_id","films","id")
            .$this->innerJoin("ganres","id","ganres_films","ganre_id")

            .$this->innerJoin("producers_films","film_id","films","id")
            .$this->innerJoin("producers","id","producers_films","producer_id")

            .$this->innerJoin("studios_films","film_id","films","id")
            .$this->innerJoin("studios","id","studios_films","studio_id")

            ."  WHERE films.name LIKE '%$name%';";
        $result = mysql_query($sql)or die(mysql_error());

        $array_films = array();

        while($row = mysql_fetch_array($result)){

            $f = new Films();

            $f->last_name = $row['last_name'];
            $f->producer_name = $row['name_producer'];
            $f->name = $row['name'];
            $f->ganre = $row['ganre'];
            $f->duration = $row['duration'];
            $f->year_of_publication = $row['year_of_publication'];
            $f->budget = $row['budget'];
            $f->name_studio = $row['studio'];
            $f->delivery_date = $row['delivery_date'];

            $array_films[] = $f;

        }

        return $array_films;
    }

public function getFilmsTable(){
        $sql = $this->select();
        $result =  mysql_query("$sql;");
            $array_films = array();

        while($row = mysql_fetch_array($result)){

            $f = new Films();
                $f->id = $row['id'];
                $f->name = $row['name'];
                $f->duration = $row['duration'];
                $f->year_of_publication = $row['year_of_publication'];
                $f->budget = $row['budget'];
                $f->delivery_date = $row['delivery_date'];

            $array_films[] = $f;
        }

        return $array_films;
    }



}

