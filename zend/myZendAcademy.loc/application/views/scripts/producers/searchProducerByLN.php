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


    $name = $_POST['name'];

    $produser = new Producers();
    $result = $produser->searchProducer($name);

        echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name producer</th>
            <th>Year of birht</th>
            <th>Year of death</th>
            <th>Nationality</th>
        </tr>';

    for($i = 0;$i < count($result);$i++){

        echo "<tr>";
        echo "<td>".$result[$i]->getLastName()."</td>";
        echo "<td>".$result[$i]->getName()."</td>";
        echo "<td>".$result[$i]->getYearOfBirth()."</td>";
        echo "<td>".$result[$i]->getYearOfDeath()."</td>";
        echo "<td>".$result[$i]->getNationality()."</td>";
        echo "</tr>";
    }
        echo "</table>";


?>
