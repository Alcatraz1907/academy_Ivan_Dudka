<?php

class Application_Model_User
{
    protected $_dbTable;
    protected $_row;

    public function __construct($id = NULL){
        $this->_dbTable = new Application_Model_DbTable_Users();
        if($id){
            $this->_row = $this->_dbTable->find($id)->current();
        }else{
            $this->_row = $this->_dbTable->createRow();

        }
    }

    /*
     *Geters and Seters
     */
    public  function __set($name, $val){
        if(isset($this->_row->$name)){
            $this->_row->$name;
        }
    }
    public  function __get($name){
        if(isset($this->_row->$name)){
            return $this->_row->$name;
        }
    }
    public function getAllUsers(){
        return $this->_dbTable->fetchAll();
    }


    public function save($date){
        $this->_dbTable->insert($date);
    }



}

