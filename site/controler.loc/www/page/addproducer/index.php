<?php
require "../conf/conf.php";
?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Прізвище</td>
        <td><input type="text" name="last_name" ></td></tr>
         <tr><td>Ім'я </td>
        <td><input type="text" name="name" ></td></tr>
         <tr><td>рік народження</td>
        <td><input type="text" name="year_of_birth" ></td></tr>
         <tr><td>рік смерті </td>
        <td><input type="text" name="year_of_death" ></td></tr>
        <tr><td>Національність</td>
        <td>
            <select name="nationality_id">
                <?php
                $result = mysql_query("SELECT * FROM nationalities");
                while($myrow = mysql_fetch_array($result)){
                    echo '<option value="'.$myrow["id"].'">'.$myrow["nationality"].'</option>';
                }
                ?>
            </select>

        </td></tr>
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" >
        </td>
        </table>
</form>



<?php

if (($_POST['last_name']!=NULL)&&($_POST['name']!=NULL)&&($_POST['year_of_birth']!=NULL)&&($_POST['year_of_death']!=NULL || $_POST['year_of_death']==NULL )
    &&($_POST['nationality_id']!=NULL))
{
    $last_name = $_POST['last_name'];
    $year_of_birth = $_POST['year_of_birth'];
    $year_of_death = $_POST['year_of_death'];
    $nationality = $_POST['nationality_id'];
    $name = $_POST['name'];



    $result = mysql_query("INSERT INTO `producers`(`id`, `last_name`, `name`, `year_of_birth`, `year_of_death`, `nationality_id`)
                          VALUES ('NULL','$last_name','  $name','$year_of_birth',
                          '$year_of_death','$nationality')");

    if ($result == 'true')
    {echo "Ваши данные успешно добавлены";}
    else{echo "Ваши данные не добавлены";}

}
?>