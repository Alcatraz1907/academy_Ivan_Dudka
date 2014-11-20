<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 28.10.14
 * Time: 22:45
 */

//namespace page\printFilms;
//use repository\FilmsRepository as film;
?>

<form action="" method="post" name="form1" >
    <table border="2">
        <tr><td>Select type sort</td>
            <td>
                <select name="sort_id">
                    <option value="studios.name">sort by name studio</option>
                    <option value="countries.country">sort by country</option>
                    <option value="studios.city">sort by city</option>
                    <option value="studios.address">sort by address</option>
                    <option value="studios.postcode">sort by postcode</option>
                    <option value="studios.contact_person">sort by contact_person</option>
                </select>
            </td></tr>
        <tr><td colspan="2" align="center"><input name="add" type="submit" value="get" class="buttom">
            </td>

    </table>
</form>

<?php
require "../models/Studios.php";

$studio = new Studios();

///echo("alcatraz:".$_POST['sort_id']."aaa");
echo'<table border="1">
        <tr>
            <th>Name studio </th>
            <th>Country</th>
            <th>City</th>
            <th>Address</th>
            <th>Postindex</th>
            <th>Contact person</th>
        </tr>';

  if($_POST['sort_id'] !== NULL){

    $result = $studio->getStudio($_POST['sort_id']);


      for($i = 0;$i < count($result);$i++){
          echo "<tr>";
          echo "<td>".$result[$i]->getName()."</td>";
          echo "<td>".$result[$i]->getCountry()."</td>";
          echo "<td>".$result[$i]->getCity()."</td>";
          echo "<td>".$result[$i]->getAddress()."</td>";
          echo "<td>".$result[$i]->getPostcode()."</td>";
          echo "<td>".$result[$i]->getContactPerson()."</td>";
          echo "</tr>";
      }
    echo "</table>";
}else{

      $sort_id = 'studios.name';
      $result = $studio->getStudio($sort_id);
      for($i = 0;$i < count($result);$i++){
          echo "<tr>";
          echo "<td>".$result[$i]->getName()."</td>";
          echo "<td>".$result[$i]->getCountry()."</td>";
          echo "<td>".$result[$i]->getCity()."</td>";
          echo "<td>".$result[$i]->getAddress()."</td>";
          echo "<td>".$result[$i]->getPostcode()."</td>";
          echo "<td>".$result[$i]->getContactPerson()."</td>";
          echo "</tr>";
      }
  }
?>

