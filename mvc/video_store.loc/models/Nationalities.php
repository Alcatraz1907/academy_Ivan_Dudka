<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:34
 */

//namespace models;
//require "Base.php";

class Nationalities extends Base{

    private $nationality;

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



    public function __construct(){
        $this->table_name = "nationalities";
    }
    public function addNationalities($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function outputNationalities(){
        $sql = $this->select();
        $result =  mysql_query($sql);

        $nationality = array();

        while($row = mysql_fetch_array($result)){
            $n = new Nationalities();
                $n->id = $row['id'];
                $n->nationality = $row['nationality'];
            $nationality[] = $n;
        }
        return $nationality;
    }
} 