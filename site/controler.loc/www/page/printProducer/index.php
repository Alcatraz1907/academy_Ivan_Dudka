
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
<h4><center>Для пергляду інформацї вибиріть як вона має бути посортована</center></h4>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Виберіть тип для сортування</td>
                <td>
                    <select name="sort_id">
                        <option value="name">sort by name producer</option>
                        <option value="last_name">sort by last name producer</option>
                        <option value="year_of_birth">sort by year of birth</option>
                        <option value="year_of_death">sort by year of death</option>
                        <option value="nationality">sort by nationality</option>
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
            $how_sort = "p.name";
            break;
        case "last_name":
            //   echo"prod";
            $how_sort = "p.last_name";
            break;
        case "year_of_birth":
            //   echo"last name";
            $how_sort = "p.year_of_birth";
            break;
        case "year_of_death":
            //    echo"duration";
            $how_sort = " p.year_of_death";
            break;
        case "nationality":
            //   echo"year_of_publication";
            $how_sort = "n.nationality";
            break;

    }
    return $how_sort;

}
function MySqlQuery($flag){
    $result = mysql_query(" SELECT
                                      p.id,
                                      p.last_name,
                                      p.name,
                                      p.year_of_birth,
                                      p.year_of_death,
                                      n.nationality
                                  FROM producers AS p
                                  INNER JOIN nationalities AS n ON
                                  p.nationality_id = n.id
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
            <th>Прізвище </th>
            <th>Імя продюсера</th>
            <th>Рік народження</th>
            <th>Рік смерті</th>
            <th>національність</th>
        </tr>';

    do{
        echo "<tr>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['year_of_birth']."</td>";
        echo "<td>".$row['year_of_death']."</td>";
        echo "<td>".$row['nationality']."</td>";
        echo "</tr>";
    }while($row = mysql_fetch_array($result));
    echo "</table>";
}
?>