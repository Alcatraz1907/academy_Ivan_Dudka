<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 14:05
 */
require "../models/Films.php";
$film = new Films();
?>

    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select film for delete</td>
                <td>
                    <select name="film_id">
                        <?php
                        $result = $film->getFilmsTable();
                        for($i = 0;$i < count($result); $i++){
                            echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName().'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="delete" class="buttom">
                </td>

        </table>
    </form>




<?php


if ($_POST['film_id']!=NULL)
{

    $film->deLete($_POST['film_id']);

}
?>