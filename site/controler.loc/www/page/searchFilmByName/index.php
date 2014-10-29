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
        <tr><td>Пошук фільму(ведіть назву)</td>
        <td><input type="text" name="name" ></td></tr>

            <tr><td colspan="2" align="center"><input name="add" type="submit" value="Search" class="buttom">
         </td>
        </table>
</form>
 <?php

 if ($_POST['name']!=NULL)
 {
     $name = $_POST['name'];

     $result =  mysql_query(" SELECT
                              f.name,
                              p.name AS name_producer,
                              p.last_name,
                              f.duration,
                              f.year_of_publication,
                              f.budget,
                              g.ganre,
                              s.name AS studio,
                              f.delivery_date
                            FROM films AS f
                                 INNER JOIN ganres_films AS gf ON f.id = gf.film_id
                                 INNER JOIN ganres AS g ON g.id = gf.ganre_id

                                 INNER JOIN producers_films AS pf ON f.id = pf.film_id
                                 INNER JOIN producers AS p ON p.id = pf.producer_id

                                 INNER JOIN studios_films AS sf ON f.id = sf.film_id
                                 INNER JOIN studios AS s ON s.id = sf.studio_id
                                WHERE f.name LIKE '%$name%';")or die(mysql_error());

     $row = mysql_fetch_array($result);
     if ($result == 'true')
     {
         echo "Ваши данные не добавлены";
     }
     else{$row = mysql_fetch_array($result);

         echo'<table border="1">
        <tr>
            <th>Прізвище </th>
            <th>Імя продюсера</th>
            <th>назва фільму</th>
            <th>жанр</th>
            <th>Тивалість</th>
            <th>Дата виходу</th>
            <th>бюджет</th>
            <th>студія</th>
            <th>дата поступлення на склад</th>
        </tr>';


         do{

             echo "<tr>";
             echo "<td>".$row['last_name']."</td>";
             echo "<td>".$row['name_producer']."</td>";
             echo "<td>".$row['name']."</td>";
             echo "<td>".$row['ganre']."</td>";
             echo "<td>".$row['duration']."</td>";
             echo "<td>".$row['year_of_publication']."</td>";
             echo "<td>".$row['budget']."</td>";
             echo "<td>".$row['studio']."</td>";
             echo "<td>".$row['delivery_date']."</td>";
             echo "</tr>";
         }while($row = mysql_fetch_array($result));
         echo "</table>";
         }

 }

 ?>
