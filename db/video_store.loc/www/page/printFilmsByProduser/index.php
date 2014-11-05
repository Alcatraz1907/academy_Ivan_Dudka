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
        <tr><td>Select produser</td>
            <td>
                <select name="producer_id">
                    <?php
                    $result = mysql_query("SELECT id,last_name,name FROM producers");
                    while($myrow = mysql_fetch_array($result)){
                        echo '<option value="'.$myrow["id"].'">'.$myrow["name"]." ".$myrow['last_name'].'</option>';
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

$producer = new Producers();
    $result = $producer->getFilmsByProducer($id);

    $row = mysql_fetch_array($result);
    if ($result == 'true')
    {
        echo "Ваши данные не добавлены";
    }
    else{

        echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name </th>
            <th>Name film</th>
            <th>Year of birth</th>
            <th>Year of death</th>
            <th>Nationality</th>
        </tr>';

        do{
            echo "<tr>";
            echo "<td>".$row['last_name']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['film_name']."</td>";
            echo "<td>".$row['year_of_birth']."</td>";
            echo "<td>".$row['year_of_death']."</td>";
            echo "<td>".$row['nationality']."</td>";
            echo "</tr>";
        }while($row = mysql_fetch_array($result));
        echo "</table>";
    }

}

?>
