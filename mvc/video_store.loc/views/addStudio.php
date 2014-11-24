<?php
require "../models/Studios.php";
require "../models/Countries.php";

?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Name studio</td>
        <td><input type="text" id="name" name="name" class="text_firstname"></td></tr>
         <tr><td>Country</td>
        <td>
            <select name="country_id">
                <?php
                    $countries = new Countries();
                    $result = $countries->outputCountry();
                    for($i = 0;$i < count($result);$i++){
                        echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getCountry().'</option>';
                    }
                ?>
            </select>
        </td></tr>
         <tr><td>City</td>
        <td><input type="text"id="city" name="city" class="text_firstname"></td></tr>
         <tr><td>Address</td>
        <td><input type="text" name="address" class="text_firstname"></td></tr>
        <tr><td>Postindex</td>
        <td><input type="text"  name="postcode" class="text_firstname"></td></tr>
      	<tr><td>Contact person</td>
        <td><input type="text" id="contact" name="contact_person" class="text_firstname"></td></tr>
        
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" class="buttom">
        </td>

        </table>
</form>

 <?php

 if (($_POST['name']!=NULL)&&($_POST['country_id']!=NULL)&&($_POST['city']!=NULL)&&($_POST['address']!=NULL)
     &&($_POST['postcode']!=NULL)&&($_POST['contact_person']!=NULL))
 {
     $array_studio = array('id'=>NULL
                   ,'name'=>$_POST['name']
                   ,'country_id'=>$_POST['country_id']
                   ,'city'=>$_POST['city']
                   ,'address'=>$_POST['address']
                   ,'postcode'=>$_POST['postcode']
                   ,'contact_person'=>$_POST['contact_person']);

     $studio = new Studios();
     $studio->addStudios($array_studio);
 }
 ?>