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
                    <option value="name">sort by name studio</option>
                    <option value="country">sort by country</option>
                    <option value="city">sort by city</option>
                    <option value="address">sort by address</option>
                    <option value="postcode">sort by postcode</option>
                    <option value="contact_person">sort by contact_person</option>
                </select>
            </td></tr>
        <tr><td colspan="2" align="center"><input name="add" type="submit" value="get" class="buttom">
            </td>

    </table>
</form>

<?php
require "../models/Studios.php";

function myControlSort($id){
    $how_sort = 0;
    switch ($id) {
        case "name":
            //   echo"name";
            $how_sort = "studios.name";
            break;
        case "country":
            //   echo"prod";
            $how_sort = "countries.country";
            break;
        case "city":
            //   echo"last name";
            $how_sort = "studios.city";
            break;
        case "address":
            //    echo"duration";
            $how_sort = " studios.address";
            break;
        case "postcode":
            //   echo"year_of_publication";
            $how_sort = "studios.postcode";
            break;
        case "contact_person":
            //   echo"year_of_publication";
            $how_sort = "studios.contact_person";
            break;

    }
    return $how_sort;

}

$studio = new Studios();


///echo("alcatraz:".$_POST['sort_id']."aaa");

  if($_POST['sort_id'] !== NULL){
    $sort_id = $_POST['sort_id'];
    $how_sort = myControlSort($sort_id);
    $result = $studio->getStudio($how_sort);

    echo'<table border="1">
        <tr>
            <th>Назва студії </th>
            <th>Країна</th>
            <th>Місто</th>
            <th>Адреса</th>
            <th>Поштовий індекс</th>
            <th>Контактна особа</th>
        </tr>';

    for($i = 0;$i < count($result);$i++){
        echo "<tr>";
        echo "<td>".$result[$i]['name']."</td>";
        echo "<td>".$result[$i]['country']."</td>";
        echo "<td>".$result[$i]['city']."</td>";
        echo "<td>".$result[$i]['address']."</td>";
        echo "<td>".$result[$i]['postcode']."</td>";
        echo "<td>".$result[$i]['contact_person']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

