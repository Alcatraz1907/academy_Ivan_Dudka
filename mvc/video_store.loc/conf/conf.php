<?php
/**
 * Created by PhpStorm.
 * User: Іван
 * Date: 26.10.14
 * Time: 20:16
     */
    $db_host = "localhost";
    $db_user = "alcatraz1907";
    $db_pass = "1907";
    $db_name = "video_store";
    $db = mysql_connect($db_host,$db_user,$db_pass) or die("Don't conect");
    mysql_select_db($db_name,$db);



?>