
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
                        $studio = new Studios();
                        $result = $studio->getStudiosTable();
                        for($i = 0;$i<count($result);$i++){
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

if ($_POST['studio_id']!=NULL)
{
    $studio->deLete($_POST['studio_id']);
}
?>