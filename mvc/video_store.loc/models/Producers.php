<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:52
 */

//namespace models;

//require "Base.php";
class Producers extends Base{

    private $last_name;
    private $name;
    private $year_of_birth;
    private $year_of_death;
    private $nationality;

    /**
     * @param mixed $year_of_death
     */
    public function setYearOfDeath($year_of_death)
    {
        $this->year_of_death = $year_of_death;
    }

    /**
     * @return mixed
     */
    public function getYearOfDeath()
    {
        return $this->year_of_death;
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
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }



    /**
     * @param mixed $year_of_birth
     */
    public function setYearOfBirth($year_of_birth)
    {
        $this->year_of_birth = $year_of_birth;
    }

    /**
     * @return mixed
     */
    public function getYearOfBirth()
    {
        return $this->year_of_birth;
    }


    public function __construct(){
        $this->table_name = "producers";
    }

    public function addProducers($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function getProducersTable(){
        $sql = $this->select();
        $result =  mysql_query($sql);
        $producers = array();
        while($row = mysql_fetch_array($result)){
            $producer = new Producers();
                $producer->id = $row['id'];
                $producer->last_name = $row['last_name'];
                $producer->name = $row['name'];
                $producer->year_of_birth = $row['year_of_birth'];
                $producer->year_of_death = $row['year_of_death'];
            $producers[] = $producer;
        }
        return $producers;
    }

    public function getFilmsByProducer($id){
        $request = "producers.id,
                    producers.last_name,
                    producers.name,
                    films.name as film_name,
                    producers.year_of_birth,
                    producers.year_of_death,
                    nationalities.nationality";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("nationalities","id","producers","nationality_id")

            .$this->innerJoin("producers_films","producer_id","producers","id")
            .$this->innerJoin("films","id","producers_films","film_id")

            ." WHERE producers.id = ".$id.";";

        $result = mysql_query($sql)or die(mysql_error());
        $producers = array();
        $i = 0;
        while($row = mysql_fetch_array($result)){

                $producers[$i]['last_name'] = $row['last_name'];
                $producers[$i]['name'] = $row['name'];
                $producers[$i]['film_name'] = $row['film_name'];
                $producers[$i]['year_of_birth'] = $row['year_of_birth'];
                $producers[$i]['year_of_death'] = $row['year_of_death'];
                $producers[$i]['nationality'] = $row['nationality'];

            $i++;
        }
        return $producers;
    }

    public function getProducer($flag){
        $request = "producers.id,
                    producers.last_name,
                    producers.name,
                    producers.year_of_birth,
                    producers.year_of_death,
                    nationalities.nationality";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("nationalities","id","producers","nationality_id")

            ." ORDER BY ".$flag.";";

        $result = mysql_query($sql)or die(mysql_error());


        $producers = array();
        while($row = mysql_fetch_array($result)){
            $p = new Producers();

                $p->last_name = $row['last_name'];
                $p->name = $row['name'];
                $p->year_of_birth = $row['year_of_birth'];
                $p->year_of_death = $row['year_of_death'];
                $p->nationality = $row['nationality'];

            $producers[] = $p;
        }
        return $producers;
    }

    public function searchProducer($name){
        $request = "producers.id,
                    producers.last_name,
                    producers.name,
                    producers.year_of_birth,
                    producers.year_of_death,
                    nationalities.nationality";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("nationalities","id","producers","nationality_id")

            ."  WHERE producers.last_name LIKE '%$name%';";

        $result = mysql_query($sql)or die(mysql_error());
        $producers = array();
        while($row = mysql_fetch_array($result)){
            $p = new Producers();

            $p->last_name = $row['last_name'];
            $p->name = $row['name'];
            $p->year_of_birth = $row['year_of_birth'];
            $p->year_of_death = $row['year_of_death'];
            $p->nationality = $row['nationality'];

            $producers[] = $p;
        }
        return $producers;
    }
}