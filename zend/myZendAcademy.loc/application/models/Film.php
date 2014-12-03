<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 01.12.2014
 * Time: 23:05
 */
class Application_Model_Film{

    protected $_dbTable;
    protected $_row;

    public function __construct($id = NULL)
    {
        $this->_dbTable = new Application_Model_DbTable_Films();
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

    public function getAllFilms($search = '',$sort = '')
    {
        $select = $this->_dbTable->select(Zend_Db_Table::SELECT_WITH_FROM_PART)
            ->setIntegrityCheck(false)
            ->from('',array('studio_name'=>'studios.name',
                            'producer_name'=>'producers.name',
                            'film_id'=>'films.id'))

            ->join('ganres_films','films.id = ganres_films.film_id')
            ->join('ganres','ganres.id = ganres_films.ganre_id')

            ->join('producers_films','producers_films.film_id = films.id')
            ->join('producers','producers.id = producers_films.producer_id')

            ->join('studios_films','studios_films.film_id = films.id')
            ->join('studios','studios.id = studios_films.studio_id')

        ->where('films.name LIKE ?','%'.$search.'%')
        ->order($sort,'ASC');

        return $this->_dbTable->fetchAll($select);
    }
    public function getAllFilmForForm(){
        return $this->_dbTable->fetchAll();
    }
    public function save()
    {
        return  $this->_row->save();
    }
    public  function fill($data){

        foreach($data as $key => $value){
            if(isset($this->_row->$key)){
                $this->_row->$key = $value;
            }
        }
    }

    public function populateForm(){

        return $this->_row->toArray();
    }
    public function delete(){

        $this->_row->delete();
    }
}
