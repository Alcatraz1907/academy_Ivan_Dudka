<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 14:05
 */
?>
<?php
require "../models/Producers.php";
$producer = new Producers();
?>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select produser for removed</td>
                <td>
                    <select name="producer_id">
                        <?php
                        $producer = new Producers();
                        $result = $producer->getProducersTable();

                        for($i = 0;$i<count($result);$i++){
                            echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName()." ".$result[$i]->getLastName().'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="delete" class="buttom">
                </td>

        </table>
    </form>




<?php

if ($_POST['producer_id']!=NULL)
{
    $producer->deLete($_POST['producer_id']);
}
?>