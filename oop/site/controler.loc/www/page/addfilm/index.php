
<?php
require "../models/Films.php";
require "../models/GanresFilms.php";
require "../models/StudiosFilms.php";
require "../models/ProdusersFilms.php";
require "../models/Producers.php";
require "../models/Ganres.php";
require "../models/Studios.php";
?>

<form action="" method="post" name="form1" >
        <table border="2">
            <tr><td>Select produrers for add</td>
                <td>
                    <select name="producer_id[]"  size="5" multiple="multiple">
                        <?php
                        $producer = new Producers();
                        $result = $producer->getProducersTable();

                        for($i = 0;$i<count($result);$i++){
                            echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName()." ".$result[$i]->getLastName().'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
        <tr><td>Name films</td>
        <td><input type="text"  name="name" class="text_firstname"></td></tr>
            <tr><td>Select ganre for add</td>
                <td>
                    <select name="ganres_id[]"  size="5" multiple="multiple">
                        <?php
                        $ganre = new Ganres();
                        $result = $ganre->outputGanres();

                        for($i = 0;$i<count($result);$i++){
                            echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getGanre().'</option>';
                        }
                        ?>
                    </select>
                </td></tr>
         <tr><td>Duration </td>
        <td><input type="text" id="duration" name="duration" class="text_firstname"></td></tr>
         <tr><td>Year of publication </td>
        <td><input type="text" id="yearOfPublication" name="year_of_publication" class="text_firstname"></td></tr>
         <tr><td>Budget </td>
        <td><input type="text" id="budget" name="budget" class="text_firstname"></td></tr>
            <tr><td>Select studios for add</td>
                <td>
                    <select name="stidios_id[]"  size="5" multiple="multiple">
                            <?php
                            $studio = new Studios();
                            $result = $studio->getStudiosTable();
                            for($i = 0;$i<count($result);$i++){
                                echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getName().'</option>';
                            }
                            ?>
                    </select>
                </td></tr>
        <tr><td>Delivery date (y-m-d)</td>
        <td><input type="text" id="date" name="delivery_date" class="text_firstname"></td></tr>
         <tr><td colspan="2" align="center">

          <input name="add" type="submit" value="Додати" class="buttom">
        </td>
        </table>
</form>

<script type="text/javascript">
  $(document).ready(function(){
      $("#date").mask("9999-99-99");
      $("#yearOfPublication").mask("9999");
     // $("#budget").mask("99999999999999");
      $("#duration").mask("99:99:99");
  });
</script>
<?php

 $stidios_id = $_POST['stidios_id'];
 $ganres_id = $_POST['ganres_id'];
 $producer_id = $_POST['producer_id'];

 if (($_POST['duration']!=NULL)&&($_POST['year_of_publication']!=NULL)&&($_POST['budget']!=NULL)&&($_POST['delivery_date']!=NULL))
 {
     $film = new Films();
     $producer = new ProdusersFilms();
     $ganres = new GanresFilms();
     $stidios = new StudiosFilms();

      $array_film = array('id'=>NULL
                         ,'name'=>$_POST['name']
                         ,'duration'=>$_POST['duration']
                         ,'year_of_publication'=>$_POST['year_of_publication']
                         ,'budget'=>$_POST['budget']
                         ,'delivery_date'=>$_POST['delivery_date']);


     $film->addFilms($array_film);
     $film_id = mysql_insert_id();

    for($i = 0;$i< count($producer_id);$i++){
        $array_produser_film = array('film_id'=>$film_id
                                    ,'producer_id'=>$producer_id[$i]);
        $producer->addProdusersFilms($array_produser_film);
     }
     for($i = 0;$i< count($ganres_id);$i++){
         $array_ganre_film = array('film_id'=>$film_id
                                  ,'ganre_id'=>$ganres_id[$i]);
         $ganres->addGanresFilms($array_ganre_film);
     }
     for($i = 0;$i< count($stidios_id);$i++){
         $array_studio_film = array('film_id'=>$film_id
                                    ,'studio_id'=>$stidios_id[$i]);
         $stidios->addStudiosFilms($array_studio_film);
     }


 }

 ?>