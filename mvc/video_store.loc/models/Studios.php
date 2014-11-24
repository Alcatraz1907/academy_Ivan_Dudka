<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 12:57
 */

//namespace models;
//require "Base.php";

class Studios extends Base{

    private $name;
    private $country;
    private $city;
    private $address;
    private $postcode;
    private $contact_person;

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

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $contact_person
     */
    public function setContactPerson($contact_person)
    {
        $this->contact_person = $contact_person;
    }

    /**
     * @return mixed
     */
    public function getContactPerson()
    {
        return $this->contact_person;
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
     * @param mixed $postcode
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    /**
     * @return mixed
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    public function __construct(){
        $this->table_name = "studios";
    }

    public function addStudios($date){
        $sql =  $this->insert($date);
        return  mysql_query($sql.";");
    }

    public function getStudiosTable(){
        $sql = $this->select();
        $result = mysql_query($sql);
        $studios = array();
        while($row = mysql_fetch_array($result)){
            $studio = new Studios();
                $studio->id = $row['id'];
                $studio->name = $row['name'];
                $studio->city = $row['city'];
                $studio->address = $row['address'];
                $studio->postcode = $row['postcode'];
                $studio->contact_person = $row['contact_person'];
            $studios[] = $studio;
        }
        return $studios;

    }
    public function getFilmsByStudio($id){
        $request = " studios.id,
                     studios.name,
                     films.name as film_name,
                     countries.country,
                     studios.city,
                     studios.address,
                     studios.postcode,
                     studios.contact_person";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("countries","id","studios","country_id")

            .$this->innerJoin("studios_films","studio_id","studios","id")
            .$this->innerJoin("films","id","studios_films","film_id")

            ." WHERE studios.id = ".$id.";";

        $i = 0;
        $result = mysql_query($sql)or die(mysql_error());

        $studios = array();

        while($row = mysql_fetch_array($result)){

            $studios[$i]['name'] = $row['name'];
            $studios[$i]['film_name'] = $row['film_name'];
            $studios[$i]['country'] = $row['country'];
            $studios[$i]['city'] = $row['city'];
            $studios[$i]['address'] = $row['address'];
            $studios[$i]['postcode'] = $row['postcode'];
            $studios[$i]['contact_person'] = $row['contact_person'];

        }
        return $studios;
    }

    public function getStudio($flag){
        $request = " studios.id,
                     studios.name,
                     countries.country,
                     studios.city,
                     studios.address,
                     studios.postcode,
                     studios.contact_person";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("countries","id","studios","country_id")

            ." ORDER BY ".$flag.";";

        $result = mysql_query($sql)or die(mysql_error());

        $studios = array();

        while($row = mysql_fetch_array($result)){
            $studio = new Studios();

            $studio->name = $row['name'];
            $studio->country = $row['country'];
            $studio->city = $row['city'];
            $studio->address = $row['address'];
            $studio->postcode = $row['postcode'];
            $studio->contact_person = $row['contact_person'];
            $studios[] = $studio;
        }
        return $studios;
    }
    public function searchStudio($name){

        $request = " studios.id,
                     studios.name,
                     countries.country,
                     studios.city,
                     studios.address,
                     studios.postcode,
                     studios.contact_person";

        $sql = $this->select($request);

        $sql .= $this->innerJoin("countries","id","studios","country_id")

            ." WHERE studios.name LIKE '%$name%';";

        $result = mysql_query($sql)or die(mysql_error());

        $studios = array();

        while($row = mysql_fetch_array($result)){
            $studio = new Studios();
            $studio->id = $row['id'];
            $studio->name = $row['name'];
            $studio->country = $row['country'];
            $studio->city = $row['city'];
            $studio->address = $row['address'];
            $studio->postcode = $row['postcode'];
            $studio->contact_person = $row['contact_person'];
            $studios[] = $studio;
        }
        return $studios;
    }
}