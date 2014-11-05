<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 17:27
 */
require "../models/Producers.php";
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

    $produser = new Producers();
    $result = $produser->searchProducer($name);

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
