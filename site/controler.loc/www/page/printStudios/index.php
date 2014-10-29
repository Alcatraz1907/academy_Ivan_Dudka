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
<h4><center>Для пергляду інформацї вибиріть як вона має бути посортована</center></h4>
<form action="" method="post" name="form1" >
    <table border="2">
        <tr><td>Виберіть тип для сортування</td>
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
require "../conf/conf.php";

function myControlSort($id){
    $how_sort = 0;
    switch ($id) {
        case "name":
            //   echo"name";
            $how_sort = "s.name";
            break;
        case "country":
            //   echo"prod";
            $how_sort = "cou.country";
            break;
        case "city":
            //   echo"last name";
            $how_sort = "s.city";
            break;
        case "address":
            //    echo"duration";
            $how_sort = " s.address";
            break;
        case "postcode":
            //   echo"year_of_publication";
            $how_sort = "s.postcode";
            break;
        case "contact_person":
            //   echo"year_of_publication";
            $how_sort = "s.contact_person";
            break;

    }
    return $how_sort;

}
function MySqlQuery($flag){
    $result = mysql_query(" SELECT
                                      s.id,
                                      s.name,
                                      cou.country,
                                      s.city,
                                      s.address,
                                      s.postcode,
                                      s.contact_person

                                  FROM studios AS s
                                  INNER JOIN countries AS cou ON
                                  s.country_id = cou.id
                                 ORDER BY $flag;");
    return $result;
}



echo("alcatraz:".$_POST['sort_id']."aaa");

  if($_POST['sort_id'] !== NULL){
    $sort_id = $_POST['sort_id'];
    $how_sort = myControlSort($sort_id);
    $result = MySqlQuery("$how_sort");
    $row = mysql_fetch_array($result);

    echo'<table border="1">
        <tr>
            <th>Назва студії </th>
            <th>Країна</th>
            <th>Місто</th>
            <th>Адреса</th>
            <th>Поштовий індекс</th>
            <th>Контактна особа</th>
        </tr>';

    do{
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['country']."</td>";
        echo "<td>".$row['city']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['postcode']."</td>";
        echo "<td>".$row['contact_person']."</td>";
        echo "</tr>";
    }while($row = mysql_fetch_array($result));
    echo "</table>";
}
?>

