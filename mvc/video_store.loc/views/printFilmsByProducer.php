<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 17:27
 */
require "../models/Producers.php";
?>
<h1>Print films by producer</h1>
<form action="" method="post" name="form1" >
    <table border="2">
        <tr><td>Select produser</td>
            <td>
                <select name="producer_id">
                    <?php
                    $producer = new Producers();
                    $result = $producer->getProducersTable();

                    for($i = 0;$i<count($result);$i++){
                        echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName()." ".$result[$i]->getLastName().'</option>';
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

        for($i = 0;$i < count($result);$i++){
            echo "<tr>";
            echo "<td>".$result[$i]['last_name']."</td>";
            echo "<td>".$result[$i]['name']."</td>";
            echo "<td>".$result[$i]['film_name']."</td>";
            echo "<td>".$result[$i]['year_of_birth']."</td>";
            echo "<td>".$result[$i]['year_of_death']."</td>";
            echo "<td>".$result[$i]['nationality']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

}

?>
