<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 01.12.2014
 * Time: 23:08
 */
class Application_Model_GanreFilm{

    protected $_dbTable;
    protected $_row;

    public function __construct($id = NULL)
    {
        $this->_dbTable = new Application_Model_DbTable_GanresFilms();
        if ($id) {
            $this->_row = $this->_dbTable->find($id)->current();
        } else {
            $this->_row = $this->_dbTable->createRow();

        }
    }


    /*
     *Geters and Seters
     */
    public function __set($name, $val)
    {
        if (isset($this->_row->$name)) {
            $this->_row->$name;
        }
    }

    public function __get($name)
    {
        if (isset($this->_row->$name)) {
            return $this->_row->$name;
        }
    }

    public function getAllGanresFilms()
    {
        return $this->_dbTable->fetchAll();
    }

    public  function fill($data){
        foreach($data as $key => $value){
            if(isset($this->_row->$key)){
                $this->_row->$key = $value;
            }
        }
    }

    public function save()
    {
        return  $this->_row->save();
    }

    public function populateForm(){
        return $this->_row->toArray();
    }
    public function delete(){

        $this->_row->delete();
    }
}
