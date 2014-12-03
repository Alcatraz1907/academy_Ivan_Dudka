<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 01.12.2014
 * Time: 23:09
 */

class Application_Model_Studio{

    protected $_dbTable;
    protected $_row;

    public function __construct($id = NULL)
    {
        $this->_dbTable = new Application_Model_DbTable_Studios();
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

    public function getAllStudios()
    {
        $select = $this->_dbTable->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
            ->setIntegrityCheck(false)

            ->join('countries','countries.id = studios.country_id');

        return $this->_dbTable->fetchAll($select);
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
    public function getAllStudioForForm(){
        return $this->_dbTable->fetchAll();
    }

    public function populateForm(){
        return $this->_row->toArray();
    }
    public function delete(){

        $this->_row->delete();
    }
}
