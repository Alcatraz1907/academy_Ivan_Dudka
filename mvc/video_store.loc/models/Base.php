<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:24
 */

//namespace models;
// понаписувати поля в кожному класі
 class Base {
    protected  $id;
    public  $table_name;

     /**
      * @param mixed $id
      */
     public function setId($id)
     {
         $this->id = $id;
     }

     /**
      * @return mixed
      */
     public function getId()
     {
         return $this->id;
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


    function insert ($data) {
        $fields = '';
        $values = '';
        foreach ($data as $key=>$value){
            $fields .= "`$key`, ";
            $values .= "'". $value . "', ";
        }
        $fields = substr($fields,0,strlen($fields)-2);
        $values = substr( $values,0,strlen( $values)-2);
        $sql= "INSERT INTO ". $this->table_name ."(".$fields.") VALUES (" . $values . ")";
        //echo($sql);
        return $sql;
    }

    function deLete($id){
        $result = mysql_query("DELETE FROM `".$this->table_name."` WHERE id =".$id.";");
        return $result;
    }

    function select($request = false){
        if($request == false){
            $sql = "SELECT * FROM `".$this->table_name."`";
        }else{
            $sql = "SELECT ".$request."  FROM `".$this->table_name."`";
        }
            return $sql;
    }

    function innerJoin($table1,$id1,$table2,$id2){

        $sql = " INNER JOIN ".$table1." ON ".$table2.".".$id2." = ".$table1.".".$id1;
        return $sql;
    }

}
?>