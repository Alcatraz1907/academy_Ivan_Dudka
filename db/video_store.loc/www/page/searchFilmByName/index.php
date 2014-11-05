<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 17:27
 */
require "../models/Films.php";
?>

<form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Search film(enter name)</td>
        <td><input type="text" name="name" ></td></tr>

            <tr><td colspan="2" align="center"><input name="add" type="submit" value="Search" class="buttom">
         </td>
        </table>
</form>
 <?php

 if ($_POST['name']!=NULL)
 {
     $name = $_POST['name'];

$film = new Films();
     $result =  $film->searchFilms($name);
     $row = mysql_fetch_array($result);
     if ($result == 'true')
     {
         echo "not add";
     }
     else{$row = mysql_fetch_array($result);

         echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name producer</th>
            <th>Name films</th>
            <th>Ganre</th>
            <th>Duration</th>
            <th>Year of publication</th>
            <th>Budget</th>
            <th>Studio</th>
            <th>Delivery date</th>
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
