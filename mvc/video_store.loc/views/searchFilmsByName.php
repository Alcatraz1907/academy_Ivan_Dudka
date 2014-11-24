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


         for($i = 0;$i<count($result);$i++)
         {
             echo "<td>".$result[$i]->getLastName()."</td>";
             echo "<td>".$result[$i]->getProducerName()."</td>";
             echo "<td>".$result[$i]->getName()."</td>";
             echo "<td>".$result[$i]->getGanre()."</td>";
             echo "<td>".$result[$i]->getDuration()."</td>";
             echo "<td>".$result[$i]->getYearOfPublication()."</td>";
             echo "<td>".$result[$i]->getBudget()."</td>";
             echo "<td>".$result[$i]->getNameStudio()."</td>";
             echo "<td>".$result[$i]->getDeliveryDate()."</td>";
             echo "</tr>";
             // echo($row['id']." ");
         }
         echo "</table>";


 }

 ?>
