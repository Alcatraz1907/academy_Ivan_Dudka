
<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 14:05
 */
?>
<?php
require "../models/Studios.php";
$studio = new Studios();
?>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select studios for delete</td>
                <td>
                    <select name="studio_id">
                        <?php
                        $result = $studio->getStudiosTable();
                        while($myrow = mysql_fetch_array($result)){
                            echo '<option value="'.$myrow["id"].'">'.$myrow["name"].'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="delete" class="buttom">
                </td>

        </table>
    </form>
<?php

if ($_POST['studio_id']!=NULL)
{
    $studio->deLete($_POST['studio_id']);
}
?>