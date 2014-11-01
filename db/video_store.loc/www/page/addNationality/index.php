<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 13:59
 */ ?>
<?php
require "../conf/conf.php";
?>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>add nationality</td>
                <td><input type="text" name="name" class="text_firstname"></td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
                </td>

        </table>
    </form>




<?php

if ($_POST['name']!=NULL)
{

    $nationality = $_POST['name'];

    $result =  mysql_query("INSERT INTO `nationalities`(`id`, `nationality`) VALUES ('NULL','$nationality')");

    if ($result == 'true')
    {echo "Add ";}
    else{echo "not add";}
}
?>