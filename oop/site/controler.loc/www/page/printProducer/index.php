
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
require "../models/Producers.php";

function myControlSort($id){
    $how_sort = 0;
    switch ($id) {
        case "name":
            //   echo"name";
            $how_sort = "producers.name";
            break;
        case "last_name":
            //   echo"prod";
            $how_sort = "producers.last_name";
            break;
        case "year_of_birth":
            //   echo"last name";
            $how_sort = "producers.year_of_birth";
            break;
        case "year_of_death":
            //    echo"duration";
            $how_sort = " producers.year_of_death";
            break;
        case "nationality":
            //   echo"year_of_publication";
            $how_sort = "nationalities.nationality";
            break;

    }
    return $how_sort;

}

$produser = new Producers();


if($_POST['sort_id'] !== NULL){
    $sort_id = $_POST['sort_id'];
    $how_sort = myControlSort($sort_id);
    $result = $produser->getProducer($how_sort);

    echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name producer</th>
            <th>Year of birth</th>
            <th>Year of death</th>
            <th>Nationality</th>
        </tr>';

    for($i = 0;$i < count($result);$i++){

        echo "<tr>";
        echo "<td>".$result[$i]->getLastName()."</td>";
        echo "<td>".$result[$i]->getName()."</td>";
        echo "<td>".$result[$i]->getYearOfBirth()."</td>";
        echo "<td>".$result[$i]->getYearOfDeath()."</td>";
        echo "<td>".$result[$i]->getNationality()."</td>";
        echo "</tr>";

    }
    echo "</table>";
}
?>