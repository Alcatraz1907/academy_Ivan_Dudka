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
            <tr><td>Select produser for removed</td>
                <td>
                    <select name="producer_id">
                        <?php
                        $result = mysql_query("SELECT id,last_name,name FROM producers");
                        while($myrow = mysql_fetch_array($result)){
                            echo '<option value="'.$myrow["id"].'">'.$myrow["name"]." ".$myrow['last_name'].'</option>';
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

    $id = $_POST['producer_id'];

    $result = mysql_query("DELETE FROM `producers` WHERE id = '$id';")or die(mysql_error());


    if ($result == 'true')
    {echo "delete";}
    else{echo "not delete";}


}
?>