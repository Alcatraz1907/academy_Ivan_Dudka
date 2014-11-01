<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 17:27
 */
require "../conf/conf.php";
?>

<form action="" method="post" name="form1" >
    <table border="2">
        <tr><td>Select studio</td>
            <td>
                <select name="producer_id">
                    <?php
                    $result = mysql_query("SELECT id,name FROM studios");
                    while($myrow = mysql_fetch_array($result)){
                        echo '<option value="'.$myrow["id"].'">'.$myrow["name"].'</option>';
                    }
                    ?>
                </select>
            </td></tr>
        <tr><td colspan="2" align="center"><input name="add" type="submit" value="видалити" class="buttom">
            </td>

    </table>
</form>
<?php

if ($_POST['producer_id']!=NULL)
{
    $id = $_POST['producer_id'];

    $result =  mysql_query("	   SELECT
                                      s.id,
                                      s.name,
                                      f.name as film_name,
                                      cou.country,
                                      s.city,
                                      s.address,
                                      s.postcode,
                                      s.contact_person
                                  FROM studios AS s
                                  INNER JOIN countries AS cou ON
                                  s.country_id = cou.id
                                 INNER JOIN studios_films AS sf ON s.id = sf.studio_id
                                 INNER JOIN films AS f ON f.id = sf.film_id
                                WHERE s.id = $id;")or die(mysql_error());

    $row = mysql_fetch_array($result);
    if ($result == 'true')
    {
        echo "Ваши данные не добавлены";
    }
    else{
        echo'<table border="1">
        <tr>
            <th>Назва студії </th>
            <th>Назва фільму</th>
            <th>Країна</th>
            <th>Місто</th>
            <th>Адреса</th>
            <th>Поштовий індекс</th>
            <th>Контактна особа</th>
        </tr>';

        do{
            echo "<tr>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['film_name']."</td>";
            echo "<td>".$row['country']."</td>";
            echo "<td>".$row['city']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>".$row['postcode']."</td>";
            echo "<td>".$row['contact_person']."</td>";
            echo "</tr>";
        }while($row = mysql_fetch_array($result));
        echo "</table>";
    }

}

?>
