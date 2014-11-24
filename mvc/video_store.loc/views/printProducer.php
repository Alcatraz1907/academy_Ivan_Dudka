
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
                        <option value="producers.name">sort by name producer</option>
                        <option value="producers.last_name">sort by last name producer</option>
                        <option value="producers.year_of_birth">sort by year of birth</option>
                        <option value="producers.year_of_death">sort by year of death</option>
                        <option value="nationalities.nationality">sort by nationality</option>
                    </select>
                </td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="get" class="buttom">
                </td>

        </table>
    </form>

<?php
require "../models/Producers.php";

$produser = new Producers();
echo'<table border="1">
        <tr>
            <th>Last name </th>
            <th>Name producer</th>
            <th>Year of birth</th>
            <th>Year of death</th>
            <th>Nationality</th>
        </tr>';


if($_POST['sort_id'] !== NULL){

    $result = $produser->getProducer($_POST['sort_id']);

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
}else{
    $sort_id = 'producers.name';
    $result = $produser->getProducer($sort_id);

    for($i = 0;$i < count($result);$i++){

        echo "<tr>";
        echo "<td>".$result[$i]->getLastName()."</td>";
        echo "<td>".$result[$i]->getName()."</td>";
        echo "<td>".$result[$i]->getYearOfBirth()."</td>";
        echo "<td>".$result[$i]->getYearOfDeath()."</td>";
        echo "<td>".$result[$i]->getNationality()."</td>";
        echo "</tr>";

    }
}
?>