<?php
$db_host = "mysql.idhostinger.com";
$db_user = "u520988298_ambar";
$db_pass = "12345678";
$db_name = "u520988298_ambar";
$link=mysql_connect($db_host,$db_user,$db_pass);
$db = mysql_select_db($db_name,$link);
if(!$db) die("Failed to connect to database");
$waktu=date("Y-m-d");
?>
