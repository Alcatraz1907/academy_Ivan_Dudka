 
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Назва фільму</td>
        <td><input type="text" name="name" class="text_firstname"></td></tr>
         <tr><td>Тривалість </td>
        <td><input type="text" name="duration" class="text_firstname"></td></tr>
         <tr><td>Дата виходу </td>
        <td><input type="text" name="year_of_publication" class="text_firstname"></td></tr>
         <tr><td>Бюджет </td>
        <td><input type="text" name="budget" class="text_firstname"></td></tr>
        <tr><td>Дата поступлення на склад </td>
        <td><input type="text" name="delivery_date" class="text_firstname"></td></tr>
         <tr><td colspan="2" align="center">

          <input name="add" type="submit" value="Додати" class="buttom">
        </td>
        </table>
</form>
 <?php
 require "../conf/conf.php";
 if (($_POST['duration']!=NULL)&&($_POST['year_of_publication']!=NULL)&&($_POST['budget']!=NULL)&&($_POST['delivery_date']!=NULL))
 {
     $name = $_POST['name'];
     $duration = $_POST['duration'];
     $year_of_publication = $_POST['year_of_publication'];
     $budget = $_POST['budget'];
     $delivery_date = $_POST['delivery_date'];


     $result =  mysql_query("INSERT INTO `films`(`id`, `name`, `duration`, `year_of_publication`, `budget`, `delivery_date`)
        VALUES (NULL,'$name','$duration',' $year_of_publication','$budget','$delivery_date')")or die(mysql_error());
     if ($result == 'true')
     {echo "Ваши данные успешно добавлены";}
     else{echo "Ваши данные не добавлены";}

 }

 ?>