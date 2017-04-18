<?php
$db_host = "sql200.ezyro.com";
$db_user = "ezyro_19976047";
$db_pass = "ambarproject";
$db_name = "ezyro_19976047_db_ambar";
$link=mysql_connect($db_host,$db_user,$db_pass);
$db = mysql_select_db($db_name,$link);
if(!$db) die("Failed to connect to database");
$waktu=date("Y-m-d");
?>