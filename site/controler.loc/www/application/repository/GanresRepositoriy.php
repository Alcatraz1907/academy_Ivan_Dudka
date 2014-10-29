<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 27.10.14
 * Time: 11:25
 */

namespace repository;


use models\Ganres;

class GanresRepositoriy extends BaseRepository {

    function getGanresByid($id)
    {
        $ganre = new Ganres();
        $result = mysql_query("SELECT *
                               FROM `ganres`
                                id = $id");
        $row = mysql_fetch_array("$result");
        $ganre->ganre = $row['ganre'];

        return $ganre;
    }

    function AddToGanre(Ganres $ganre){
        mysql_query("INSERT INTO `ganres`(`id`, `ganre`)
                            VALUES ('NULL','$ganre->ganre')");
    }

    function deleteToGanreById($id){

        mysql_query("DELETE FROM `ganres` WHERE id = $id");

    }

    function deletToGanre($ganre){
        mysql_query("DELETE FROM ganres WHERE ganre = $ganre");
    }

} 