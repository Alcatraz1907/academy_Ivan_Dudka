
<?php

require "../conf/conf.php";
?>
<form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select produrers for add</td>
                <td>
                    <select name="producer_id[]"  size="5" multiple="multiple">
                        <?php
                        $result = mysql_query("SELECT id,name,last_name FROM producers");
                        while($myrow = mysql_fetch_array($result)){
                            echo '<option value="'.$myrow["id"].'">'.$myrow["name"]." ".$myrow['last_name'].'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
        <tr><td>Name films</td>
        <td><input type="text" name="name" class="text_firstname"></td></tr>
            <tr><td>Select ganre for add</td>
                <td>
                    <select name="ganres_id[]"  size="5" multiple="multiple">
                        <?php
                        $result = mysql_query("SELECT id,ganre FROM ganres");
                        while($myrow = mysql_fetch_array($result)){
                            echo '<option value="'.$myrow["id"].'">'.$myrow["ganre"].'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
         <tr><td>Duration </td>
        <td><input type="text" name="duration" class="text_firstname"></td></tr>
         <tr><td>Year of publication </td>
        <td><input type="text" name="year_of_publication" class="text_firstname"></td></tr>
         <tr><td>Budget </td>
        <td><input type="text" name="budget" class="text_firstname"></td></tr>
            <tr><td>Select studios for add</td>
                <td>
                    <select name="stidios_id[]"  size="5" multiple="multiple">
                            <?php
                            $result = mysql_query("SELECT id,name FROM studios");
                            while($myrow = mysql_fetch_array($result)){
                                echo '<option value="'.$myrow["id"].'">'.$myrow["name"].'</option>';
                            }
                            ?>
                    </select>
                </td></tr>
        <tr><td>Delivery date (y,m,d)</td>
        <td><input type="text" name="delivery_date" class="text_firstname"></td></tr>
         <tr><td colspan="2" align="center">

          <input name="add" type="submit" value="Додати" class="buttom">
        </td>
        </table>
</form>
<script src="http://jquery-joshbush.googlecode.com/files/jquery.maskedinput-1.2.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function($) {
        $('#delivery_date').mask('##/##/####');
    });</script>
<?php

 $stidios_id = $_POST['stidios_id'];
 $ganres_id = $_POST['ganres_id'];
 $producer_id = $_POST['producer_id'];

 if (($_POST['duration']!=NULL)&&($_POST['year_of_publication']!=NULL)&&($_POST['budget']!=NULL)&&($_POST['delivery_date']!=NULL))
 {


     $name = $_POST['name'];
     $duration = $_POST['duration'];
     $year_of_publication = $_POST['year_of_publication'];
     $budget = $_POST['budget'];
     $delivery_date =  $_POST['delivery_date'];

     //echo($delivery_date);

     $result =  mysql_query("INSERT INTO `films`(`id`, `name`, `duration`, `year_of_publication`, `budget`, `delivery_date`)
        VALUES (NULL,'$name','$duration',' $year_of_publication','$budget','$delivery_date')")or die(mysql_error());

     $film_id = mysql_insert_id();

    for($i = 0;$i< count($producer_id);$i++){
        mysql_query("INSERT INTO `producers_films`(`film_id`, `producer_id`)
                            VALUES ('$film_id','$producer_id[$i]')")or die(mysql_error());
     }
     for($i = 0;$i< count($ganres_id);$i++){
         mysql_query("INSERT INTO `ganres_films`(`ganre_id`, `film_id`)
                            VALUES ('$ganres_id[$i]','$film_id')")or die(mysql_error());
     }
     for($i = 0;$i< count($stidios_id);$i++){
         mysql_query("INSERT INTO `studios_films`(`film_id`, `studio_id`)
                            VALUES ('$film_id','$stidios_id[$i]')")or die(mysql_error());
     }
     if ($result == 'true')
     {echo "Add ";}
     else{echo "not add";}

 }

 ?>