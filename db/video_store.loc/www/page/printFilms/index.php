<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 28.10.14
 * Time: 22:45
 */

//namespace page\printFilms;
//use repository\FilmsRepository as film;
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
            $how_sort = "f.name";
            break;
        case "name_producer":
         //   echo"prod";
            $how_sort = "p.name";
            break;
        case "last_name":
         //   echo"last name";
            $how_sort = "p.last_name";
            break;
        case "duration":
        //    echo"duration";
            $how_sort = " f.duration";
            break;
        case "year_of_publication":
         //   echo"year_of_publication";
            $how_sort = "f.year_of_publication";
            break;
        case "budget":
         ///   echo"budget";
            $how_sort = "f.budget";
            break;
        case "ganre":
         //   echo"ganre";
            $how_sort = " g.ganre";
            break;
        case "studio":
         //   echo"studio";
            $how_sort = "s.name";
            break;
        case "delivery_date":
          //  echo"delivery_date";
            $how_sort = "f.delivery_date";
            break;

    }
    return $how_sort;

}
function MySqlQuery($flag){
            $result = mysql_query(" SELECT
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
                                 ORDER BY $flag;");
 return $result;
}




if($_POST['sort_id'] !== NULL){
    $sort_id = $_POST['sort_id'];
    $how_sort = myControlSort($sort_id);
    $result = MySqlQuery("$how_sort");
    $row = mysql_fetch_array($result);

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
?>