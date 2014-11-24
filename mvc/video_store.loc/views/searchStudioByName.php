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
    $studio = new Studios();

    $result = $studio->searchStudio($name);

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
    }

}

?>
