<?php
require "../models/Studios.php";
require "../models/Nationalities.php";
?>
 <form action="" method="post" name="form1" >
        <table border="2">
        <tr><td>Last name</td>
        <td><input type="text" ID="lastName" name="last_name" ></td></tr>
         <tr><td>Name </td>
        <td><input type="text" id="name" name="name" ></td></tr>
         <tr><td>Year of birth</td>
        <td><input type="text" id="YearOfBirth" name="year_of_birth" ></td></tr>
         <tr><td>Yeat of death</td>
        <td><input type="text" id="YearOfFDeath" name="year_of_death" ></td></tr>
        <tr><td>Національність</td>
        <td>
            <select name="nationality_id">
                <?php
                $nationalities = new Nationalities();
                $result = $nationalities->outputNationalities();
                for($i = 0;$i < count($result);$i++){
                    echo '<option value="'.$result[$i]->getId().'">'.$result[$i]->getNationality().'</option>';
                }
                ?>
            </select>

        </td></tr>
         <tr><td colspan="2" align="center"><input name="add" type="submit" value="Додати" >
        </td>
        </table>
</form>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#lastName").mask("aaaaaaaaaaaaaaaaaaaa");
            $("#name").mask("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
            $("#YearOfBirth").mask("9999");
            $("#YearOfFDeath").mask("9999");
        });
    </script>

<?php

if (($_POST['last_name']!=NULL)&&($_POST['name']!=NULL)&&($_POST['year_of_birth']!=NULL)&&($_POST['year_of_death']!=NULL || $_POST['year_of_death']==NULL )
    &&($_POST['nationality_id']!=NULL))
{

    $year_of_birth = $_POST['year_of_birth'];

    if($_POST['year_of_death'] =="")
    {
        $year_of_death = NULL;
    }else{
    $year_of_death = $_POST['year_of_death'];
}
    $array_studio = array('id'=>NULL
                        ,'last_name'=>$_POST['last_name']
                        ,'name'=>$_POST['name']
                        ,'year_of_birth'=>$_POST['year_of_birth']
                        ,'year_of_death'=>$year_of_death
                        ,'nationality_id'=>$_POST['nationality_id']);

    $studio = new Studios();
    $studio->addStudios($array_studio);
}
?>