<?php
require "../conf/conf.php";
?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Name studio</td>
        <td><input type="text" name="name" class="text_firstname"></td></tr>
         <tr><td>Країна</td>
        <td>
            <select name="country_id">
                <?php
                    $result = mysql_query("SELECT * FROM countries");
                    while($myrow = mysql_fetch_array($result)){
                        echo '<option value="'.$myrow["id"].'">'.$myrow["country"].'</option>';
                    }
                ?>
            </select>
        </td></tr>
         <tr><td>City</td>
        <td><input type="text" name="city" class="text_firstname"></td></tr>
         <tr><td>Address</td>
        <td><input type="text" name="address" class="text_firstname"></td></tr>
        <tr><td>Postindex</td>
        <td><input type="text" name="postcode" class="text_firstname"></td></tr>
      	<tr><td>Contact person</td>
        <td><input type="text" name="contact_person" class="text_firstname"></td></tr>
        
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
        </td>

        </table>
</form>
 <?php

 if (($_POST['name']!=NULL)&&($_POST['country_id']!=NULL)&&($_POST['city']!=NULL)&&($_POST['address']!=NULL)
     &&($_POST['postcode']!=NULL)&&($_POST['contact_person']!=NULL))
 {
     $name = $_POST['name'];
     $country_id = $_POST['country_id'];
     $city = $_POST['city'];
     $address = $_POST['address'];
     $postcode = $_POST['postcode'];
     $contact_person = $_POST['contact_person'];


     $result =   mysql_query("INSERT INTO `studios`(`id`, `name`, `country_id`, `city`, `address`, `postcode`, `contact_person`)
                           VALUES (NULL,'$name','$country_id','$city',
                             '$address','$postcode','$contact_person')")or die(mysql_error());
     if ($result == 'true')
     {echo "Add ";}
     else{echo "not add";}

 }
 ?>