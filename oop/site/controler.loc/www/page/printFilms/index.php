<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 28.10.14
 * Time: 22:45
 */

//namespace page\printFilms;
//use repository\FilmsRepository as film;
require "../models/Films.php";
?>



    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select type sort</td>
                <td>
                    <select name="sort_id">
                        <option value="name">sort by name film</option>
                        <option value="last_name">sort by last name film</option>
                        <option value="name_producer">sort by name produser</option>
                        <option value="duration">sort by duration</option>
                        <option value="year_of_publication">sort by year of publication</option>
                        <option value="budget">sort by budhet</option>
                        <option value="ganre">sort by ganre</option>
                        <option value="studio">sort by studio</option>
                        <option value="delivery_date">sort by delivery date</option>
                    </select>
                </td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="get" class="buttom">
                </td>

        </table>
    </form>

<?php
require "../conf/conf.php";

function myControlSort($id){
    $how_sort = 0;
    switch ($id) {
        case "name":
         //   echo"name";
            $how_sort = "films.name";
            break;
        case "name_producer":
         //   echo"prod";
            $how_sort = "producers.name";
            break;
        case "last_name":
         //   echo"last name";
            $how_sort = "producers.last_name";
            break;
        case "duration":
        //    echo"duration";
            $how_sort = " films.duration";
            break;
        case "year_of_publication":
         //   echo"year_of_publication";
            $how_sort = "films.year_of_publication";
            break;
        case "budget":
         ///   echo"budget";
            $how_sort = "films.budget";
            break;
        case "ganre":
         //   echo"ganre";
            $how_sort = " ganres.ganre";
            break;
        case "studio":
         //   echo"studio";
            $how_sort = "studios.name";
            break;
        case "delivery_date":
          //  echo"delivery_date";
            $how_sort = "films.delivery_date";
            break;

    }
    return $how_sort;
}

$film = new Films();

if($_POST['sort_id'] !== NULL){
    $sort_id = $_POST['sort_id'];
    $how_sort = myControlSort($sort_id);
    $result =  $film->getFilms($how_sort);

   echo($result[0]->getGanre());
    //$row = mysql_fetch_array($result);

    echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name produser</th>
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
        echo "<td>".$result[$i]->getNameStudio()."</td>";
        echo "<td>".$result[$i]->getDuration()."</td>";
        echo "<td>".$result[$i]->getGanre()."</td>";
        echo "<td>".$result[$i]->getBudget()."</td>";
        echo "<td>".$result[$i]->getNameStudio()."</td>";
        echo "<td>".$result[$i]->getDeliveryDate()."</td>";
        echo "</tr>";
       // echo($row['id']." ");
    }
    echo "</table>";
}

?>
