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
        <tr><td>Select studio</td>
            <td>
                <select name="producer_id">
                    <?php
                    $studio = new Studios();
                    $result = $studio->getStudiosTable();
                    for($i = 0;$i<count($result);$i++){
                        echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName().'</option>';
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
    $studios  = new Studios();
    $result =  $studios->getFilmsByStudio($id);

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

        for($i = 0;$i < count($result);$i++){

            echo "<tr>";
            echo "<td>". $result[$i]['name']."</td>";
            echo "<td>".$result[$i]['film_name']."</td>";
            echo "<td>".$result[$i]['country']."</td>";
            echo "<td>".$result[$i]['city']."</td>";
            echo "<td>".$result[$i]['address']."</td>";
            echo "<td>".$result[$i]['postcode']."</td>";
            echo "<td>".$result[$i]['contact_person']."</td>";
            echo "</tr>";

        }
        echo "</table>";
    }

}

?>
