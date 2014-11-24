<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:27
 */

//require "Base.php";
class Countries extends Base {
    private  $country;

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function __construct(){
       $this->table_name = "countries";
    }

    public function addCountry($date){
     $sql =  $this->insert($date);
       return  mysql_query($sql.";");
    }

    public function outputCountry(){
        $sql = $this->select();
         $result = mysql_query($sql);

        $conuntry = array();
        while($row = mysql_fetch_array($result)){
        $c = new Countries();
            $c->id = $row['id'];
            $c->country = $row['country'];
        $conuntry[]=$c;
        }
        return $conuntry;
    }
}