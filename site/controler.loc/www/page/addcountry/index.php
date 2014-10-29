<?php
require "../conf/conf.php";
?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Назва країни</td>
        <td><input type="text" name="name" class="text_firstname"></td></tr> 
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
        </td>
     
        </table>
</form>




<?php

if ($_POST['name']!=NULL)
{

    $name = $_POST['name'];

    $result = mysql_query("INSERT INTO countries (`id`,`country`)
                         VALUES ('NULL','$name');");

    if ($result == 'true')
    {echo "Ваши данные успешно добавлены";}
    else{echo "Ваши данные не добавлены";}

}
?>