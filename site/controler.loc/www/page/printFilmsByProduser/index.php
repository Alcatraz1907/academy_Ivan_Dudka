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
        <tr><td>Виберіть продюсера для  видалення</td>
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

    $result =  mysql_query("	     SELECT
                                      p.id,
                                      p.last_name,
                                      p.name,
                                      f.name as film_name,
                                      p.year_of_birth,
                                      p.year_of_death,
                                      n.nationality
                                  FROM producers AS p
                                  INNER JOIN nationalities AS n ON
                                  p.nationality_id = n.id

                                 INNER JOIN producers_films AS pf ON p.id = pf.producer_id
                                 INNER JOIN films AS f ON f.id = pf.film_id
                                WHERE p.id = $id")or die(mysql_error());

    $row = mysql_fetch_array($result);
    if ($result == 'true')
    {
        echo "Ваши данные не добавлены";
    }
    else{

        echo'<table border="1">
        <tr>
            <th>Прізвище </th>
            <th>Імя продюсера</th>
            <th>Назва фільму</th>
            <th>Рік народження</th>
            <th>Рік смерті</th>
            <th>національність</th>
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
