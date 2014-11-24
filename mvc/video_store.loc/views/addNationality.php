<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 29.10.14
 * Time: 13:59
 */ ?>
<?php
require "../models/Nationalities.php";
?>
    <form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>add nationality</td>
                <td><input type="text" id="nationality" name="name" class="text_firstname"></td></tr>
            <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
                </td>

        </table>
    </form>



<?php
$nationality = new Nationalities();
if ($_POST['name']!=NULL)
{
    $tmp = array('id'=>NULL,'nationality'=>$_POST['name']);
    $nationality->addNationalities($tmp);
}
?>