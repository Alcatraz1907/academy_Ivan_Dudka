<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 14:05
 */
?>
<?php
require "../conf/conf.php";
?>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Виберіть назву фільма для видалення</td>
                <td>
                    <select name="film_id">
                        <?php
                        $result = mysql_query("SELECT id,name FROM films");
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

if ($_POST['film_id']!=NULL)
{

    $id = $_POST['film_id'];

    $result = mysql_query("DELETE FROM `films` WHERE id = '$id';")or die(mysql_error());

    if ($result == 'true')
    {echo "Ваши данные успешно видалені";}
    else{echo "Ваши данные не видалені";}

}
?>