<?php
require "../models/Countries.php";
?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Name country</td>
        <td><input type="text" id="county" name="name" class="text_firstname"></td></tr>
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
        </td>
     
        </table>
</form>



<?php
    $country = new Countries();

if ($_POST['name']!=NULL)
{
    $tmp = array('id'=>NULL,'country'=>$_POST['name']);
    $country->addCountry($tmp);
}
?>
