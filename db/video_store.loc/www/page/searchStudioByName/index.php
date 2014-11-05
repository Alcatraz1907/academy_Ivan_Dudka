<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 17:27
 */
require "../models/Studios.php";
?>

<form action="" method="post" name="form1" >
    <table border="2">
        <tr><td>Search studio(Enter name)</td>
            <td><input type="text" name="name" ></td></tr>

        <tr><td colspan="2" align="center"><input name="add" type="submit" value="Search" class="buttom">
            </td>
    </table>
</form>
<?php

if ($_POST['name']!=NULL)
{
    $name = $_POST['name'];

    $result =  mysql_query("	SELECT
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
                                WHERE s.name LIKE '%$name%';")or die(mysql_error());

    $studio = new Studios();

    $result = $studio->searchStudio($name);
    $row = mysql_fetch_array($result);
    if ($result == 'true')
    {
        echo "Ваши данные не добавлены";
    }
    else{

        echo'<table border="1">
        <tr>
            <th>Name studo </th>
            <th>Country</th>
            <th>City</th>
            <th>Addressa</th>
            <th>Postindex</th>
            <th>Contact person</th>
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

}

?>
