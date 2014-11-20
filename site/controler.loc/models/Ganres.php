<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:35
 */

//namespace models;
//require "Base.php";

class Ganres  extends Base {

    private $ganre;

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
     * @param mixed $name
     */


    public function __construct(){
        $this->table_name = "ganres";
    }

    public function  addGanre($ganre){
        return mysql_query("INSERT INTO gares (id,ganre) VALUES ('NUUL',$ganre);");

    }

    public function outputGanres(){
        $sql = $this->select();
        $result = mysql_query($sql);
        $nationalitis = array();
        while($row = mysql_fetch_array($result)){
                $g = new Ganres();
                    $g->id = $row['id'];
                    $g->ganre = $row['ganre'];
                $nationalitis[] = $g;
        }
        return $nationalitis;
    }
} 