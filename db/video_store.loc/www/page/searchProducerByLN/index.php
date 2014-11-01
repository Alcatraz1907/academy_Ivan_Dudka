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
        <tr><td>Search producer(Enter last name)</td>
            <td><input type="text" name="name" ></td></tr>

        <tr><td colspan="2" align="center"><input name="add" type="submit" value="Search" class="buttom">
            </td>
    </table>
</form>
<?php

if ($_POST['name']!=NULL)
{
    $name = $_POST['name'];

    $result =  mysql_query("SELECT
                                      p.id,
                                      p.last_name,
                                      p.name,
                                      p.year_of_birth,
                                      p.year_of_death,
                                      n.nationality
                                  FROM producers AS p
                                  INNER JOIN nationalities AS n ON
                                  p.nationality_id = n.id
                                WHERE p.last_name LIKE '%$name%';")or die(mysql_error());

    $row = mysql_fetch_array($result);
    if ($result == 'true')
    {
        echo "Ваши данные не добавлены";
    }
    else{

        echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name producer</th>
            <th>Year of birht</th>
            <th>Year of death</th>
            <th>Nationality</th>
        </tr>';

        do{
            echo "<tr>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['year_of_birth']."</td>";
            echo "<td>".$row['year_of_death']."</td>";
            echo "<td>".$row['nationality']."</td>";
            echo "</tr>";
        }while($row = mysql_fetch_array($result));
        echo "</table>";
    }

}

?>
